<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentMethod;
use App\File;

class PaymentMethodsController extends Controller
{

     /**
     * Base path to the view of this controller
     */
    public static $view_folder = 'admin.payment_methods.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::withTrashed()->get();
        return view(self::$view_folder . 'index', compact('paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return back();
        //return view(self::$view_folder . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return back();


        /////////////////
        $request->validate([
            'name' => 'required',
            'description' => 'present',
            'logo_file' => 'required|image'
        ]);

        $data = $request->only('name', 'description');
        $slug = self::slugify($request->name);
        $exist = PaymentMethod::where('slug', $slug)->orWhere('name', $request->name)->first();
        if ($exist) {
            return back()->withError("This payment option already exist !");
        }

        $data['slug'] = $slug;
        //upload logo
        if ($file = $request->file('logo_file')) {
            $extension = $file->extension()?: 'png';
            $mime = $file->getMimeType();
            $destinationPath = public_path() . '/files/';
            $safeName = 'logo_' . str_random(20) . '.' . $extension;
            while (file_exists($destinationPath . $safeName)) {
                $safeName = 'logo_' . str_random(20) . '.' . $extension;
            }
            $file->move($destinationPath, $safeName);
            $data['logo_file_id'] = File::insertGetId(['filename' => $safeName, 'mime' => $mime]);
        } else {
            return back()->withError("Logo is required");
        }

        PaymentMethod::create($data);

        // Redirect to the home page with success menu
        return redirect()->route('admin.payment_options.index')->with('success', "Payment option created successfully !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentOption)
    {
        return back();
        //return view(self::$view_folder . 'show', compact('paymentOption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentOption)
    {
        return back();
        //return view(self::$view_folder . 'edit', compact('paymentOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentOption)
    {
        return back();

        ////////////
        $request->validate([
            'name' => 'required',
            'description' => 'present',
            'logo_file' => 'image'
        ]);

        $data = $request->only('name', 'description');
        $slug = self::slugify($request->name);
        $exist = PaymentMethod::where('name', '<>', $paymentOption->name)->Where('name', $request->name)->first();
        if (!$exist) {
            $exist = PaymentMethod::where('slug', '<>', $paymentOption->slug)->Where('slug', $slug)->first();
        }

        if ($exist) {
            return back()->withError("This payment option already exist !");
        }

        $data['slug'] = $slug;
        $file_to_delete = [];
        $file_to_delete_ids = [];

        //upload logo
        if ($file = $request->file('logo_file')) {
            $extension = $file->extension()?: 'png';
            $mime = $file->getMimeType();
            $destinationPath = public_path() . '/files/';
            $safeName = 'logo_' . str_random(20) . '.' . $extension;
            while (file_exists($destinationPath . $safeName)) {
                $safeName = 'logo_' . str_random(20) . '.' . $extension;
            }
            $file->move($destinationPath, $safeName);
            $data['logo_file_id'] = File::insertGetId(['filename' => $safeName, 'mime' => $mime]);

            if ($paymentOption->logo) {
                array_push($file_to_delete, $destinationPath . $paymentOption->logo->filename);
                array_push($file_to_delete_ids, $paymentOption->logo->id);
            }
        }

        PaymentMethod::whereId($paymentOption->id)->update($data);

        //delete user files
        File::whereIn('id', $file_to_delete_ids)->delete();
        foreach ($file_to_delete as $item) {
            if (file_exists($item)) {
                unlink($item);
            }
        }

        // Redirect to the home page with success menu
        return redirect()->route('admin.payment_options.index')->with('success', "Payment option updated successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentMethod::destroy($id);
        return back()->withSuccess("Payment method disabled successfully !");
    }

    public function restore($id)
    {
        PaymentMethod::onlyTrashed()->whereId($id)->restore();
        return back()->withSuccess("Payment method enabled successfully !");
    }

    private static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}

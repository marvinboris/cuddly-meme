<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\ActivityArea;
use App\Country;
use App\File;
use App\Question;
use Redirect;
use URL;
use Sentinel;
use App\Mail\Restore;
use stdClass;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class UsersController extends Controller
{
    /**
     * Base path to the view of this controller
     */
    static $view_folder = 'admin.users.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view(self::$view_folder . 'index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = ActivityArea::all();
        $countries = Country::all();
        return view(self::$view_folder . 'create', compact('questions', 'activities', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'present',
            'email' => 'required|email|unique:users,email',
            'birthdate' => 'required|date|before:today',
            'sex' => 'required|in:M,F',
            'activity_area_id' => 'required|exists:activity_areas,id',
            'specialization' => 'required',
            'phone' => 'required',
            'city_id' => 'required|exists:cities,id',
            'cv_file' => 'required|file|mimes:pdf',
            'pic_file' => 'file|image',
            'video_file' => 'mimes:mp4,mov,ogg,qt'
        ]);

        $user_data = $request->except('_token', 'activate', 'country_id', 'pic_file', 'cv_file', 'pic_file', 'video_file');

        //upload cv
        if ($file = $request->file('cv_file')) {
            $extension = $file->extension()?: 'pdf';
            $mime = $file->getMimeType();
            $destinationPath = public_path() . '/files/';
            $safeName = 'cv_' . str_random(20) . '.' . $extension;
            while(file_exists($destinationPath . $safeName)){
                $safeName = 'cv_' . str_random(20) . '.' . $extension;
            }
            $file->move($destinationPath, $safeName);
            $user_data['cv_file_id'] = File::insertGetId(['filename' => $safeName, 'mime' => $mime]);
        }

        //upload image
        if ($file = $request->file('pic_file')) {
            $extension = $file->extension()?: 'png';
            $mime = $file->getMimeType();
            $destinationPath = public_path() . '/files/';
            $safeName = 'pic_' . str_random(20) . '.' . $extension;
            while(file_exists($destinationPath . $safeName)){
                $safeName = 'pic_' . str_random(20) . '.' . $extension;
            }
            $file->move($destinationPath, $safeName);
            $user_data['pic_file_id'] = File::insertGetId(['filename' => $safeName, 'mime' => $mime]);
        }

        //upload video
        if ($file = $request->file('video_file')) {
            $extension = $file->extension();
            $mime = $file->getMimeType();
            $destinationPath = public_path() . '/files/';
            $safeName = 'video_' . str_random(20) . '.' . $extension;
            while(file_exists($destinationPath . $safeName)){
                $safeName = 'video_' . str_random(20) . '.' . $extension;
            }
            $file->move($destinationPath, $safeName);
            $user_data['video_file_id'] = File::insertGetId(['filename' => $safeName, 'mime' => $mime]);
        }

        //generate user link by sluging his name
        $link = self::slugify($request->first_name .' '. $request->last_name);
        while(User::where('link',$link)->first())
        {
            $link = self::slugify($request->first_name .' '. $request->last_name . '-' . str_random(4));
        }

        $user_data['link'] = $link;
        $user_data['password'] = str_random(8); //generate random password for user

        $activate = $request->get('activate') ? true : false;
        $data = new stdClass();

        try {
            // Register the user
            $user = Sentinel::register($user_data, $activate);

            //add user to 'User' group
            $role = Sentinel::findRoleBySlug('user');
            if ($role) {
                $role->users()->attach($user);
            }
            //check for activation and send activation mail if not activated by default
            if (!$activate) {
                // Data to be used on the email view
                $data->user_name = $user->first_name .' '. $user->last_name;
                $data->activationUrl = URL::route('activate', [$user->id, Activation::create($user)->code]);

                // Send the activation code through email
                Mail::to($user->email)
                    ->send(new Restore($data));
            }



        }  catch (UserExistsException $e) {
            return back()->withError("This user already exist !");
        }

        // Redirect to the home page with success menu
        return redirect()->route('admin.users.index')->with('success', "User created successfully !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $questions = Question::all();
        return view(self::$view_folder . 'show', compact('user', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $activities = ActivityArea::all();
        $countries = Country::all();
        return view(self::$view_folder . 'edit', compact('user', 'questions', 'activities', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'present',
            'email' => 'required|email',
            'birthdate' => 'required|date|before:today',
            'sex' => 'required|in:M,F',
            'activity_area_id' => 'required|exists:activity_areas,id',
            'specialization' => 'required',
            'phone' => 'required',
            'city_id' => 'required|exists:cities,id',
            'cv_file' => 'file|mimes:pdf',
            'pic_file' => 'file|image',
            'video_file' => 'mimes:mp4,mov,ogg,qt'
        ]);

        if($user->email != $request->email){
            $emailAlreadyTaken = User::whereEmail($request->email)->first();
            if($emailAlreadyTaken){
                return back()->withError("The mail address you enter ($request->email) has already been taken !");
            }
        }


        $user_data = $request->except('_token', '_method', 'country_id', 'pic_file', 'cv_file', 'pic_file', 'video_file');
        $file_to_delete = [];
        $file_to_delete_ids = [];

        //upload cv
        if ($file = $request->file('cv_file')) {
            $extension = $file->extension()?: 'pdf';
            $mime = $file->getMimeType();
            $destinationPath = public_path() . '/files/';
            $safeName = 'cv_' . str_random(20) . '.' . $extension;
            while(file_exists($destinationPath . $safeName)){
                $safeName = 'cv_' . str_random(20) . '.' . $extension;
            }
            $file->move($destinationPath, $safeName);
            $user_data['cv_file_id'] = File::insertGetId(['filename' => $safeName, 'mime' => $mime]);
            if($user->cv){
                array_push($file_to_delete, $destinationPath . $user->cv->filename);
                array_push($file_to_delete_ids, $user->cv->id);
            }
        }

        //upload image
        if ($file = $request->file('pic_file')) {
            $extension = $file->extension()?: 'png';
            $mime = $file->getMimeType();
            $destinationPath = public_path() . '/files/';
            $safeName = 'pic_' . str_random(20) . '.' . $extension;
            while(file_exists($destinationPath . $safeName)){
                $safeName = 'pic_' . str_random(20) . '.' . $extension;
            }
            $file->move($destinationPath, $safeName);
            $user_data['pic_file_id'] = File::insertGetId(['filename' => $safeName, 'mime' => $mime]);

            if($user->pic){
                array_push($file_to_delete, $destinationPath . $user->pic->filename);
                array_push($file_to_delete_ids, $user->pic->id);
            }
        }

        //upload video
        if ($file = $request->file('video_file')) {
            $extension = $file->extension();
            $mime = $file->getMimeType();
            $destinationPath = public_path() . '/files/';
            $safeName = 'video_' . str_random(20) . '.' . $extension;
            while(file_exists($destinationPath . $safeName)){
                $safeName = 'video_' . str_random(20) . '.' . $extension;
            }
            $file->move($destinationPath, $safeName);
            $user_data['video_file_id'] = File::insertGetId(['filename' => $safeName, 'mime' => $mime]);

            if($user->video){
                array_push($file_to_delete, $destinationPath . $user->video->filename);
                array_push($file_to_delete_ids, $user->video->id);
            }
        }

        User::whereId($user->id)->update($user_data);

        //delete user files
        File::whereIn('id',$file_to_delete_ids)->delete();
        foreach($file_to_delete as $item){
            if(file_exists($item)){
                unlink($item);
            }
        }

        // Redirect to the home page with success menu
        return redirect()->route('admin.users.index')->with('success', "User updated successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->id === Sentinel::getUser()->id) {
            return back()->withError("You can't block your self!");
        }
        // Delete the user
        //to allow soft deleted, we are performing query on users model instead of Sentinel model
        User::destroy($user->id);
        return back()->withSuccess("User blocked successfully !");
    }


    public function ajaxCheckEmail(Request $req)
    {
        $req->validate(['email' => 'required']);

        $exist = User::whereEmail($req->email)->first();

        return response()->json(['status' => $exist != null]);
    }


    /**
     * Get deleted users
     */
    public function trashed()
    {
        $users = User::onlyTrashed()->get();
        return view(self::$view_folder . 'trashed', compact('users'));
    }

    public function hardDelete($id)
    {
        if($id === Sentinel::getUser()->id) {
            return back()->withError("You can't delete your self !");
        }

        $user = User::onlyTrashed()->whereId($id)->first();
        if(!$user){
            return back()->withError("You can not delete non blocqued user !");
        }

        //before delete user we remend his files
        $file_to_delete = [];
        $file_to_delete_ids = [];
        $destinationPath = public_path() . '/files/';
        if($user->cv){
            array_push($file_to_delete, $destinationPath . $user->cv->filename);
            array_push($file_to_delete_ids, $user->cv->id);
        }
        if($user->pic){
            array_push($file_to_delete, $destinationPath . $user->pic->filename);
            array_push($file_to_delete_ids, $user->pic->id);
        }
        if($user->video){
            array_push($file_to_delete, $destinationPath . $user->video->filename);
            array_push($file_to_delete_ids, $user->video->id);
        }
        //Hard delete of user
        $user->forceDelete();

        //delete user files
        File::whereIn('id',$file_to_delete_ids)->delete();
        foreach($file_to_delete as $item){
            if(file_exists($item)){
                unlink($item);
            }
        }

        return back()->withSuccess("User deleted successfully !");
    }

    public function restore($id)
    {
        User::onlyTrashed()->whereId($id)->restore();
        return back()->withSuccess("User deblocked successfully !");
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

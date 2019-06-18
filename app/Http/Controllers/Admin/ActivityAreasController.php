<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ActivityArea;

class AtivityAreasController extends Controller
{
    /**
     * Base path to the view of this controller
     */
    public static $view_folder = 'admin.activity_areas.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = ActivityArea::withTrashed()->get();
        return view(self::$view_folder . 'index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return back();
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
            'name' => 'required',
            'description' => 'present'
        ]);
        
        $alreadyExists = ActivityArea::where('name',$request->input('name'))->first() ;

        if( $alreadyExists ){
            return redirect()->route('admin.activity_areas.index')->withError('Activity area already exists');

        }
        ActivityArea::create($request->except('_token', '_method'));

        return redirect()->route('admin.activity_areas.index')->withSuccess('Activity area added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ActivityArea::whereId($id)->delete();
        return back()->withSuccess("Activity area disabled successfully !");
    }

    public function restore($id)
    {
        ActivityArea::onlyTrashed()->whereId($id)->restore();
        return back()->withSuccess("Activity area enabled successfully !");
    }
}

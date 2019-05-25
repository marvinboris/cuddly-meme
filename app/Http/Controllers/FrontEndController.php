<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\ActivityArea;
use App\Setting;

class FrontEndController extends Controller
{
    public function ajaxGetCitiesByCountry(Request $req) {
        $req->validate(['id' => 'required|numeric|exists:countries,id']);
        $resp = City::where('country_id',$req->id)->select('id','name')->get();
        return response()->json($resp);
    }


    public function ajaxSearchCities(Request $req){
        $req->validate(['q' => 'required']);
        $data = City::distinct()->where('name','like',"$req->q%")->limit(10)->pluck('name');
        return response()->json($data);
    }


    public function home() {
        $activityAreas = ActivityArea::all();
        $activityAreas = array_sort($activityAreas, function ($item, $i) {
                            return -1*$item->users->count();
                        });
        $setting = Setting::first();
        $cities = City::all();
        return view('welcome', compact('activityAreas','setting','cities'));
    }


    public function register() {
        return 'register';
    }

    public function searchWorker(Request $req) {
        if($req->isMethod('POST')) {
            $req->validate([
                'a' => 'required|exists:activity_areas,id',
                'l' => 'required'
            ]);
        }


        return 'searchWorker';
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Country;
use App\ActivityArea;
use App\Setting;
use App\User;

class FrontEndController extends Controller
{
    public function ajaxGetCitiesByCountry(Request $req) {
        $req->validate(['id' => 'required|numeric|exists:countries,id']);
        $resp = City::where('country_id',$req->id)->select('id','name')->get();
        return response()->json($resp);
    }


    public function ajaxSearchCities(Request $req){
        $req->validate(['q' => 'required']);
        $data1 = City::distinct()->where('name','like',"$req->q%")->limit(8)->pluck('name')->toArray();
        $data2 = Country::distinct()->where('name','like',"$req->q%")->limit(7)->pluck('name')->toArray();
        $data = array_merge($data1, $data2);
        return response()->json($data);
    }


    public function home() {
        $activityAreas = ActivityArea::all();
        $activityAreas = array_sort($activityAreas, function ($item, $i) {
                            return -1*$item->users->count();
                        });
        $setting = Setting::first();
        return view('welcome', compact('activityAreas','setting'));
    }


    public function register() {
        return 'register';
    }

    public function searchWorker(Request $req) {

        $location = $req['l'] ?: '';
        $activity_id = $req['a'] ?: '';


        $activityAreas = ActivityArea::all();
        $query = User::select('users.*');

        if($activity_id) {
            $query = $query->where('users.activity_area_id',$activity_id);
        }

        if($location) {
            $query = $query->join('cities','cities.id','=','users.city_id')
                        ->join('countries','countries.id','=','cities.country_id')
                        ->where(function ($query) use ($location) {
                            $query->Where('cities.name','like',"%$location%")
                            ->orWhere('countries.name','like',"%$location%");
                        });
        }

        //$users = $query->simplePaginate(1);
        $users = $query->paginate(10);
        $total = json_decode($users->toJson());
        $total = $total->total;

        return view('search-workers', compact('activityAreas','location','activity_id','users','total'));
    }


    public function userLink($link) {
        $user = User::whereLink($link)->first();
        if(!$user){
            abort(404);
        }
        return view('user-details', compact('user'));
    }
}

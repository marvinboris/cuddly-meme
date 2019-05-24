<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class FrontEndController extends Controller
{
    public function ajaxGetCitiesByCountry(Request $req) {
        $req->validate(['id' => 'required|numeric|exists:countries,id']);
        $resp = City::where('country_id',$req->id)->select('id','name')->get();
        return response()->json($resp);
    }
}

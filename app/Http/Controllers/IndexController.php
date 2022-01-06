<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Guest;

class IndexController extends Controller
{
    public function init(){

        $province = Province::all();
        $city = City::all();

        return view('welcome', [
            'province' => $province,
            'city' => $city
        ]);
    }

    public function store(Request $request){

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'organization' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
        ]);

        $guest = new Guest();
        $guest->first_name = $request->first_name;
        $guest->last_name = $request->last_name;
        $guest->organization = $request->organization;
        $guest->address = $request->address;
        $guest->id_province = $request->province;
        $guest->id_city = $request->city;
        $guest->state = 'Active';
        $guest->save();

        return redirect('/')->with('info', 'Data saved successfully.');
    }
}

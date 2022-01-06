<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Province;
use App\Models\City;

class PageController extends Controller
{
    /**
     * Display tables page
     *
     * @return \Illuminate\View\View
     */
    public function tables()
    {
        $guest = Guest::all();
        return view('pages.tables', ['guest'=>$guest]);
    }

    public function addTables()
    {
        $city = City::all();
        $province = Province::all();
        return view('pages.add_tables', ['city'=>$city, 'province'=>$province]);
    }

    public function addGuest(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'organization' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
        ]);

        $guest = new Guest;
        $guest->first_name = $request->get('first_name');
        $guest->last_name = $request->get('last_name');
        $guest->organization = $request->get('organization');
        $guest->address = $request->get('address');
        $guest->id_province = $request->get('province');
        $guest->id_city = $request->get('city');
        $guest->state = 'Active';

        $guest->save();

        return redirect(route('pages.tables'));
    }

    public function editGuest(string $id)
    {
        $guest = Guest::find($id);

        $city = City::all();
        $province = Province::all();
        return view('pages.edit_tables', ['city'=>$city, 'province'=>$province, 'guest'=>$guest, 'id'=>$id]);
    }

    public function updateGuest(Request $request, string $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'organization' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
        ]);

        $guest = Guest::find($id);
        $guest->first_name = $request->get('first_name');
        $guest->last_name = $request->get('last_name');
        $guest->organization = $request->get('organization');
        $guest->address = $request->get('address');
        $guest->id_province = $request->get('province');
        $guest->id_city = $request->get('city');

        $guest->save();

        return redirect(route('pages.tables'));
    }

    public function delete($id){
        $guest = Guest::find($id);
        $guest->state = 'Inactive';
        $guest->save();

        return redirect('/tables');
    }
}

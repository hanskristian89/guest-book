<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;

class ApiController extends Controller
{
    public static function apiCity(string $id_province)
    {
        $province = Province::find($id_province);
        $city = City::where('kode', 'like', $province->kode. '%')->get();
        $option = '<option style="color: black" value="" selected disabled>City</option>';

        foreach ($city as $c) {
            $option .= '<option style="color: black" value="'.$c->id.'">'.$c->nama.'</option>';
        }

        $html = '
        <div id="city" class="form-group">
            <label>City</label>
            <select class="form-control" name="city">
            '.$option.'
            </select>
        </div>';

        return $html;
    }
}

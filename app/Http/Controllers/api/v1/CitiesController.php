<?php

namespace App\Http\Controllers\api\v1;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return response()->json($cities);
    }
}

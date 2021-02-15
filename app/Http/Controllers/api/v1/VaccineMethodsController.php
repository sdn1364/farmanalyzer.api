<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Vaccine_method;
use Illuminate\Http\Request;

class VaccineMethodsController extends Controller
{
    public function index()
    {
        $vaccines_method = Vaccine_method::all();
        return response()->json($vaccines_method);
    }
}

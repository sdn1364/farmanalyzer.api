<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Vaccine;
use Illuminate\Http\Request;

class VaccinesController extends Controller
{
    public function index()
    {
        $vaccines = Vaccine::all();
        return response()->json($vaccines);
    }
}

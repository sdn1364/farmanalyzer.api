<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Vaccine_company;
use Illuminate\Http\Request;

class VaccineCompaniesController extends Controller
{
    public function index()
    {
        $vaccines_company = Vaccine_company::all();
        return response()->json($vaccines_company);
    }
}

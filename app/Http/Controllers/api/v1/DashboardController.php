<?php

namespace App\Http\Controllers\api\v1;

use App\Farm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $farms = Farm::count();
        $data = [
            'farmCount' => $farms
        ];
        return response()->json($data);

    }
}

<?php

namespace App\Http\Controllers\api\v1;

use App\Farmer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FarmersController extends Controller
{
    public function list()
    {
        $farmers = Farmer::all();
        return response()->json($farmers);
    }
}
 

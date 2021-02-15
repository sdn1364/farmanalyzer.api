<?php

namespace App\Http\Controllers\api\v1;

use App\Farm;
use App\Farmer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FarmsController extends Controller
{

    public function index()
    {
        $farms = Farm::all();
        return response()->json($farms);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $farm = Farm::with('farmer')->where('id',$id)->first();
        return response()->json($farm);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

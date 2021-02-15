<?php

namespace App\Http\Controllers;

use App\Andata;
use App\Farm;
use App\Herd;
use Illuminate\Http\Request;

class AnalysisesController extends Controller
{
    public function show(Farm $farm, Herd $herd)
    {
        $analysises = Andata::where(['farm_id'=>$farm->id,'herd_id'=>$herd->id])->orderBy('current_age','asc')->get();
        return view('pages.analysis.index',compact(['farm','herd','analysises']));
    }

    public function edit(Andata $andata)
    {

    }
}

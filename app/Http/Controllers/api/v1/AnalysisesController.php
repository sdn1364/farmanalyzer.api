<?php

namespace App\Http\Controllers\api\v1;

use App\Andata;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AnalysisesController extends Controller
{
    public function getData($id,$days)
    {

        $analysises = Andata::with(['vaccine','vaccine_method','vaccine_company'])->where('herd_id', $id)
            ->whereBetween('date',[Carbon::now()->subDays($days+1), Carbon::now()->subDays(1)])
            ->get();
        return response()->json($analysises);
    }

    public function getRecord($id,$day)
    {
        $analysises = Andata::with(['vaccine','vaccine_method','vaccine_company'])->where('herd_id', $id)
            ->where('current_age',$day)
            ->first();
        return response()->json($analysises);
    }
    public function saveLoss($id,$day)
    {
        $andata = Andata::where('herd_id', $id)
            ->where('current_age',$day)->first();
        $andata->loss = request('loss');
        $andata->save();
        return response()->json();
    }
    public function saveTemperature($id,$day)
    {
        $andata = Andata::where('herd_id', $id)
            ->where('current_age',$day)->first();
        $andata->temperature = request('temperature');
        $andata->save();
        return response()->json();
    }
    public function saveHumidity($id,$day)
    {
        $andata = Andata::where('herd_id', $id)
            ->where('current_age',$day)->first();
        $andata->humidity = request('humidity');
        $andata->save();
        return response()->json();
    }
    public function saveLight($id,$day)
    {
        $andata = Andata::where('herd_id', $id)
            ->where('current_age',$day)->first();
        $andata->humidity = request('humidity');
        $andata->save();
        return response()->json();
    }
    public function saveWeight($id,$day)
    {
        $andata = Andata::where('herd_id', $id)
            ->where('current_age',$day)->first();
        $andata->weight = request('weight');
        $andata->save();
        return response()->json();
    }
    public function saveFood($id,$day)
    {
        $andata = Andata::where('herd_id', $id)
            ->where('current_age',$day)->first();
        $andata->pre_starter = request('pre_starter');
        $andata->pre_seed = request('pre_seed');
        $andata->growth_seed = request('growth_seed');
        $andata->after_seed_a = request('after_seed_a');
        $andata->after_seed_b = request('after_seed_b');
        $andata->save();
        return response()->json();
    }
    public function saveVaccine($id,$day)
    {
        $andata = Andata::where('herd_id', $id)
            ->where('current_age',$day)->first();
        $andata->vaccine_id = request('vaccine_id');
        $andata->vaccine_method_id = request('vaccine_method');
        $andata->vaccine_company_id = request('vaccine_company');
        $andata->save();
        return response()->json();
    }
}


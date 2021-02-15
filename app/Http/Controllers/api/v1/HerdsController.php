<?php

namespace App\Http\Controllers\api\v1;

use App\Andata;
use App\Farm;
use App\Herd;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class HerdsController extends Controller
{
    public function index(Farm $farm)
    {
        $herds = Herd::where('farm_id',$farm->id)->get();
        return response()->json($herds);
    }

    public function show(Herd $herd)
    {
        return response()->json($herd);
    }

    public function store()
    {
        $herd = Herd::create(request()->all());
        $farm = Farm::find(request('farm_id'));
        $herd_age = request('age');
        $herd_start_date =CalendarUtils::createDateTimeFromFormat('Y/m/d',request('start_date'));
        $start_day = new Carbon($herd_start_date);

        for($i=1; $i<=$herd_age; $i++){
            if($i == 1){
                Andata::create(
                    [
                        'date' => $start_day,
                        'farm_id'=>$farm->id,
                        'herd_id'=>$herd->id,
                        'current_age'=> $i,
                    ]
                );
            }else{
                Andata::create(
                    [
                        'date' => $start_day->addDays(1),
                        'farm_id'=>$farm->id,
                        'herd_id'=>$herd->id,
                        'current_age'=> $i,
                    ]
                );
            }

        }
        return response()->json($herd);
    }
}

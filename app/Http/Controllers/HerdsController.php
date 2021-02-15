<?php

namespace App\Http\Controllers;

use App\Andata;
use App\Farm;
use App\Herd;
use Carbon\Carbon;
use Morilog\Jalali\CalendarUtils;

class HerdsController extends Controller
{

    public function index()
    {
        $herds = Herd::paginate(15);
        return view('pages.herd.index',compact('herds'));
    }


    public function create()
    {
        $farms = Farm::all();
        if(!$farms){
            return back()->with('error', 'ابتدا یک گله ایجاد کنید.');
        }
        return view('pages.herd.create',compact('farms'));
    }

    public function store(){

        $herd_start_date =CalendarUtils::createDateTimeFromFormat('Y/m/d',request('start_date'));
        $herd = Herd::create(array_merge($this->validateData(),['start_date'=>$herd_start_date]));
        $farm = Farm::find(request('farm_id'));
        $herd_age = request('age');
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
        return redirect(route('farm.index'))->with('success','گله جدید به مرغداری اضافه شد.');
    }

    public function show(Herd $herd)
    {
        $herds = Herd::where('id',$herd->farm_id)->paginate(15);

        return view('pages.herd.index', compact('herds'));
    }

    public function edit(Herd $herd)
    {
        $farms = Farm::all();
        return view('pages.herd.edit',compact(['farms','herd']));
    }

    public function update(Herd $herd)
    {
        $herd->update($this->validateData());
        return redirect(route('herd.show',$herd->farm_id))->with('success','گله ویرایش شد.');
    }

    public function destroy(Herd $herd)
    {
        $herd->delete();
        return redirect(route('herd.show',$herd->farm_id))->with('success','گله حذف شد.');

    }
    public function validateData()
    {
        return request()->validate([
            'herd_number'=> 'required',
            'farm_id'=> 'nullable',
            'start_date'=> 'nullable',
            'age'=> 'nullable',
            'quantity'=> 'nullable',
            'saloon_area'=> 'nullable',
            'capacity'=> 'nullable',
        ]);
    }
}

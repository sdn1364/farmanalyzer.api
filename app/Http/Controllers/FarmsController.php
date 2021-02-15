<?php

namespace App\Http\Controllers;

use App\Andata;
use App\City;
use App\Expert;
use App\Farm;
use App\Farmer;
use App\Herd;
use App\Province;
use Illuminate\Http\Request;
use App\Worker;

class FarmsController extends Controller
{
    public function index()
    {
        $farms = Farm::paginate(15);
        return view('pages.farm.index', compact('farms'));
    }

    public function create()
    {
        $cities = City::all();
        if(!$cities){
            return back()->with('error', 'ابتدا  یک شهر ایجاد کنید');
        }
        $provinces = Province::all();
        if(!$provinces){
            return back()->with('error', 'ابتدا یک استان ایجاد کنید.');
        }
        $farmers = Farmer::all();
        if(!$farmers){
            return back()->with('error', 'ابتدا یک مرغدار ایجاد کنید.');
        }
        $experts = Expert::all();
        if(!$experts){
            return back()->with('error', 'ابتدا یک کارشناس ایجاد کنید.');
        }
        $workers = Worker::all();
        return view('pages.farm.create', compact(['workers','experts','farmers','cities', 'provinces']));
    }

    public function store()
    {
        Farm::create(array_merge($this->validateData(), ['worker'=>serialize(request('selectedWorkers'))]));
        return redirect(route('farm.index'))->with('success', 'مرغداری ایجاد شد');
    }

    public function show(Farm $farm)
    {
        $herds = Herd::where('farm_id', $farm->id)->get();
        return view('pages.farm.show',compact(['farm','herds']));
    }
    public function edit(Farm $farm)
    {
        $cities = City::all();
        $provinces = Province::all();
        $farmers = Farmer::all();
        $experts = Expert::all();
        $workers = Worker::all();
        return view('pages.farm.edit', compact(['farm','workers','experts','farmers','cities', 'provinces']));
    }

    public function update(Farm $farm)
    {
        $farm->update($this->validateData());
        return redirect(route('farm.index'))->with('success', 'مرغداری مورد نظر ویراش شد');
    }

    public function destroy(Farm $farm)
    {
        $farm->delete();
        return redirect(route('farm.index'))->with('success', 'مرغداری مورد نظر حذف شد');
    }
    public function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'farmer_id' => 'required',
            'birthday' => 'nullable',
            'cell' => 'nullable',
            'email' => 'nullable',
            'type' => 'nullable',
            'province_id' => 'nullable',
            'city_id' => 'nullable',
            'expert_id' => 'nullable',
            'address' => 'nullable',
            'phone_number' => 'nullable',
            'gmap' => 'nullable',
            'herd' => 'nullable',
        ]);
    }
}

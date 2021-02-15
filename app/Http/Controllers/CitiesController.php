<?php

namespace App\Http\Controllers;

use App\City;
use App\Events\CreateLogEvent;
use App\Province;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::paginate(15);
        return view('pages.city.index', compact('cities'));
    }

    public function create()
    {
        $provinces = Province::all();
        if(!$provinces){
            return back()->with('error', 'ابتدا یک استان ایجاد کنید.');
        }
        return view('pages.city.create', compact('provinces'));
    }

    public function store()
    {
        $city = City::create($this->ValidateData());
        event(new CreateLogEvent(auth()->user()->name.'،شهر '.$city->name.' را ایجاد کرد.'));

        return redirect(route('city.index'))->with('success', 'شهر مورد نظر ایجاد شد.');
    }

    public function show(City $city)
    {

    }

    public function edit(City $city)
    {
        $provinces = Province::all();
        return view('pages.city.edit', compact(['provinces','city']));
    }

    public function update(City $city)
    {
        $city->update($this->ValidateData());
        event(new CreateLogEvent(auth()->user()->name.'،شهر '.$city->name.' را ویرایش کرد.'));

        return view('pages.city.index')->with('success','شهر مورد نظر ویرایش شد');
    }

    public function destroy(City $city)
    {
        $city->delete();
        event(new CreateLogEvent(auth()->user()->name.'،شهر '.$city->name.' را حذف کرد.'));
        return redirect(route('city.index'))->with('success','شهر مورد نظر حذف شد');
    }

    public function ValidateData()
    {
        return request()->validate([
            'name' => 'required',
            'province_id'=> 'nullable'
        ]);
    }
}

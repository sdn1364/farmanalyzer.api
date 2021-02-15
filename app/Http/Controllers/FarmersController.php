<?php

namespace App\Http\Controllers;

use App\Andata;
use App\City;
use App\Farmer;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FarmersController extends Controller
{

    public function index()
    {
        $farmers = Farmer::paginate(15);
        return view('pages.farmer.index',compact('farmers'));
    }

    public function create()
    {
        $cities = City::all();
        $provinces = Province::all();
        return view('pages.farmer.create',compact(['cities','provinces']));
    }

    public function store(Request $request)
    {

        $birthday_exp = explode('/',request('birthday'));

        $birthday = implode('-',\Morilog\Jalali\CalendarUtils::toGregorian($birthday_exp[0],$birthday_exp[1],$birthday_exp[2])).' '.Carbon::now()->format('H:i:s');

        Farmer::create(array_merge($this->validateData(),['birthday'=>$birthday]));
        return redirect(route('farmer.index'))->with('success', 'مرغدار ایجاد شد');
    }

    public function show(Farmer $farmer)
    {

    }

    public function edit(Farmer $farmer)
    {
        $cities = City::all();
        $provinces = Province::all();
        return view('pages.farmer.edit',compact(['farmer','cities','provinces']));
    }


    public function update(Farmer $farmer)
    {
        $birthday_exp = explode('/',request('birthday'));

        $birthday = implode('-',\Morilog\Jalali\CalendarUtils::toGregorian($birthday_exp[0],$birthday_exp[1],$birthday_exp[2])).' '.Carbon::now()->format('H:i:s');

        $farmer->update(array_merge($this->validateData(),['birthday'=>$birthday]));
        return redirect(route('farmer.index'))->with('success', 'مرغدار ویرایش شد');
    }

    public function destroy(Farmer $farmer)
    {
        $farmer->delete();
        return redirect(route('farmer.index'))->with('success','مرغدار حذف شد');
    }

    public function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthday' => 'nullable',
            'education' => 'nullable',
            'gender' => 'nullable',
            'work_experience' => 'nullable',
            'photo' => 'nullable',
            'city_id' => 'nullable',
            'province_id' => 'nullable',

        ]);
    }

}

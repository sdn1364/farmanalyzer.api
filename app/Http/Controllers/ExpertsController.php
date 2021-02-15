<?php

namespace App\Http\Controllers;

use App\Events\CreateLogEvent;
use App\Expert;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ExpertsController extends Controller
{

    public function index()
    {
        $experts = Expert::paginate(15);
        return view('pages.expert.index',compact('experts'));
    }

    public function create()
    {
        return view('pages.expert.create');
    }

    public function store()
    {
        $birthday_exp = explode('/',request('birthday'));

        $birthday = implode('-',\Morilog\Jalali\CalendarUtils::toGregorian($birthday_exp[0],$birthday_exp[1],$birthday_exp[2])).' '.Carbon::now()->format('H:i:s');

        $expert =  Expert::create(array_merge($this->validateData(),['birthday'=>$birthday]));
        event(new CreateLogEvent(auth()->user()->name.'،کارشناس '.$expert->name.' را ایجاد کرد.'));

        return redirect(route('expert.index'))->with('success','کارشناس جدید ایجاد شد.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Expert $expert)
    {
        return view('pages.expert.edit', compact('expert'));
    }

    public function update(Expert $expert)
    {
        $birthday_exp = explode('/',request('birthday'));

        $birthday = implode('-',\Morilog\Jalali\CalendarUtils::toGregorian($birthday_exp[0],$birthday_exp[1],$birthday_exp[2])).' '.Carbon::now()->format('H:i:s');

        $expert->update(array_merge($this->validateData(),['birthday'=>$birthday]));
        event(new CreateLogEvent(auth()->user()->name.'،کارشناس '.$expert->name.' را ویرایش کرد.'));

        return redirect(route('expert.index'))->with('success','کارشناس مورد نظر ویرایش شد');
    }

    public function destroy(Expert $expert)
    {
        $expert->delete();
        event(new CreateLogEvent(auth()->user()->name.'،کارشناس '.$expert->name.' را حذف کرد.'));

        return redirect(route('expert.index'))->with('success','کارشناس مورد نظر حذف شد');
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
            'phone_number' => 'nullable',

        ]);
    }
}

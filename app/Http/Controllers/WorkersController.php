<?php

namespace App\Http\Controllers;

use App\Worker;
use Illuminate\Support\Carbon;
use Morilog\Jalali\Jalalian;

class WorkersController extends Controller
{

    public function index()
    {
        $workers = Worker::paginate(15);
        return view('pages.worker.index',compact('workers'));
    }

    public function create()
    {
        return view('pages.worker.create');
    }

    public function store()
    {
        $birthday_exp = explode('/',request('birthday'));

        $birthday = implode('-',\Morilog\Jalali\CalendarUtils::toGregorian($birthday_exp[0],$birthday_exp[1],$birthday_exp[2])).' '.Carbon::now()->format('H:i:s');

        Worker::create(array_merge($this->validateData(),['birthday'=>$birthday]));
        return redirect(route('worker.index'))->with('success','کارگر جدید ایجاد شد.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Worker $worker)
    {
        return view('pages.worker.edit', compact('worker'));
    }

    public function update(Worker $worker)
    {
        $birthday_exp = explode('/',request('birthday'));

        $birthday = implode('-',\Morilog\Jalali\CalendarUtils::toGregorian($birthday_exp[0],$birthday_exp[1],$birthday_exp[2])).' '.Carbon::now()->format('H:i:s');

        $worker->update(array_merge($this->validateData(),['birthday'=>$birthday]));
        return redirect(route('worker.index'))->with('success','کارگر مورد نظر ویرایش شد');
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();
        return redirect(route('worker.index'))->with('success','کارگر مورد نظر حذف شد');
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

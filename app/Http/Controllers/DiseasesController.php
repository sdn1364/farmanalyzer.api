<?php

namespace App\Http\Controllers;

use App\Disease;
use App\Events\CreateLogEvent;
use Illuminate\Http\Request;

class DiseasesController extends Controller
{

    public function index()
    {
        $diseases = Disease::paginate(15);
        return view('pages.disease.index',compact('diseases'));
    }


    public function create()
    {
        return view('pages.disease.create');
    }

    public function store()
    {
        $disease = Disease::create($this->validateData());
        event(new CreateLogEvent(auth()->user()->name.'،بیماری '.$disease->name.' را ایجاد کرد.'));

        return redirect(route('disease.index'))->with('success','بیماری موردنظر ایجاد شد.');
    }

    public function show(Disease $disease)
    {
        //
    }

    public function edit(Disease $disease)
    {
        return view('pages.disease.edit',compact('disease'));
    }

    public function update(Disease $disease)
    {
        $disease->update($this->validateData());
        event(new CreateLogEvent(auth()->user()->name.'،بیماری '.$disease->name.' را ویرایش کرد.'));
        return redirect(route('disease.index'))->with('success', 'بیماری مورد نظر ویرایش شد');
    }

    public function destroy(Disease $disease)
    {
        $disease->delete();
        event(new CreateLogEvent(auth()->user()->name.'،بیماری '.$disease->name.' را حذف کرد.'));

        return redirect(route('disease.index'))->with('success', 'بیماری مورد نظر حذف شد.');
    }

    public function validateData()
    {
        return request()->validate([
            'name'=> 'required'
        ]);
    }
}

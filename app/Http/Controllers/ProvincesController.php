<?php

namespace App\Http\Controllers;

use App\Events\CreateLogEvent;
use App\Province;
use Illuminate\Http\Request;

class ProvincesController extends Controller
{

    public function index()
    {
        $provinces = Province::paginate(15);
        return view('pages.province.index',compact('provinces'));
    }

    public function create()
    {
        return view('pages.province.create');
    }

    public function store()
    {
        $province = Province::create($this->validateData());

        event(new CreateLogEvent(auth()->user()->name.'،استان '.$province->name.' را ایجاد کرد.'));
        return redirect(route('province.index'))->with('success', 'استان مورد نظر ایجاد شد');
    }

    public function show(Province $province)
    {
        //
    }
    public function edit(Province $province)
    {
        return view('pages.province.edit', compact('province'));
    }

    public function update(Province $province)
    {
       $province->update($this->validateData());
        event(new CreateLogEvent(auth()->user()->name.'،استان '.$province->name.' را ویرایش کرد.'));

        return redirect(route('province.index'))->with('success', 'استان مورد نظر ویرایش شد');
    }

    public function destroy(Province $province)
    {
        $province->delete();
        event(new CreateLogEvent(auth()->user()->name.'،استان '.$province->name.' را حذف کرد.'));

        return redirect(route('province.index'))->with('success','استان مورد نظر حذف شد');

    }

    public function validateData()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}

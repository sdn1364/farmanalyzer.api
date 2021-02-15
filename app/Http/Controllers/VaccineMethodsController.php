<?php

namespace App\Http\Controllers;

use App\Vaccine_method;
use Illuminate\Http\Request;

class VaccineMethodsController extends Controller
{

    public function index()
    {
        $vaccine_methods = Vaccine_method::paginate(15);
        return view('pages.vaccine_method.index',compact('vaccine_methods'));
    }

    public function create()
    {
        return view('pages.vaccine_method.create');
    }

    public function store()
    {
        Vaccine_method::create($this->validateData());
        return redirect(route('vaccine_method.index'))->with('success','روش واکسیناسیون جدید ایجاد شد.');
    }

    public function show(Vaccine_method $vaccine_method)
    {
        //
    }

    public function edit(Vaccine_method $vaccine_method)
    {
        return view('pages.vaccine_method.edit', compact('vaccine_method'));
    }

    public function update(Vaccine_method $vaccine_method)
    {
        $vaccine_method->update($this->validateData());
        return redirect(route('vaccine_method.index'))->with('success','روش واکسیناسیون مورد نظر ویرایش شد.');

    }

    public function destroy(Vaccine_method $vaccine_method)
    {
        $vaccine_method->delete();
        return redirect(route('vaccine_method.index'))->with('success','روش واکسیناسیون مورد نظر حذف شد.');
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}

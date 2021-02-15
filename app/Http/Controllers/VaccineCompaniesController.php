<?php

namespace App\Http\Controllers;

use App\Vaccine_company;
use Illuminate\Http\Request;

class VaccineCompaniesController extends Controller
{

    public function index()
    {
        $vaccine_companies = Vaccine_company::paginate(15);
        return view('pages.vaccine_company.index',compact('vaccine_companies'));
    }

    public function create()
    {
        return view('pages.vaccine_company.create');
    }

    public function store()
    {
        Vaccine_company::create($this->validateData());
        return redirect(route('vaccine_company.index'))->with('success','روش واکسیناسیون جدید ایجاد شد.');
    }

    public function show(Vaccine_company $vaccine_company)
    {
        //
    }

    public function edit(Vaccine_company $vaccine_company)
    {
        return view('pages.vaccine_company.edit', compact('vaccine_company'));
    }

    public function update(Vaccine_company $vaccine_company)
    {
        $vaccine_company->update($this->validateData());
        return redirect(route('vaccine_company.index'))->with('success','روش واکسیناسیون مورد نظر ویرایش شد.');

    }

    public function destroy(Vaccine_company $vaccine_method)
    {
        $vaccine_method->delete();
        return redirect(route('vaccine_company.index'))->with('success','روش واکسیناسیون مورد نظر حذف شد.');
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}

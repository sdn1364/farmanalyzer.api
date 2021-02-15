<?php

namespace App\Http\Controllers;

use App\Vaccine_category;
use Illuminate\Http\Request;

class VaccineCategoriesController extends Controller
{

    public function index()
    {
        $vaccine_categories = Vaccine_category::paginate(15);
        return view('pages.vaccine_category.index', compact('vaccine_categories'));
    }

    public function create()
    {
        return view('pages.vaccine_category.create');
    }

    public function store()
    {
        Vaccine_category::create($this->validateData());
        return redirect(route('vaccine_category.index'))->with('success','دسته‌بندی جدید ساخته شد.');
    }

    public function show(Vaccine_category $vaccine_category)
    {

    }

    public function edit(Vaccine_category $vaccine_category)
    {
        return view('pages.vaccine_category.edit',compact('vaccine_category'));
    }

    public function update(Vaccine_category $vaccine_category)
    {
        $vaccine_category->update($this->validateData());
        return redirect(route('vaccine_category.index'))->with('success','دسته‌بندی مورد نظر ویرایش شد.');
    }

    public function destroy(Vaccine_category $vaccine_category)
    {
        $vaccine_category->delete();
        return redirect(route('vaccine_category.index'))->with('success','دسته‌بندی جدید حذف شد.');
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}

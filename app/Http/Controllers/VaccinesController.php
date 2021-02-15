<?php

namespace App\Http\Controllers;

use App\Vaccine;
use App\Vaccine_category;
use Illuminate\Http\Request;

class VaccinesController extends Controller
{

    public function index()
    {
        $vaccines = Vaccine::paginate(15);
        return view('pages.vaccine.index',compact('vaccines'));
    }

    public function create()
    {
        $categories = Vaccine_category::all();
        if(!$categories){
            return back()->with('error', 'ابتدا یک دسته‌بندی واکسن ایجاد کنید.');
        }
        return view('pages.vaccine.create',compact('categories'));
    }

    public function store()
    {
        Vaccine::create($this->validateData());
        return redirect(route('vaccine.index'))->with('success','واکسن جدید ایجاد شد.');
    }
    public function show(Vaccine $vaccine)
    {
        //
    }

    public function edit(Vaccine $vaccine)
    {
        $vaccine_categories = Vaccine_category::all();
        return view('pages.vaccine.edit',compact(['vaccine','vaccine_categories']));
    }

    public function update(Vaccine $vaccine)
    {
        $vaccine->update($this->validateData());
        return redirect(route('vaccine.index'))->with('success','واکسن مورد نظر ویرایش شد');
    }

    public function destroy(Vaccine $vaccine)
    {
        $vaccine->delete();
        return redirect(route('vaccine.index'))->with('success','واکسن مورد نظر حذف شد');
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'vaccine_category_id' => 'required',
        ]);
    }
}

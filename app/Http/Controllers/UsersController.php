<?php

namespace App\Http\Controllers;

use App\Events\CreateLogEvent;
use App\Expert;
use App\Farmer;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        $farmers = Farmer::all();
        if(!$farmers){
            return back()->with('error', 'ابتدا یک مرغدار ایجاد کنید.');
        }
        $experts = Expert::all();
        if(!$experts){
            return back()->with('error', 'ابتدا یک کارشناس ایجاد کنید.');
        }

        return view('pages.user.create',compact(['farmers','experts']));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function showPassword(User $user)
    {
        return view('pages.user.changePassword',compact('user'));
    }

    public function resetPassword(User $user)
    {
        if($user->id === request('current_password')){
            if (request('password') === request('rePassword')) {
                $user->password = Hash::make(request('password'));
                $user->save();
                event(new CreateLogEvent(auth()->user()->name.'،کلمه‌عبور '.$user->name.' را تغییر داد.'));
                return redirect(route('user.index'))->with('success', 'کلمه عبور تغییر کرد.');

            }else{
                return redirect(route('user.index'))->with('error', 'کلمه‌های عبور جدید با هم مطابقت ندارند.');
            }
        }else{
            return redirect(route('user.index'))->with('error', 'کلمه عبور وارد شده صحیح نیست.');
        }
    }
}

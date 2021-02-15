<?php

namespace App\Http\Controllers;

use App\Events\CreateLogEvent;
use App\Messages;
use App\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{

    public function index()
    {
        $notifications = Messages::paginate(15);
        return view('pages.notification.index',compact('notifications'));
    }

    public function create()
    {
        $users = User::all();
        return view('pages.notification.create',compact('users'));
    }

    public function store()
    {
        $message = Messages::create([
            'user_id' => request('user_id'),
            'title' => request('title'),
            'message' => request('message'),
            'priority'=>request('priority')
        ]);
        event(new CreateLogEvent(auth()->user()->name.'، پیام'.$message->name.' را ایجاد کرد.'));
        return redirect(route('notification.index'))->with('success','پیام جدید ساخته شد.');
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
    public function validateData()
    {
        return request()->validate([
            'message'=> 'required',
            'title'=> 'required',
            'user_id'=>'nullable',
            'priority'=>'nullable'
        ]);
    }
}

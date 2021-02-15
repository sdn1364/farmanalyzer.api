<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Messages;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function messages(User $user)
    {
        $messages = Messages::where('user_id',$user->id)->get();
        return response()->json($messages);
    }
}

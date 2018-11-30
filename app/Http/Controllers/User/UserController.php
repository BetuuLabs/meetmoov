<?php

namespace App\Http\Controllers\User;

use App\Models\Event;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function events($user)
    {
        $user = User::where('slug',$user)->first();
        if ($user){
            return view('account.events');
        }
        //return view('account.events');
    }
}

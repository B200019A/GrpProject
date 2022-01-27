<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\User;


class ProfileController extends Controller
{
    ////show all user infomation in profile.blade.php follow the user id 
    public function profile($userId){
        
        $User=User::all()->where('id', $userId);
        //return view profile.blade.php
        return view('profile')->with('users', $User);
    }
}

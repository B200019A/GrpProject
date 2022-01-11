<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\User;


class ProfileController extends Controller
{
    public function profile($userId){
        
        $User=User::all()->where('id', $userId);
        return view('profile')->with('users', $User);
    }
    public function update($userId){
        $r=request();
        $userReset=User::find($userId);

        $userReset->name=$r->name;
        $userReset->email=$r->email;
        $userReset->password=$r->password;
        $userReset->save();
        
        $User=User::all()->where('id', $userId);
        Session::flash('successUpdate',"User Information update sucessfully!");
        return redirect()->route('profile')->with('users', $User);
    }
}

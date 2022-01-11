<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Student;
use Session;

class LoginController extends Controller
{
    public function change(){

        return view('loginPage');
    }
    public function check(){
        

        $r=request();

        $email_check=$r->your_email;
        $password_check=$r->your_pass;

        $FindId= Student::where('email',$email_check)->where('password',$password_check)->get();

        if(count($FindId)>0){
            $getId = Student::all()->where('email',$email_check);
            Session::flash('loginSuccess',"Login sucessfully!");
            return view('index')->with('getId',$getId);

        }else{
            Session::flash('loginFail',"Email or Password not match!!");
            return redirect()->route('loginPage');
        }
    }
    
}

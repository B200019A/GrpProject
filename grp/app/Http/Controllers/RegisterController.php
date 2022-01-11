<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Student;
use App\Http\Requests\StoreUser;

class RegisterController extends Controller
{
    public function change(){

        return view('registerPage');
    }
    public function add(){

        $r=request();
        $email_check=$r->email; //get user register of email

        $FindSameEmail= Student::where('email',$email_check)->get();//find database whether same email

        if(count($FindSameEmail)>0){
            Session::flash('RepeatEmail',"Email already exist!");
            return redirect()->route('registerPage');

        }else{
            $addAccount = Student::create([
            
                'name'=>$r->name,
                'email'=>$r->email,
                'password'=>$r->password,
                
            ]);
            Session::flash('successCreateAccount',"Account create sucessfully!");
            return redirect()->route('loginPage');
        }
    }
    /*public function add(StoreUser $request){
        $validated = $request->validate([
            'password' => 'required|confirmed'
        ]);;
        if($validated){
            $r=request();

            $addAccount = Student::create([
            
                'name'=>$r->name,
                'email'=>$r->email,
                'password'=>$r->password,
                
            ]);

            /*return back()->with('success', 'User created successfully.');

            Session::flash('success',"Account create sucessfully!");
            return redirect()->route('loginPage');
        }else{
            Session::flash('passwordError',"Password Not Match");
            return redirect()->route('registerPage');
        }
        

    }*/
}

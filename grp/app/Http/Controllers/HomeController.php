<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Club;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //when in the home.blade.php show the all club information
    public function index()
    {
        //when open home page print all club in home page
        if(Auth::user()->id==7){
            $showClub=DB::table('clubs')->get();
            return redirect()->route('addClub');
        }else{
            $showClub=DB::table('clubs')->get();
            (new CartController)->cartItem();
            return view('home')->with('clubs', $showClub);
        }
       
     
    }
}

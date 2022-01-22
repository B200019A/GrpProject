<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Club;

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
        $showClub=DB::table('clubs')->get();
        (new CartController)->cartItem();
        return view('home')->with('clubs', $showClub);
    }
}

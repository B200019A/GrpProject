<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Club;

class ClubController extends Controller
{
    public function addNewClub(){
            $r=request();
            $image=$r->file('clubImage');
            $image->move('images',$image->getClientOriginalName());//images is the location
            $imageName=$image->getClientOriginalName();
    
            $addClub = Club::create([
                
                'name'=>$r->clubName,
                'description'=>$r->clubDescription,
                'president'=>$r->president,
                'contact'=>$r->contact,
                'image'=>$imageName,
                
            ]);
            //Session::flash('success',"Product create sucessfully!");
            return view('addClub');
    }
}

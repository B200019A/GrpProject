<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Club;

class ClubController extends Controller
{
    public function viewAddClub (){

        return view('addClub');
    }
    //add new club to the db
    public function addNewClub(){
        
            $r=request();
            $image=$r->file('clubImage');//get the imgae 
            $image->move('images/club',$image->getClientOriginalName());//images is the location and save into localfile
            $imageName=$image->getClientOriginalName();
            //add new data to the clubs table
            $addClub = Club::create([
                
                'name'=>$r->clubName,
                'description'=>$r->clubDescription,
                'president'=>$r->president,
                'contact'=>$r->contact,
                'image'=>$imageName,
                
            ]);
            //send a message for the app.blade.php to show the status message
            Session::flash('successAddClub',"Club Add sucessfully!");
            //return view manageClub.blade.php when after add
            return redirect()->route('manageClub');
    }
    
    ////////////////////////////////crub function////////////////////////////////////////////
    //get the all club information to the manageclub page
    public function manageClub(){

            $manageClub=DB::table('clubs')->get();
            //return view manageClub.blade.php
            return view('manageClub')->with('clubs',$manageClub);



    }
    //follow the clubid get the all db to change page to editclub page 
    public function edit($id){

            $club=Club::all()->where('id',$id);
             //return view editClub.blade.php
            return view('editClub')->with('clubs',$club);

    }
    //update the club information
    public function update(){

        $r=request();
        $clubs=Club::find($r->id);//find the id and update
        //if image no exist will be add
        if($r->file('clubImage')!=''){
          $image=$r->file('clubImage');
          $image->move('images/club',$image->getClientOriginalName());//images is the location
          $imageName=$image->getClientOriginalName();
          
       }
       
  
        $clubs->name=$r->clubName;
        $clubs->description=$r->clubDescription;
        $clubs->president=$r->president;
        $clubs->contact=$r->contact;
        $clubs->image=$imageName;   
        $clubs->save();
        
        //send a message for the app.blade.php to show the status message
        Session::flash('successUpdateClub',"Club Update sucessfully!");
        //return view manageClub.blade.php when after update
        return redirect()->route('manageClub');
    }

    //follow the clubid and then delete the id all information from db
    public function delete($id){

        $deleteClub=Club::find($id);

        $deleteClub->delete();
        //return view manageClub.blade.php when after delete
        return redirect()->route('manageClub');
    }
    //crud end
}

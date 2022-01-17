<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Club;

class ClubController extends Controller
{
    //add new club to the db
    public function addNewClub(){
            $r=request();
            $image=$r->file('clubImage');//get the imgae 
            $image->move('images',$image->getClientOriginalName());//images is the location and save into localfile
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
    //get the all club information to the manageclub page
    public function manageClub(){
            $manageClub=DB::table('clubs')->get();

            return view('manageClub')->with('clubs',$manageClub);



    }
    //follow the clubid get the all db to change page to editclub page 
    public function edit($id){
            $club=Club::all()->where('id',$id);
            return view('editClub')->with('clubs',$club);

    }
    //update the club information
    public function update(){
        $r=request();
        $clubs=Club::find($r->id);//find the id and update
        //if image no exist will be add
        if($r->file('clubImage')!=''){
          $image=$r->file('clubImage');
          $image->move('images',$image->getClientOriginalName());//images is the location
          $imageName=$image->getClientOriginalName();
          
       }
       
  
        $clubs->name=$r->clubName;
        $clubs->description=$r->clubDescription;
        $clubs->president=$r->president;
        $clubs->contact=$r->contact;
        $clubs->image=$imageName;   
        $clubs->save();


        return redirect()->route('manageClub');
    }

    //follow the clubid and then delete the id all information from db
    public function delete($id){
        $deleteClub=Club::find($id);

        $deleteClub->delete();

        return redirect()->route('manageClub');
    }
}

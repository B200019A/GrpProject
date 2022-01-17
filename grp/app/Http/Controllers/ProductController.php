<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Product;
use App\Models\Club;

class ProductController extends Controller
{
    //add new clubProduct to the db
    public function addNewProduct(){
        $r=request();
        $image=$r->file('clubProductImage');//get the imgae 
        $image->move('productimages',$image->getClientOriginalName());//images is the location and save into localfile
        $imageName=$image->getClientOriginalName();

        $addProduct = Product::create([
            
            'name'=>$r->clubProductName,
            'description'=>$r->clubProductDescription,
            'price'=>$r->clubProductPrice,
            'quantity'=>$r->clubProductQuantity,
            'clubid'=>$r->clubId,
            'typeId'=>$r->clubProductTypeId,
            'image'=>$imageName,
            
        ]);
        $clubId=Club::all();
        return view('addClubProduct')->with('clubId',$clubId);


    }
    //follow the clud id just show the clubid product
    public function viewClubProduct($id){
        $products=Product::all()->where('clubid',$id);

        return view('viewClubProduct')->with('products', $products);

    }
    //get the all club product information to the manageclubproduct page
    public function manageClubProduct(){

        $manageClubProduct=DB::table('products')
        ->leftjoin('clubs','clubs.id','=','products.clubid')
        ->select('products.*','clubs.name as clubName')
        ->get();

         return view('manageClubProduct')->with('clubProducts', $manageClubProduct);
    }
    //follow the clubProduct id get the all db to change page to edit club product page 
    public function edit($id){

        $clubProducts=Product::all()->where('id',$id);
    
        return view('editClubProduct')->with('clubProducts',$clubProducts)
    
         ->with('clubs',Club::all());
    
    }
    //update the club product information
    public function update(){
        $r=request();
        $clubProducts=Product::find($r->id);//find the id and update
        //if image no exist will be add
        if($r->file('clubProductImage')!=''){
          $image=$r->file('clubProductImage');
          $image->move('productimages',$image->getClientOriginalName());//images is the location
          $imageName=$image->getClientOriginalName();
          
       }
       
  
        $clubProducts->name=$r->clubProductName;
        $clubProducts->description=$r->clubProductDescription;
        $clubProducts->price=$r->clubProductPrice;
        $clubProducts->quantity=$r->clubProductQuantity;
        $clubProducts->clubid=$r->clubId;
        $clubProducts->typeId=$r->clubProductTypeId;
        $clubProducts->image=$imageName;   
        $clubProducts->save();


        return redirect()->route('manageClubProduct');
    }
    //follow the clubProductid and then delete the id all information from db
    public function delete($id){
        $deleteClubProduct=Product::find($id);

        $deleteClubProduct->delete();

        return redirect()->route('manageClubProduct');
    }
    //show the product detail with product id
    public function clubProductDetail($id){
        $clubProducts=Product::all()->where('id',$id);
    
        return view('clubProductDetail')->with('clubProducts',$clubProducts);
    }

}

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
        $image->move('images/product',$image->getClientOriginalName());//images is the location and save into localfile
        $imageName=$image->getClientOriginalName();
        //create new data to products table
        $addProduct = Product::create([
            
            'name'=>$r->clubProductName,
            'description'=>$r->clubProductDescription,
            'price'=>$r->clubProductPrice,
            'quantity'=>$r->clubProductQuantity,
            'clubid'=>$r->clubId,
            'typeId'=>$r->clubProductTypeId,
            'image'=>$imageName,
            
        ]);
        //return club id to addClubProduct.blade.php
        $clubId=Club::all();
        return view('addClubProduct')->with('clubId',$clubId);

    }

    //show all product in viewClubProduct.blade.php follow the club id
    public function viewClubProduct($id){

        $products=Product::all()->where('clubid',$id);//select all product in product table follow the club id
        //return the viewClubProduct.php
        return view('viewClubProduct')->with('products', $products);

    }

    //show all product in product.blade.php
    public function product(){

        //select the clubs table in db
        $products=DB::table('clubs')
        //join the products table and products.clubid equal clubs.id
        ->leftjoin('products','products.clubid','=','clubs.id')
        //select the club name and club id in club table , select all product in products table
        ->select('clubs.name as clubName','clubs.id as cid','products.*')
        
        ->get();

        //return view product.blade.php
        return view('product')->with('products', $products);

    }

    //get the all club product information to the manageclubproduct page
    public function manageClubProduct(){
    
         //select the products table in db
         $manageClubProduct=DB::table('products')
        //join clubs table the clubs id equal products table the clubid
        ->leftjoin('clubs','clubs.id','=','products.clubid')
        //select products table all data and clubs table name data
        ->select('products.*','clubs.name as clubName')

        ->get();

         //return view manageClubProduct.blade.php
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
          $image->move('images/product',$image->getClientOriginalName());//images is the location
          $imageName=$image->getClientOriginalName();
          
       }
       
        //updates data
        $clubProducts->name=$r->clubProductName;
        $clubProducts->description=$r->clubProductDescription;
        $clubProducts->price=$r->clubProductPrice;
        $clubProducts->quantity=$r->clubProductQuantity;
        $clubProducts->clubid=$r->clubId;
        $clubProducts->typeId=$r->clubProductTypeId;
        $clubProducts->image=$imageName;   
        $clubProducts->save();

        //return route to the manageClubProduct.blade.php
        return redirect()->route('manageClubProduct');
    }
    //follow the clubProductid and then delete the id all information from db
    public function delete($id){

        $deleteClubProduct=Product::find($id);

        $deleteClubProduct->delete();
        //return route to the manageClubProduct.blade.php
        return redirect()->route('manageClubProduct');
    }
    //show the product detail with product id
    public function clubProductDetail($id){

        $clubProducts=Product::all()->where('id',$id);
        //return view to the clubProductDetail.blade.php and send the product data
        return view('clubProductDetail')->with('clubProducts',$clubProducts);
    }

}

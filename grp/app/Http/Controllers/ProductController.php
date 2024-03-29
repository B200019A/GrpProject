<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Models\Product;
use App\Models\Club;

class ProductController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }

    public function viewAddClubProduct(){
        
        $club=Club::all();
        return view('addClubProduct')->with('clubId',$club);
    }
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
        //send a message for the app.blade.php to show the status message
        Session::flash('success',"Product add sucessfully!");
        //return route to the manageClubProduct.blade.php
        return redirect()->route('manageClubProduct');

    }

    //show all product in viewClubProduct.blade.php follow the club id
    public function viewClubProduct($id){

        $club=Club::all()->where('id',$id);

        $products=Product::all()->where('clubid',$id);//select all product in product table follow the club id
        //return the viewClubProduct.php
        return view('viewClubProduct')->with('products', $products)->with('clubs',$club);

    }

    //show all product in product.blade.php
    public function product(){

        //select the products table in db
        $products=DB::table('products')
        //join the products table and products.clubid equal clubs.id
        ->leftjoin('clubs','clubs.id','=','products.clubid')
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

        //send a message for the app.blade.php to show the status message
        Session::flash('success',"Product update sucessfully!");
        //return route to the manageClubProduct.blade.php
        return redirect()->route('manageClubProduct');
    }
    //follow the clubProductid and then delete the id all information from db
    public function delete($id){

        $deleteClubProduct=Product::find($id);

        $deleteClubProduct->delete();
        //return route to the manageClubProduct.blade.php
        Session::flash('successDelete',"Club Product delete sucessfully!");
        return redirect()->route('manageClubProduct');
    }
    //show the product detail with product id
    public function clubProductDetail($id){

        //calculate the car item number
        (new CartController)->cartItem();
        
        $clubProducts=Product::all()->where('id',$id);

        //return view to the clubProductDetail.blade.php and send the product data
        return view('clubProductDetail')->with('clubProducts',$clubProducts);
    }
    //search product follow the search keyword
    public function searchProduct(){
        $r=request();
        $keyword=$r->keyword;
        if(Auth::user()->id==1){
             //select the products table in db
            $manageClubProduct=DB::table('products')
            //join clubs table the clubs id equal products table the clubid
            ->leftjoin('clubs','clubs.id','=','products.clubid')
            //select products table all data and clubs table name data
            ->select('products.*','clubs.name as clubName')
            //match the keyword or like the keyword in products table data
            ->where('products.name','like','%'.$keyword.'%')
    
            ->get();
 
          //return view manageClubProduct.blade.php
          return view('manageClubProduct')->with('clubProducts', $manageClubProduct);
        }else{
            
     
            $product=DB::table('clubs')
            //join the products table and products.clubid equal clubs.id
            ->leftjoin('products','products.clubid','=','clubs.id')
            //select the club name and club id in club table , select all product in products table
            ->select('clubs.name as clubName','clubs.id as cid','products.*')
            // match the keyword or like the keyword in products table data
            ->where('products.name','like','%'.$keyword.'%')
    
            ->get();
            //return view product.blade.php
            return view('product')->with('products', $product);

        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Product;
use App\Models\Club;

class ProductController extends Controller
{
    public function addNewProduct(){
        $r=request();
        $image=$r->file('clubProductImage');
        $image->move('productimages',$image->getClientOriginalName());//images is the location
        $imageName=$image->getClientOriginalName();

        $addProduct = Product::create([
            
            'name'=>$r->productName,
            'description'=>$r->clubProductDescription,
            'price'=>$r->productPrice,
            'quantity'=>$r->productQuantity,
            'clubid'=>$r->clubId,
            'typeId'=>$r->productTypeId,
            'image'=>$imageName,
            
        ]);
        $clubId=Club::all();
        //Session::flash('success',"Product create sucessfully!");
        return view('addClubProduct')->with('clubId',$clubId);


    }
    public function viewClubProduct($id){
        $products=Product::all()->where('clubid',$id);

        //return redirect()->route('viewClubProduct');
        return view('viewClubProduct')->with('products', $products);

    }
}

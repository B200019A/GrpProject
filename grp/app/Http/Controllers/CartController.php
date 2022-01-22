<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
USE Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Club;

class CartController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
    //add new product to the carts table
    public function add(){
        $r=request();
        $addItem = Cart::create([

            'userID'=>Auth::id(),
            'clubID'=>$r->clubId,
            'orderID'=>'',
            'productID'=>$r->productId,
            'quantity'=>$r->quantity,

            
        ]);
        //get all products follow the clubid
        $products=Product::all()->where('clubid',$r->clubId);

        //repeat calculate the total cart item
        $this->cartItem();
        
        //return to the myCart.blade.php
        return view('myCart')->with('products',$products);
    }
    public function view(){

        $carts=DB::table('carts')

        ->leftjoin('products','products.id','=','carts.productID')

        ->select('carts.quantity as cartQty','carts.id as cid','products.*')

        ->where('carts.orderID','=','') //the item haven't make payment

        ->where('carts.userID','=',Auth::id())

        ->get();

        //go to cartItem function to calculate the cart number
        $this->cartItem();
        
        return view('myCart')->with('clubProducts',$carts);

    }
    public function cartItem(){

            $cartItem=0;//initial value

            $findItem=DB::TABLE('carts')
            ->leftjoin('products','products.id','=','carts.productID')
            ->select(DB::raw('COUNT(*) as count_item '))//calculate the cart item
            ->where('carts.orderID','=','')//find the orderID equal empty
            ->where('carts.userID','=',Auth::id())//follow the user id
            ->groupBy('carts.userID')
            ->first();
            if($noItem){
                $cartItem=$findItem->count_item;
            }
            
            Session()->put('cartItem', $cartItem);
    }
}

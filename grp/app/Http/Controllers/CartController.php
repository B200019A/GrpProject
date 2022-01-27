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
    public function addCart(){
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
        Session::flash('success',"Club Product add to cart sucessfully!");
        //return to the myCart.blade.php
        return redirect()->route('myCart');
    }
    public function view(){

        $carts=DB::table('carts')

        ->leftjoin('products','products.id','=','carts.productID')

        ->leftjoin('clubs','clubs.id','=','carts.clubID')
  
        ->select('carts.quantity as cartQty','carts.id as cid','products.*','clubs.name as clubName')

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
            if($findItem){
                $cartItem=$findItem->count_item;
            }
            
            Session()->put('cartItem', $cartItem);
    }
    //delete cart item
    public function deleteCart($id){

        $deleteCart=Cart::find($id);

        $deleteCart->delete();
        //return route to the myCart.blade.php
        Session::flash('successDelete',"Cart Item delete sucessfully!");
        return redirect()->route('myCart');
    }

    //modify cart item quantity
    public function modifyCartItemQuantity($id){

        $r=request();
        //$id=$request->input('cartId');
        //$quantity=$request->input('CartItemquantity');
        //find the cart id in the cart table
        //$quantity=$r->input('CartItemquantity');
        $modifyQuantity=Cart::find($id);
       
        $modifyQuantity->quantity=$r->CartItemquantity; 

        $modifyQuantity->save();
        
       
        return redirect()->route('myCart');
        

        
    }

}

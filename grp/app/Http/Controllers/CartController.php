<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Cart;
use App\Models\Product;
USE Auth;
use App\Models\Club;

class CartController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
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
        //return to the club product page
        return view('viewClubProduct')->with('products',$products);
    }
    public function view(){

        $carts=DB::table('carts')

        ->leftjoin('products','products.id','=','carts.productID')

        ->select('carts.quantity as cartQty','carts.id as cid','products.*')

        ->where('carts.orderID','=','') //the item haven't make payment

        ->where('carts.userID','=',Auth::id())
        ->get();

        $this->cartItem();
        //select my_carts.quantity as cartQty,my_carts.id as cid, products.* from my_carts left join products on products.id=my_carts.productID where my_cart.orderID='' and my_carts.userID='Auth::id()'    
        Return view('myCart')->with('clubProducts',$carts);

    }
    public function cartItem(){
            $cartItem=0;
            $noItem=DB::TABLE('carts')
            ->leftjoin('products','products.id','=','carts.productID')
            ->select(DB::raw('COUNT(*) as count_item '))
            ->where('carts.orderID','=','')
            ->where('carts.userID','=',Auth::id())
            ->groupBy('carts.userID')
            ->first();
            if($noItem){
                $cartItem=$noItem->count_item;
            }
            
            Session()->put('cartItem', $cartItem);
    }
}

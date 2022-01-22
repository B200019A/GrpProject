<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
USE Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Club;
use App\Models\Order;


class OrderController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
    public function addOrder(Request $request){
        //add to orders databse
        $newOrder=Order::create([

            'paymentStatus'=>'',
            'userID'=>Auth::id(),
            'amount'=>$request->sub,
        ]);
        //select lastest order id data
        $orderID=DB::table('orders')->where('userID','=',Auth::id())->orderBy('created_at','DESC')->first();  //get the order id just now created
        //initial the value
        $orderNumber=$orderID->id;

        //get the select cart id
        $items=$request->input('cid');

        foreach($items as $item=>$value){
               $carts=Cart::find($value); //get the cart item record
               $carts->orderID=$orderNumber; //binding the orderID value with record
               $carts->save();

        }
        //get the carts product follow the $ordernumber
        $orderItem=DB::table('carts')

        ->leftjoin('products','products.id','=','carts.productID')

        ->select('carts.quantity as cartQty','carts.id as cid','products.*')

        ->where('carts.orderID','=',$orderNumber) //the item haven't make payment

        ->where('carts.userID','=',Auth::id())

        ->get();

        //get the order follow the $ordernumber
        $orderAmount=DB::table('orders')->where('id','=', $orderNumber)->get();

        return view('payment')->with('orderItems',$orderItem)->with('orderAmounts', $orderAmount);
    }
    /*public function deleteOrder(){
        $r=request();
        $id=$r->orderID;

        //$deleteOrder=Order::find($r->amount);
        $deleteOrder=DB::table('orders')->where('id','=', $id)->delete();
        //$deleteOrder->delete();

        $items=$r->input('cid');

        foreach($items as $item=>$value){
               $carts=Cart::find($value); //get the cart item record
               $carts->orderID=''; //binding the orderID value with record
               $carts->save();

        }


        return redirect()->route('myCart');
    }*/
}

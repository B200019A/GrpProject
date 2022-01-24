<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use PDF;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Club;
use App\Models\Order;


class OrderController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
    //create new order in myCart.blade.php 
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

        ->leftjoin('clubs','clubs.id','=','carts.clubID')

        ->select('carts.quantity as cartQty','carts.id as cid','products.*','clubs.name as clubName')

        ->where('carts.orderID','=',$orderNumber) //the item haven't make payment

        ->where('carts.userID','=',Auth::id())

        ->get();

        //get the order follow the $ordernumber
        $orderAmount=DB::table('orders')->where('id','=', $orderNumber)->get();

        //go to payment.blade.php and get the order item and order amount
        return view('payment')->with('orderItems',$orderItem)->with('orderAmounts', $orderAmount);
    }

    //print all order data in viewOrder.blade.php
    public function viewOrder(){

        //select database table name is order
        $orders=DB::table('orders')

        ->select('orders.*')
        ->where('orders.userID','=',Auth::id())//follow the account
        ->where('orders.paymentStatus','=','done')//select the done payment order only
        ->get();
        //return view to the viewOrder.blade.php and orders table data
        return view('viewOrder')->with('orders',$orders);

    }


    public function printInvoice($id){

        $OrderItem=DB::table('carts')

        ->leftjoin('products','products.id','=','carts.productID')

        ->select('carts.quantity as cartQty','carts.id as cid','products.*')

        ->where('carts.orderID','=',$id) //the item haven't make payment

        ->where('carts.userID','=',Auth::id())

        ->get();

        $orderAmount=DB::table('orders')->where('id','=', $id)->get(); //get the total amount for this order
        
        //return orders table data and carts table data to the invoicePDF.blade.php
        $pdf = PDF::loadView('invoicePDF', compact('OrderItem','orderAmount'));
        //dowload the pdf file 
        return $pdf->download('OrderInvoice_report.pdf');
    }
    
}

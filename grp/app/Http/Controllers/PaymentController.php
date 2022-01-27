<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\Models\Order;
use Auth;
use DB;
use Notification;
use Session;

class PaymentController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
    //when do the payment in payment.blade.php
    public function paymentPost(Request $request){
	
    //stripe api key
	Stripe\Stripe::setApiKey('sk_test_51KA7pQBCZ2jtTw6ZfZ2bMI1UqjybOQrSVEsmFLywegUKqKNGOSb3l0bpKkUeQy629PlwK1U6HHBFJuNfUNCv5vhT002cIhkSyH');
        //message send to stripe
        Stripe\Charge::create ([

                "amount" => $request->amount*100, //RM10=10CEN 10*100=1000CEN
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of Society and Club",
        ]);
      
        //update the order table for the payment status
        $OrderID=$request->input('orderID');//get the orderid in <input name="?">
        $Order=Order::find($OrderID);//find the order id in orders table
        $paymentStatus='done'; //update spayment status to done in orders table
        $Order->paymentStatus='done'; //binding the orderID value with record
        $Order->save();

        //send the email to mailtrap.com
        $email="jjlai0112@gmail.com";
        Notification::route('mail',$email)->notify(new \App\Notifications\orderPaid($email));
        //done the payment and route to the myCart.blade.php
        Session::flash('success',"Paymend done sucessfully!");
        return redirect()->route('myCart');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\Models\Order;
use Auth;
use DB;
use Notification;

class PaymentController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
    public function paymentPost(Request $request){
	       
	Stripe\Stripe::setApiKey('sk_test_51KA7pQBCZ2jtTw6ZfZ2bMI1UqjybOQrSVEsmFLywegUKqKNGOSb3l0bpKkUeQy629PlwK1U6HHBFJuNfUNCv5vhT002cIhkSyH');
        Stripe\Charge::create ([

                "amount" => $request->amount*100, //RM10=10CEN 10*100=1000CEN
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of southern online",
        ]);
      

        $OrderID=$request->input('orderID');
        $Order=Order::find($OrderID);
        $paymentStatus='done'; 
        $Order->paymentStatus=$paymentStatus; //binding the orderID value with record
        $Order->save();
        
        $email="jjlai0112@gmail.com";
        Notification::route('mail',$email)->notify(new \App\Notifications\orderPaid($email));

        return redirect()->route('myCart');
    }
}

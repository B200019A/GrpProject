@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
       <br><br>
       <table class="table table-bordered">
            <thead>
                <tr>
                        <td>Order id</td>
                        <td>Payment Status</td>
                        <td>Amount</td>
                        <td></td>
                </tr>
            </thead>
            <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->paymentStatus }}</td>
                        <td>{{ $order->amount }}</td>
                        <td><a href="{{route('printInvoice',['id'=>$order->id])}}" class="btn btn-warning btn-xs">Print Invoice</a>
                    </tr> 
                    @endforeach
            <tbody>
       </table>
       
    </div>
    <div class="col-sm-3"></div>

</div>
@endsection
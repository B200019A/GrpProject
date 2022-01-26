@extends('layouts.app')

@section('content')

<div class="row order-container">
    <div class="row order-title"> <!-- Title -->
        <br>
        <h4 class="page-title">My Order</h4>
        <br>
    </div>

    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="order-table">
            <thead>
                <tr class="text-center">
                    <th>Order ID</th>
                    <th>Payment Status</th>
                    <th>Amount</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="item-data">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->paymentStatus }}</td>
                    <td>{{ $order->amount }}</td>
                    <td><a href="{{route('printInvoice',['id'=>$order->id])}}" class="print-btn">Print Invoice</a>
                </tr> 
                @endforeach
            <tbody>
       </table>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection
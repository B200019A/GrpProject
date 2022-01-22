@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <br><br>
        <div class="card-body">
            <form action="{{route('add.to.cart')}}" method="POST" >
            @CSRF
            @foreach($clubProducts as $clubProduct)
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title" style="text-align:center;">{{ $clubProduct->name }}</h5>
                    <input type="hidden" name="clubId" value="{{ $clubProduct->clubid }}">
                    <input type="hidden" name="productId" value="{{ $clubProduct->id }}">
                    <img src="{{ asset('images/product/')}}/{{ $clubProduct->image }}" alt="" width="200" height="200 !important" class="">
                </div>
                <div class="col-md-9">
                    <br><br>
                    <p class="card-text">{{ $clubProduct->description }}</p>
                    <div class="card-heading">Quantity<input type="number" min="1" max="{{ $clubProduct->quantity }}" id="quantity" name="quantity"></div>
                    <br><br>
                    <div class="card-heading">Price: {{ $clubProduct->price }}</div>
                    <br>
                    <button type="submit" class="btn btn-danger btn-xs">Add to Cart</button>
                </div>
            </div>
            @endforeach
            </form>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>

  @endsection
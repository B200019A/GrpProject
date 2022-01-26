@extends('layouts.app')
@section('content')

<div class="row product-detail">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card" id="productDetail">
        <form action="{{route('addToCart')}}" method="POST" enctype="multipart/form-data">
                @CSRF
                @foreach($clubProducts as $clubProduct)
                <div class="row">
                    <div class="col-md-6 text-right">
                        <input type="hidden" name="clubId" value="{{ $clubProduct->clubid }}">
                        <input type="hidden" name="productId" value="{{ $clubProduct->id }}">
                        <img src="{{ asset('images/product/')}}/{{ $clubProduct->image }}" alt="" class="product-detail-image">
                    </div>
                    <div class="col-md-6 text-left" style="padding-left:20px;padding-right:50px;">
                        <h3 class="club-product-name">{{ $clubProduct->name }}</h3>
                        <p class="product-detail-text">Desciption:  <br>  {{ $clubProduct->description }}</p>
                        <div class="product-detail-text">Quantity:     <input type="number" min="1" max="{{ $clubProduct->quantity }}" id="quantity" name="quantity" value="1"></div>
                        <br><br>
                        <div class="product-detail-text">Price per unit:  {{ $clubProduct->price }}</div>
                        <br>
                        <button type="submit" class="add-cart-btn">Add to Cart</button>
                    </div>
                </div> 
                @endforeach
            </form>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>

@endsection
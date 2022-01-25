@extends('layouts.app')

@section('content')

<!-- Styles -->
<link href="{{ asset('css/userSide.css') }}" rel="stylesheet">

<div class="row products-container">
    <div class="row products-title">
        <br>
        <h4 class="page-title">Products</h4>
        <br>
    </div> 

    <div class="col-sm-2"></div>
    <div class="col-md-8">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($products as $product)
            <div class="col-md-4 products-layout"> <!-- each card occupy 4 spaces -->
                <div class="card products">
                    <div class="card-body d-flex flex-column mt-auto">
                        <h5 class="card-title product-name">{{ $product->name }}</h5>
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div style="height:150px;">
                            <a href="{{route('clubProduct.detail',['id'=>$product->id])}}"><img src="{{asset('images/product/')}}/{{  $product->image }}" alt="{{ $product->name }}" class="club-image"><a>
                        </div>
                        <div style="margin-top:10px;">
                            <div class="product-price">Price:  RM {{  $product->price }}</div>
                            <a href="{{route('viewClubProduct',['id'=>$product->clubid])}}" class="products-club">Club:  {{$product->clubName}}</a> <br>
                            <a href="{{route('clubProduct.detail',['id'=>$product->id])}}"><button type="submit" style="float:center;" class="enter-btn">View Detail</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>

@endsection
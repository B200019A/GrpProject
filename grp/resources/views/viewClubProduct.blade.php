@extends('layouts.app')

@section('content')

<!-- Styles -->
<link href="{{ asset('css/userSide.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="club-container">
    <div class="row about-club">
        @foreach($clubs as $club)
        <div class="col-md-6 about-image">
            <img src="{{asset('images/club')}}/{{  $club->image }}" alt="{{ $club->name }}" class="club-profile">
        </div>
        <div class="col-md-6 about-text">
            <h2>{{ $club->name }}</h3>
            <h5>President:  {{ $club->president }}</h3>
            <h5>Contact:  {{ $club->contact }} </h3>
            <p>{{ $club->description }}</p>
        </div>
        @endforeach
    </div>
    
    <div class="row product-section">
        <div class="row" style="margin-top: 1.7rem;margin-bottom: 1.7rem;">
            <br>
            <h4 class="page-title">Our Products</h4>
            <br>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-md-8">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($products as $product)
                <div class="col-md-4" style="padding-right:20px;padding-left:20px;"> 
                    <div class="card products">
                        <div class="card-body d-flex flex-column mt-auto">
                            <h5 class="card-title product-name">{{ $club->name }}</h5>
                            <input type="hidden" name="id" value="{{ $club->id }}">
                            <div style="height:150px;">
                                <a href="{{route('clubProduct.detail',['id'=>$product->id])}}"><img src="{{asset('images/product/')}}/{{  $product->image }}" alt="" class="product-image"></a>
                            </div>
                            <div style="margin-top:10px;">
                                <div class="product-price">RM {{  $product->price }}</div>
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
</div>


@endsection
@extends('layouts.app')
@section('content')   
<div class="row" style="margin-top:10px; margin-bottom:10px; background: #f8f8f8;">
    <div class="row" style="margin-top:10px; margin-bottom:10px; text-align:center;">
        <br><br>
        <h4>Products</h4>
        <br><br>
    </div>
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($products as $product)
            <div class="col">
                <div class="card" style="width: 18rem;height: 25rem;">
                    <div class="card-body d-flex flex-column mt-auto">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <a href="{{route('clubProduct.Detail',['id'=>$product->id])}}"><img src="{{asset('images/product/')}}/{{  $product->image }}" alt="" width="150" height="150" class="card-img-top"></a>
                        <div class="card-body">
                            <div class="card-heading">{{ $product->clubName}}</div>
                            <br>
                            <div class="card-heading">RM{{ $product->price }}</div>
                        </div>
                        <a href="{{route('clubProduct.Detail',['id'=>$product->id])}}"><button type="submit" style="float:right;" class="btn btn-danger btn-xs">View Detail</button><a>
                    </div>
                </div>
                <br>    
            </div>
            @endforeach  
        </div>
        <br><br>
    </div>          
    <div class="col-sm-2"></div>
</div>
@endsection

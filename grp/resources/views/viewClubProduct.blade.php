@extends('layouts.app')

@section('content')
    <div style="margin-top:10px; margin-bottom:10px">
    <div class="row">
        <div class="col-sm-2"></div>
            <div class="col-md-8">
            <div class="card">
                <div class="card-title"style="margin-left:20px;"><h4>Club&Society</h4></div> 

                <div style="margin-left:20px; margin-right:20px;  "><!--adjust margin strat-->
                <div class="row">
                
                    @foreach($products as $product)
    
                    <div class="col-sm-4" style="margin-top:10px">
                        <div class="card h-100">
                            <div class="card-body">
                            <h5 class="card-title">{{  $product->name }}</h5>
                            <a href=""><img src="{{asset('images/product/')}}/{{  $product->image }}" alt="" width="100" class="img-fluid"><a>
                            
                            <div class="card-heading">{{  $product->price }}<a href="{{route('clubProduct.Detail',['id'=>$product->id])}}"><button type="submit" style="float:right;" class="btn btn-danger btn-xs">View Detail</button><a></div>
                        </div>
                        </div>
                    </div>
        
                    @endforeach
                    
                    &nbsp;
                </div>
                </div><!--adjust margin end-->
                </div>
            </div>

    
        
        <div class="col-sm-2"></div>
    </div>
    </div>

@endsection
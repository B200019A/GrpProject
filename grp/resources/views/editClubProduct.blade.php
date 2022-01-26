@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Club&Society Product</h3>
        <form action="{{route('updateClubProduct')}}" method="POST" enctype="multipart/form-data">
            @CSRF

            @foreach($clubProducts as $clubProduct)
            <div class="form-group">
            <a>Product Name</a>
            <input type="hidden" name="id" value="{{$clubProduct->id}}">
            <input class="form-control" type="text" id="clubProductName" name="clubProductName"  value="{{$clubProduct->name}}" required>
            </div>
            <div class="form-group">
            <a>Description</a>
            <input class="form-control" type="text" id="clubProductDescription" name="clubProductDescription" value="{{$clubProduct->description}}" required>
            </div>
            <div class="form-group">
            <a>Price</a>
            <input class="form-control" type="double" id="clubProductPrice" name="clubProductPrice" min="0"  value="{{$clubProduct->price}}" required>
            </div>
            <div class="form-group">
            <a>Quantity</a>
            <input class="form-control" type="number" id="clubProductQuantity" name="clubProductQuantity" min="0" value="{{$clubProduct->quantity}}" required>
            </div>
            <div class="form-group">
            <a>Club&Society</a>
            <select name="clubId" id="clubId" class="form-control">
                @foreach($clubs as $club)
                    <option value="{{$club->id}}">{{$club->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <a>Product Type</a>
            <select name="clubProductTypeId" id="clubProductTypeId" class="form-control" value="{{$clubProduct->id}}">
                    <option  value="1">Membership Fee</option>
                    <option  value="2">Product</option>
            </select>
            </div>
            <div class="form-group">
            <a>Product Image</a>
            <input class="form-control" type="file" id="clubProductImage" name="clubProductImage">
            </div>
      
            <button type="submit" class="btn btn-primary">Edit Club&Society Product</button>
            @endforeach
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection
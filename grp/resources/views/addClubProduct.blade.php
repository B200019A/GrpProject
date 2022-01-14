@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Club&Society Product</h3>
        <form action="{{route('addNewProduct')}}" method="POST" enctype="multipart/form-data">
            @CSRF
            <div class="form-group">
            <a>Product Name</a>
            <input class="form-control" type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
            <a>Description</a>
            <input class="form-control" type="text" id="clubProductDescription" name="clubProductDescription" required>
            </div>
            <div class="form-group">
            <a>Price</a>
            <input class="form-control" type="double" id="productPrice" name="productPrice" min="0" required>
            </div>
            <div class="form-group">
            <a>Quantity</a>
            <input class="form-control" type="number" id="productQuantity" name="productQuantity" min="0" required>
            </div>
            <div class="form-group">
            <a>Club&Society</a>
            <select name="clubId" id="clubId" class="form-control">
                @foreach($clubId as $club)
                    <option value="{{$club->id}}">{{$club->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <a>Product Type</a>
            <select name="productTypeId" id="productTypeId" class="form-control">
                    <option value="1">Membership Fee</option>
                    <option value="2">Clothes</option>
                    <option value="3">Product</option>
            </select>
            </div>
            <div class="form-group">
            <a>Product Image</a>
            <input class="form-control" type="file" id="clubProductImage" name="clubProductImage" required>
            </div>
      
            <button type="submit" class="btn btn-primary">Add New Club&Society</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection
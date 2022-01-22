@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
       <br><br>
       <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Name</td>
                    <td>description</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Club</td>
                    <td>TypeId</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($clubProducts as $clubProduct)
                <tr>
                    <td>{{  $clubProduct->id}}</td>
                    <td ><img src="{{asset('images/product')}}/{{  $clubProduct->image }}" alt="" width="100" class="img-fluid"></td>
                    <td>{{  $clubProduct->name }}</td>
                    <td>{{  $clubProduct->description }}</td>       
                    <td>{{  $clubProduct->price }}</td>
                    <td>{{  $clubProduct->quantity }}</td>
                    <td>{{   $clubProduct->clubName}}</td>
                    <td>{{   $clubProduct->typeId}}</td>
                    <td><a href="{{route('editClubProduct',['id'=>$clubProduct->id])}}" class="btn btn-warning btn-xs">Edit</a>
                    <a href="{{route('deleteClubProduct',['id'=>$clubProduct->id])}}" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure to delete?')">Delete</a></td>
                </tr>  
                @endforeach
            
            <tbody>
       </table>
       
    </div>
    <div class="col-sm-3"></div>

</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="row admin-background">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
       <br><br>
       <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Club</th>
                    <th>TypeId</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($clubProducts as $clubProduct)
                <tr style="background-color:white;">
                    <td>{{  $clubProduct->id}}</td>
                    <td ><img src="{{asset('images/product')}}/{{  $clubProduct->image }}" alt="" width="100" class="img-fluid"></td>
                    <td>{{  $clubProduct->name }}</td>
                    <td>{{  $clubProduct->description }}</td>       
                    <td>{{  $clubProduct->price }}</td>
                    <td>{{  $clubProduct->quantity }}</td>
                    <td>{{   $clubProduct->clubName}}</td>
                    <td>{{   $clubProduct->typeId}}</td>
                    <td><a href="{{route('editClubProduct',['id'=>$clubProduct->id])}}" style="width:80px;margin-bottom:5px;" class="btn btn-warning btn-xs">Edit</a>
                    <a href="{{route('deleteClubProduct',['id'=>$clubProduct->id])}}" class="btn btn-danger btn-xs" style="width:80px;" onClick="return confirm('Are you sure to delete?')">Delete</a></td>
                </tr>  
                @endforeach
            
            <tbody>
       </table>   
    </div>
</div>
@endsection
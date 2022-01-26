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
                    <th>President</th>
                    <th>Contact</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($clubs as $club)
                <tr style="background-color:white;">
                    <td>{{  $club->id}}</td>
                    <td ><img src="{{asset('images/club/')}}/{{  $club->image }}" alt="" width="100" class="img-fluid"></td>
                    <td>{{  $club->name }}</td>
                    <td>{{  $club->description }}</td>       
                    <td>{{  $club->president }}</td>
                    <td>{{  $club->contact }}</td>
                    <td><a href="{{route('editClub',['id'=>$club->id])}}" class="btn btn-warning btn-xs" style="width:80px;margin-bottom:5px;">Edit</a><br>
                    <a href="{{route('deleteClub',['id'=>$club->id])}}" class="btn btn-danger btn-xs" style="width:80px;" onClick="return confirm('Are you sure to delete?')">Delete</a></td>
                </tr>  
                @endforeach
            
            <tbody>
       </table>
       
    </div>
    <div class="col-sm-3"></div>

</div>
@endsection
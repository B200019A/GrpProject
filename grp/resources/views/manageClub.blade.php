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
                    <td>President</td>
                    <td>Contact</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($clubs as $club)
                <tr>
                    <td>{{  $club->id}}</td>
                    <td ><img src="{{asset('images/club/')}}/{{  $club->image }}" alt="" width="100" class="img-fluid"></td>
                    <td>{{  $club->name }}</td>
                    <td>{{  $club->description }}</td>       
                    <td>{{  $club->president }}</td>
                    <td>{{  $club->contact }}</td>
                    <td><a href="{{route('editClub',['id'=>$club->id])}}" class="btn btn-warning btn-xs">Edit</a>
                    <a href="{{route('deleteClub',['id'=>$club->id])}}" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure to delete?')">Delete</a></td>
                </tr>  
                @endforeach
            
            <tbody>
       </table>
       
    </div>
    <div class="col-sm-3"></div>

</div>
@endsection
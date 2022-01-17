@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Club&Society</h3>
        
        <form action="{{route('updateClub')}}" method="POST" enctype="multipart/form-data">
            @CSRF

            @foreach($clubs as $club)            
            <div class="form-group">
            <a>Club&Society Name</a>
            <input type="hidden" name="id" value="{{$club->id}}">
            <input class="form-control" type="text" id="clubName" name="clubName" value=" {{  $club->name }}"required>
            </div>
            <div class="form-group">
            <a>Description</a>
            <input class="form-control" type="text" id="clubDescription" name="clubDescription" value="{{  $club->description }} " required>
            </div>
            <div class="form-group">
            <a>President</a>
            <input class="form-control" type="double" id="president" name="president" min="0" value="{{  $club->president }}" required>
            </div>
            <div class="form-group">
            <a>Contact</a>
            <input class="form-control" type="number" id="contact" name="contact" min="0" value="{{  $club->contact }}" required>
            </div>
            <div class="form-group">
            <a>Image</a>
            <input class="form-control" type="file" id="clubImage" name="clubImage" required>
            </div>
      
            <button type="submit" class="btn btn-primary">Update Club&Society</button>
            @endforeach
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection
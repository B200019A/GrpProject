@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Club&Society</h3>
        <form action="{{route('addNewClub')}}" method="POST" enctype="multipart/form-data">
            @CSRF
            <div class="form-group">
           
            <label for="clubName">Club&Society Name</label>
            <input class="form-control" type="text" id="clubName" name="clubName" required>
            </div>
            <div class="form-group">
            <label for="clubDescription">Description</label>
            <input class="form-control" type="text" id="clubDescription" name="clubDescription" required>
            </div>
            <div class="form-group">
            <label for="president">President</label>
            <input class="form-control" type="double" id="president" name="president" min="0" required>
            </div>
            <div class="form-group">
            <label for="contact">Contact</label>
            <input class="form-control" type="number" id="contact" name="contact" min="0" required>
            </div>
            <div class="form-group">
            <label for="clubImage">Image</label>
            <input class="form-control" type="file" id="clubImage" name="clubImage" required>
            </div>
      
            <button type="submit" class="btn btn-primary">Add New Club&Society</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection
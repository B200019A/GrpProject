@extends('layouts.app')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

@if(Session::has('successUpdate'))
    <div class="alert alert-danger" role="alert">
      {{Session::get('successUpdate')}}
    </div>
@endif

<div id="myProfile" class="w3-container base-container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h4 class="profile-title">Your Profile</h4>
            <div class="profile-wrap">
                <br><br>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input class="form-control" type="double" id="email" name="email" value="{{ Auth::user()->email }}" min="0"  disabled>
                    </div>
                    <br><br>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>
</div>



@endsection
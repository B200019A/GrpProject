@extends('layouts.app')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

@if(Session::has('successUpdate'))
    <div class="alert alert-danger" role="alert">
      {{Session::get('successUpdate')}}
    </div>
@endif

<section class="account-wrap">   
    <div id="myProfile" class="w3-container city">
    <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Your Profile</h3>
            <div class="form-group">
            <a>Name:</a>
            <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}" disabled>
            </div>
            <div class="form-group">
            <a>Email:</a>
            <input class="form-control" type="double" id="email" name="email" value="{{ Auth::user()->email }}" min="0"  disabled>
            </div>
         
        
           <br><br>
    </div>
    <div class="col-sm-3"></div>
    </div>
    </div>
    </div>
</section>





@endsection
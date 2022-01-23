@extends('layouts.app')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

@if(Session::has('successUpdate'))
    <div class="alert alert-danger" role="alert">
      {{Session::get('successUpdate')}}
    </div>
@endif


<!--<section class="account-wrap">
        <div class="container">
            <div class="account-wrap-inner">
                <div class="account-left">
                    <ul class="list-inline account-sidebar">
                        <li class="active">
                            <a href="">
                                <i class="las la-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>

                        <li class="">
                            <a href="">
                                <i class="las la-cart-arrow-down"></i>
                                My Orders
                            </a>
                        </li>

                        

                        <li class="">
                            <a href="">
                                <i class="las la-user-circle"></i>
                                My Profile
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <i class="las la-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="account-right">
                    <div class="panel-wrap">
                            
    <div class="panel">
        <div class="panel-header">
            <h4>Account Information</h4>

            <a href="https://talentify.com.my/account/profile">
                Edit
            </a>
        </div>

        <div class="panel-body">
            <ul class="list-inline user-info">
                <li>
                    <i class="las la-user-circle"></i>
                    <span>Lai Jie</span>
                </li>

                <li>
                    <i class="las la-envelope"></i>
                    <span>jjlai0112@gmail.com</span>
                </li>
            </ul>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
</section>-->
<section class="account-wrap">
<div class="container">
        <div class="w3-bar w3-black">
            <button class="w3-bar-item w3-button" onclick="openCity('myProfile')">My Profile</button>
            <button class="w3-bar-item w3-button" onclick="openCity('myOrders')">My Orders</button>
        </div>
    
    <div id="myProfile" class="w3-container city">
    <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Your Profile</h3>
        <form action="" method="POST"  action="" onsubmit="return validateReset()" enctype="multipart/form-data">
            @CSRF
            <div class="form-group">
            <a>Name:</a>
            <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}" disabled>
            </div>
            <div class="form-group">
            <a>Email:</a>
            <input class="form-control" type="double" id="email" name="email" value="{{ Auth::user()->email }}" min="0"  disabled>
            </div>
            <div class="form-group">
            <a>Password:</a>
            <input class="form-control" type="password" id="password" name="password" min="0" disabled>
            </div>
            <div class="form-group">
            <a>Confirm Password:</a>
            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" disabled>
            </div>
            <button type="submit" class="btn btn-primary">Modify</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

    </div>

    <div id="myOrders" class="w3-container city" style="display:none">

    <h2>Paris</h2>
    <p>Paris is the capital of France.</p> 
    </div>

</div>
</section>
<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>




@endsection
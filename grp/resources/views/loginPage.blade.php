@extends('layout')
@section('content')

@if(Session::has('successCreateAccount'))
    <div class="alert alert-success" role="alert">
      {{Session::get('successCreateAccount')}}
    </div>
@endif

@if(Session::has('loginFail'))
    <div class="alert alert-danger" role="alert">
      {{Session::get('loginFail')}}
    </div>
@endif

<div class="main">

<section class="sign-in">
<div class="container">
<div class="signin-content">
<div class="signin-image">
<figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
<a href="{{route('registerPage')}}" class="signup-image-link">Create an account</a>
</div>
<div class="signin-form">
<h2 class="form-title">Sign In</h2>
<form method="POST"  action="{{route('checkStudentId')}}" class="register-form" id="login-form">
  @CSRF 
<div class="form-group">
<label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
<input type="text" name="your_email" id="your_email" placeholder="Email" required>
</div>
<div class="form-group">
<label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
<input type="password" name="your_pass" id="your_pass" placeholder="Password" required>
</div>

<div class="form-group form-button">
<input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
</div>
</form>
<div class="social-login">
</div>
</div>
</div>
</div>
</section>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6ca57ab08ab789aa","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}' crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

@endsection
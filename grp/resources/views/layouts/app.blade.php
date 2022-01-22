<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Club & Society  Online System</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!--do my self-->
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@1&display=swap" rel="stylesheet">
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../css/style.css">

</head>

  
    <body>
        <header class="p-3 bg-white text-dark shadow-sm">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{route('home')}}" class="nav-link px-2 text-dark">Home</a></li>
            <li><a href="#" class="nav-link px-2 text-dark">Features</a></li>
            
            
            @guest
            <li><a href="#" class="nav-link px-2 text-dark">Product</a></li>
            <li><a href="" class="nav-link px-2 text-dark">My Order</a></li>
            <li><a href="#" class="nav-link px-2 text-dark">MyCart</a></li>
            @else
            <li><a href="{{route('product')}}" class="nav-link px-2 text-dark">Product</a></li>
            <li><a href="{{route('viewOrder')}}" class="nav-link px-2 text-dark">My Order</a></li>
            <li><a href="{{route('myCart')}}" class="nav-link px-2 text-dark">MyCart  <span class="badge bg-danger">{{Session()->get('cartItem')}}</span></a></li>
            @endguest
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

           <div class="text-end">
           @guest
                @if (Route::has('login'))                   
                     <a href="{{route('login')}}"><button type="submit" herf="{{route('login')}}" class="btn btn-outline-dark me-2">Login</button></a>
                     @endif
                     @if (Route::has('register'))
                    <a  href="{{route('register')}}"><button type="submit"  href="{{route('register')}}" class="btn btn-warning">Sign-up</button><a>

                    @endif
                        @else
                            <div class="dropdown text-end">
                        
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                 {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="{{ route('profile',['userId'=>Auth::user()->id]) }}">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                            </div>
                        @endguest
            </div>
        </div>
        </div>
    </header>
    <main class="py-4">
            @yield('content')
    </main>
    
    
    
    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4086.3313385770116!2d103.67968244610438!3d1.5336412506508394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da73c109632e0b%3A0x74cda51bf210c304!2z5Y2X5pa55aSn5a2m5a2m6Zmi!5e0!3m2!1szh-CN!2smy!4v1642170336972!5m2!1szh-CN!2smy"
         width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>-->
       

</body>
</html>

@extends('layouts.app')

@section('content')

<!-- Styles -->
<link href="{{ asset('css/userSide.css') }}" rel="stylesheet">

<div class="row base-container">
    <div class="row" style="margin-top: 1.7rem;margin-bottom: 1.7rem;">
        <br>
        <h4 class="page-title">Club & Society</h4>
        <br>
    </div>

    <div class="col-sm-2"></div>
    <div class="col-md-8">    
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($clubs as $club)
            <div class="col-md-4" style="padding-right:20px;padding-left:20px;"> <!-- each card occupy 4 spaces -->
                <div class="card club">
                    <div class="card-body d-flex flex-column mt-auto">
                        <h5 class="card-title club-name">{{ $club->name }}</h5>
                        <input type="hidden" name="id" value="{{ $club->id }}">
                        <div style="height:150px;">
                            <a href="{{route('viewClubProduct',['id'=>$club->id])}}"><img src="{{asset('images/club')}}/{{  $club->image }}" alt="{{$club->name}}" class="club-image"></a>
                        </div>
                        <div style="margin-top:10px;">
                            <div class="president-name">President:  {{ $club->president }}</div>
                            <a href="{{route('viewClubProduct',['id'=>$club->id])}}"><button type="submit" style="float:center;" class="enter-btn">Enter</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>
    
@endsection



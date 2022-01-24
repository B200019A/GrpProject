@extends('layouts.app')

@section('content')

    <div style="margin-top:10px; margin-bottom:10px">
    <div class="row">
        <div class="col-sm-2"></div>
            <div class="col-md-8">
            <div class="card">
                <div class="card-title"style="margin-left:20px;"><h4>Club&Society</h4></div> 

                <div style="margin-left:20px; margin-right:20px;  "><!--adjust margin strat-->
                <div class="row">
                
                    @foreach($clubs as $club)
    
                    <div class="col-sm-4" style="margin-top:10px">
                        <div class="card h-100">
                            <div class="card-body">
                            <h5 class="card-title">{{  $club->name }}</h5>
                            <a href="{{route('viewClubProduct',['id'=>$club->id])}}"><img src="{{asset('images/club')}}/{{  $club->image }}" alt="" width="100" class="img-fluid"><a>
                            
                            <div class="card-heading">{{  $club->president }}<a href="{{route('viewClubProduct',['id'=>$club->id])}}"><button type="submit" style="float:right;" class="btn btn-danger btn-xs">Enter</button><a></div>
                        </div>
                        </div>
                    </div>
        
                    @endforeach
                    
                    &nbsp;
                </div>
                </div>
                </div>
            </div>

    
        
        <div class="col-sm-2"></div>
    </div>
    </div>
    
@endsection



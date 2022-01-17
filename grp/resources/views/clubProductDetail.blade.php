@extends('layouts.app')

@section('content')

<div class="bg-light p-5 rounded">
    @foreach($clubProducts as $clubProduct)
    <h1>{{$clubProduct->name}}</h1>
    <p class="lead">{{$clubProduct->description}}</p>
    <a class="btn btn-lg btn-primary" href="/docs/5.1/components/navbar/" role="button">Add To Cart&raquo;</a>
    @endforeach
</div>

  @endsection
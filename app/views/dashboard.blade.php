@extends('layouts.base')

<?php $title="Dashboard" ?>

@section('content')
<div class="container">

  @if(isset($status))
  <div class="alert alert-info col-md-7 col-md-offset-3">
    {{ $status }}
  </div>
  @endif

  <div class="text-center">

    <h3>Brands:</h3>

    @foreach($brands as $brand)
      <form method="GET" action="/dealers/show/{{$brand->id}}">
        <input type="submit" class="btn btn-default" value="{{$brand->name}}" /> <br> <br>
      </form>
    @endforeach

  </div>

@stop

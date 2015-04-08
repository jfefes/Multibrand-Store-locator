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
    <div class="well" id="tools">
      <div class="row">
        <div class="col-xs-4 col-sm-3">
          <a href="/brands/add" class="btn btn-success">Add new brand</a>
          <a style="margin-left:20px" href="#" class="btn btn-warning">Reports</a>
        </div>
      </div>
    </div>

    <h3>Brands:</h3>

    @foreach($brands as $brand)
      <form method="GET" action="/dealers/show/{{$brand->id}}">
        <input type="submit" class="btn btn-default" value="{{$brand->name}}" /> <br> <br>
      </form>
    @endforeach

  </div>

@stop

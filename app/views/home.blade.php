@extends('layouts.base')

<?php $title="Home" ?>

@section('content')
<div class="container">

  @if(isset($status))
  <div class="alert alert-info col-md-7 col-md-offset-3">
    {{ $status }}
  </div>
  @endif



<div class="row">
  <div class="col-xs-12 col-sm-6">
    <h3 class="text-center">Brands you can edit:</h3>
    <p>
      Click a brand to add a new dealer, update an existing dealer, export, search, etc.
    </p>
      @foreach($brands as $brand)
        <div class="col-xs-3">
          <form method="GET" action="/dealers/show/{{$brand->id}}">
            <input type="submit" class="btn btn-default" value="{{$brand->name}}" />
          </form>
        </div>
      @endforeach
  </div>

  <div class="col-xs-12 col-sm-6">
    <h3 class="text-center">Other actions</h3>
    <div class="text-center">
      <div class="well" id="tools">
        <div class="row">
          <div class="text-left">
            <a style="margin-left:20px" href="/report" class="btn btn-warning">Run a report</a>
            <a style="margin-left:20px" href="warranty" class="btn btn-info">Add to dealer warranty</a>
          </div>
        </div>
      </div>
  </div>
</div>



  </div>

@stop

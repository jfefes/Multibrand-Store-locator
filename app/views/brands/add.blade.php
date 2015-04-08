@extends('layouts.base')

<?php $title="New Brand" ?>

@section('content')

<div class="container">

    @if(isset($status))
    <div class="alert alert-info col-md-7 col-md-offset-3">
      {{ $status }}
    </div>
    @endif

  <div class="row">
    <a href="/dashboard" class="btn btn-primary">Back</a>
    <h3 class="text-center">Add new brand:</h3>

    <form action="/brands/add" method="POST">
      <br>
      <div class="col-xs-5 col-xs-offset-4">
        Brand name: <input class="form-control" type="text" id="name" name="name" placeholder="Brand name" value="{{{ $input['name'] or '' }}}"/>
        <br>
        Table: <input class="form-control" type="text" id="table" name="table" placeholder="Table name" value="{{{ $input['table'] or '' }}}"/>
        <br>
        <input type="submit" class="btn btn-info" value="Create"/>
      </div>
    </form>
  </div>
</div>

@stop

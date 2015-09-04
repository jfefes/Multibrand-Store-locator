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
    <h3 class="text-center">Sales Rep portal</h3>

      <h3>Map generator</h3>
      <div class="well">
        <a style="margin-left:20px" href="/reps/report/new" class="btn btn-primary">Create</a>
      </div>
    </div>

</div>

@stop

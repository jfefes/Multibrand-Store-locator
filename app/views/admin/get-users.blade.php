@extends('layouts.base')

@section('content')

<div class="container">

  @if(isset($status))
  <div class="row">
    <div class="alert alert-info col-md-7 col-md-offset-3">
      {{ $status }}
    </div>
  </div>
  @endif


  @foreach($users as $user)
    <form method="get" action="/user/get/{{$user->id}}">
        <div class="form-input text-center">
          <div class="row">
              Username:    <strong>{{ $user->username }}</strong> &nbsp;
              <input type="submit" value="Edit" class="btn btn-success"/>
          </div>
        </div>
    </form>
    <hr>
  @endforeach
</div>

@stop

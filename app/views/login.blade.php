@extends('layouts.base')

<?php $title="Login" ?>

@section('content')
<div class="container">


<div class="container text-center">

    <div class="container">

      @if(isset($error))
        <div class="alert alert-danger">
          Your login was incorrect. Please double check your email and password combination and try again.
        </div>
      @endif

      @if(isset($status))
      <div class="alert alert-success col-md-7 col-md-offset-3">
        {{ $status }}
      </div>
      @endif

      @if(Session::has('reset-status'))
      <div class="alert alert-info">
        {{ Session::get('reset-status') }}
      </div>
      @endif

      @if(Session::has('user-deleted'))
      <div class="alert alert-warning">
        {{ Session::get('user-deleted') }}
      </div>
      @endif

        <div class="row">
          <form action="/login" method="POST">

          
          <div class="col-md-4 col-md-offset-4" style="margin-top:20px">
            <label for="username">Username</label>
            <input class="form-control" type="text" placeholder="Username" id="username" name="username"> <br>
          </div>

          <div class="col-md-4 col-md-offset-4" style="margin-top:20px">
            <label for="password">Password</label>
            <input class="form-control" type="password" placeholder="Password" id="password" name="password"> <br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <input type="submit" class="btn btn-primary" value="Log In">
          </div>
        </div>
    </div>

    <?php echo Form::token(); ?>
  </form>
</div>

@stop

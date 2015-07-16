@extends('layouts.base')

<?php $title="Set Password" ?>

@section('content')

<div class="container text-center">

    <div class="container">

      @if(Session::has('error'))
        <div class="alert alert-danger">
          Your passwords do no match, please try again.
        </div>
      @endif

      @if(Session::has('success'))
      <div class="alert alert-success col-md-7 col-md-offset-3">
        Your password has been set. Please login at <a href="http://locator.togllc.com">locator.togllc.com</a>
      </div>
      @endif


        <div class="row">
          <form action="/users/setpassword" method="POST">

          <input type="hidden" id="username" name="username" value={{$user->username}}> <br>

          <div class="col-md-4 col-md-offset-4" style="margin-top:20px">
            <label for="password">Password</label>
            <input class="form-control" type="password" placeholder="Password" id="password" name="password"> <br>
          </div>

          <div class="col-md-4 col-md-offset-4" style="margin-top:20px">
            <label for="password">Confirm Password</label>
            <input class="form-control" type="password" placeholder="Password" id="passwordconfirm" name="passwordconfirm"> <br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <input type="submit" class="btn btn-success" value="Set Password">
          </div>
        </div>
    </div>

  </form>
</div>

@stop

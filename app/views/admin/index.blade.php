@extends('layouts.base')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>


<?php $title= "Admin" ?>

@section('content')
<div class="container">

  @if(isset($status))
  <div class="row">
    <div class="alert alert-info col-md-7 col-md-offset-3">
      {{ $status }}
    </div>
  </div>
  @endif

<div class="well">
  <div class="row">
    <a href="/dealers/import" class="btn btn-default">Source CSV</a>
    <a href="/dealers/import/raw" class="btn btn-default">Import raw</a>
    <a href="/dealers/get/raw" class="btn btn-default">View raw</a>
  </div>
  <div class="row">
    <a href="/brands/add" class="btn btn-warning">Add new brand</a>
    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#newUser" aria-expanded="false" aria-controls="collapseExample">Create new user</button>
    <a href="/users/manage" class="btn btn-primary">Manage users</a>
  </div>


</div>

    <div class="collapse" id="newUser">
        <div class="well">
          <form method="post" action="/admin/user/create">

              <div class="form-input">
                <div class="row">


                  <div class="col-sm-4">
                    Email address:<input class="form-control" type="text" id="username" name="username" value="{{{ $input['username'] or '' }}}"> <br>
                  </div>

                  <div class="col-sm-4">
                  </div>
                </div>
                <input type="submit" value="Add" class="btn btn-success"/>

              </div>
          </form>
        </div>
    </div>
</div>
@stop

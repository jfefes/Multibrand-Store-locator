@extends('layouts.base')

@section('content')
<title>Add new dealer</title>

<div class="container">

  <h1>Add a new dealer</h1>
  <p>Add new Slick Trick dealer.</p>

  @if(isset($message))
    <div class="alert alert-info">
      {{ $message }}
    </div>
  @endif

  @if (is_array($errors))
    <div class="alert alert-danger">
      <h5>There were errors with the information.</h5>
      <ul>
      @foreach ($errors as $error)
        <li>
          {{{ $error }}}
        </li>
      @endforeach
      </ul>
    </div>
  @endif

  <div class="well">

    <div class="bh-sl-form-container">
      <form method="post" action="/dealers/add">
          <div class="form-input">

            <label for="name">Store Name:</label>
            <input class="form-control" type="text" id="name" name="name" value="{{{ $input['name'] or '' }}}">
            <br>

            <label for="address">Enter Full Address:</label>
            <input class="form-control" type="text" id="address" name="address" value="{{{ $input['address'] or '' }}}">
            <br>

            <label for="lat">Latitude:</label>
            <input class="form-control" type="text" id="lat" name="lat" value="Enter address" readonly value="{{{ $input['lat'] or '' }}}">
            <br>

            <label for="lng">Longitude:</label>
            <input class="form-control" type="text" id="lng" name="lng" value="Enter address" readonly value="{{{ $input['lng'] or '' }}}">
            <br>

            <label for="phone">Phone number:</label>
            <input class="form-control" type="text" id="phone" name="phone" value="{{{ $input['phone'] or '' }}}">
            <br>

            <div class="row">
              <button style="margin-left:20px" class="btn btn-success" type="submit">Submit</button>
            </div>

          </div>

      </form>
    </div>
  </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="/static/js/geocode.js"></script>

@stop

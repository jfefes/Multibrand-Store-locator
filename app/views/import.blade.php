@extends('layouts.base')

@section('content')

<title>Import dealers</title>

<div class="container">

  <p>Import Tool v0.1</p>

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



    @if(null!=$dealer)
    <div class="well">
      <p>
        <form method="post" action="/dealers/import">

            <div class="form-input">
              <div class="row">

                <div class="col-sm-4">
                  Dealer name:<input class="form-control" type="text" id="name" name="name" placeholder="(dealer name)" value="{{{ $dealer->name or '(name)' }}}"> <br>
                  Phone number:<input class="form-control" type="text" id="phone" name="phone" placeholder="(phone number)" value="{{{ $dealer->phone or '(phone)' }}}"> <br>
                  Email address:<input class="form-control" type="text" id="email" name="email" placeholder="(email address)" value="{{{ $dealer->email or '' }}}"> <br>

                </div>

                <div class="col-sm-4">
                  Address: <input class="form-control" type="text" id="address" name="address" placeholder="(address)" value="{{{ $dealer->address or '(address)' }}}"> <br>
                  City: <input class="form-control" type="text" id="city" name="city" placeholder="(city)" value="{{{ $dealer->city or '(city)' }}}"> <br>
                  State: <input class="form-control" type="text" id="state" name="state" placeholder="(state)" value="{{{ $dealer->state or '(state)' }}}"> <br>
                  Postal: <input class="form-control" type="text" id="postal" name="postal" placeholder="(postal)" value="{{{ $dealer->postal or '(postal)' }}}"> <br>
                  Country: <input class="form-control" type="text" id="country" name="country" placeholder="(country)"
                    @if($dealer->country=="")
                      value="USA"> <br>
                    @else
                      value="{{{ $dealer->country or '(country)' }}}"> <br>
                    @endif
                </div>

                <div class="col-sm-4">
                  Latitude: <input class="form-control" type="text" id="lat" name="lat" value="Click button below" readonly value="{{{ $input['lat'] or '' }}}"> <br>
                  Longitude: <input class="form-control" type="text" id="lng" name="lng" value="Click button below" readonly value="{{{ $input['lng'] or '' }}}"> <br>

                </div>
              </div>
              <a class="btn btn-info" id="geo">Get geocode</a>

              <input type="submit" value="Add dealer" class="btn btn-success"/>

            </div>
        </form>
        <form method="post" action="/dealers/delete">
          <input class="form-control" type="hidden" id="name" name="name" placeholder="(dealer name)" value="{{{ $dealer->name or '(name)' }}}"> <br>

          <input type="submit" class="btn btn-danger pull-right" value="Delete">
        </form>

    </div>
    @else
    {{ "Whoops! Looks like there are no more entries in the staging database"}}
    @endif
</div>



<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="/static/js/geocodeImport1.js"></script>

@stop

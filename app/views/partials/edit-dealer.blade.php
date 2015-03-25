<form method="POST" action="/dealers/show/{{$id}}">
  <div class="col-xs-4">
    <input type="hidden" id="dealer_id" name="dealer_id" value="{{$dealer->id}}"/>
    Dealer name: <input class="form-control" type="text" id="name" name="name" value="{{ $dealer->name }}"/> <br>
    Phone: <input class="form-control" type="text" id="phone" name="phone" value="{{ $dealer->phone }}"/> <br>
  </div>

  <div class="col-xs-4">
    Address: <input class="form-control" type="text" id="address" name="address" value="{{ $dealer->address }}"/> <br>
    City: <input class="form-control" type="text" id="city" name="city" value="{{ $dealer->city }}"/> <br>
    State: <input class="form-control" type="text" id="state" name="state" value="{{ $dealer->state }}"/> <br>
    Postal: <input class="form-control" type="text" id="postal" name="postal" value="{{ $dealer->postal }}"/> <br>
    Country:  <input class="form-control" type="text" id="country" name="country" value="{{ $dealer->country }}"/> <br>
  </div>

  <div class="col-xs-4">
    Lat: <input class="form-control" type="text" readonly id="lat" name="lat" value="{{ $dealer->lat }}"/> <br>
    Lng: <input class="form-control" type="text" readonly id="lng" name="lng" value="{{ $dealer->lng }}"/> <br>
    <a class="btn btn-success" type="button" id="geo">Get geocode</a>
  </div>

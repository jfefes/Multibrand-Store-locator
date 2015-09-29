@extends('layouts.base')

@section('content')
    <link rel="stylesheet" type="text/css" href="/assets/css/storelocator.css" />

    <div class="row">
      <div class="bh-sl-container">
        <div class="col-md-offset-3">
          <div class="bh-sl-form-container">
            <form id="bh-sl-user-location" method="post" action="#">
                <div class="form-input">
                  Enter Address or Zip Code
                  <input type="text" id="bh-sl-address" name="bh-sl-address" />
                </div>

                <button class="btn btn-warning" id="bh-sl-submit" type="submit">Submit</button>
            </form>
          </div>
        </div>

        <div class="col-md-offset-2">
          <div id="map-container" class="bh-sl-map-container">
            <div class="bh-sl-loc-list">
                <ul class="list"></ul>
            </div>
            <div id="bh-sl-map" class="bh-sl-map"></div>
          </div>
        </div>
      </div>
    </div>
    <Br>
      <Br>
    <Br>

    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="/assets/js/libs/handlebars.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="/assets/js/plugins/storeLocator/jquery.storelocator.js"></script>
		<script>
			$(function() {
				$('#map-container').storeLocator({
          catMarkers : {
				'Standard' : ['/img/markers/elite-standard.png', 50, 60],
				'Bronze' 	 : ['/img/markers/elite-bronze.png', 50, 60],
				'Silver' 	 : ['/img/markers/elite-silver.png', 50, 60],
				'Gold' 		 : ['/img/markers/elite-gold.png', 50, 60],
				'Platinum' : ['/img/markers/elite-platinum.png', 50, 60],
			},
					'dataType': 'json',
					'dataLocation': '/data/Chuck-K-dealers.json',
          'storeLimit': '1000',

				});
			});
		</script>
@stop

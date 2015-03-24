function GoogleGeocode()
{
  var a=new google.maps.Geocoder;

  this.geocode=function(b,c){
    a.geocode({address:b},function(a,b){if(b===google.maps.GeocoderStatus.OK)
      {
        var d={};d.latitude=a[0].geometry.location.lat(),d.longitude=a[0].geometry.location.lng(),c(d)
      }
        else alert("Please enter address"),c(null)
      })
  }
}

$(function(){
  $("#geo").click(function(a){
    var b= $("form #address").val() + " "
      + $("form #city").val() + " "
      + $("form #state").val() + " "
      + $("form #postal").val() + " "
      + $("form #country").val();

    console.log(b);

    var c=new GoogleGeocode,d=b;
    c.geocode(d,function(a){
      if(null!==a){

        var lat = $('#lat');
        lat.empty();
        lat.attr("value", a.latitude);

        var lng = $('#lng');
        lng.empty();
        lng.attr("value", a.longitude);

      }
    })

  })
});

<!-- Placeholder for the Google Map -->
<div id="map" style="height: 512px;">
  <noscript>
    <!-- http://code.google.com/apis/maps/documentation/staticmaps/ -->
    <img src="http://maps.google.com/maps/api/staticmap?center=1%20infinite%20loop%20cupertino%20ca%2095014&amp;zoom=16&amp;size=512x512&amp;maptype=roadmap&amp;sensor=false" />
  </noscript>
</div>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

// Define the address we want to map.
var address = "1 infinite loop cupertino ca 95014";

// Create a new Geocoder
var geocoder = new google.maps.Geocoder();

// Locate the address using the Geocoder.
geocoder.geocode( { "address": address }, function(results, status) {

  // If the Geocoding was successful
  if (status == google.maps.GeocoderStatus.OK) {

    // Create a Google Map at the latitude/longitude returned by the Geocoder.
    var myOptions = {
      zoom: 16,
      center: results[0].geometry.location,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map"), myOptions);

    // Add a marker at the address.
    var marker = new google.maps.Marker({
      map: map,
      position: results[0].geometry.location
    });

  } else {
    try {
      console.error("Geocode was not successful for the following reason: " + status);
    } catch(e) {}
  }
});
</script>
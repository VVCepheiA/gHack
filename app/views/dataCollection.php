<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>


	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);
		html {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}
	</style>


	<!-- Google Map API -->
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0pad4u9RPL2kFoJI5IwAB5yhohxYzrbU">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(-34.397, 150.644),
          zoom: 8
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <!-- Google Map API -->




</head>
<body>
	
	<h1>Data Management</h1>
	<p> <span class="glyphicon glyphicon-map-marker"></span>Location Map</p>


	<!-- Google Map API -->
	<div id="map-canvas"/>
	<!-- Google Map API -->


</body>
</html>




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

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
    <script type="text/javascript">

    var canada = new google.maps.LatLng(59.260, -112.496);
	var markerPos = new google.maps.LatLng(59.260, -112.496);
	var marker;
	var map;

	function initialize() {
	  var mapOptions = {zoom: 4, center: canada};
	  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

	  marker = new google.maps.Marker({
	    map:map,
	    draggable:true,
	    animation: google.maps.Animation.DROP,
	    position: markerPos
	  });
	  google.maps.event.addListener(marker, 'click', showChat);
	  google.maps.event.addListener(map, 'click', hideChat);
	}

	function showChat() {

	  $('#chat').show();
	}

	function hideChat() {
	   $('#chat').hide();
	  
	}

	google.maps.event.addDomListener(window, 'load', initialize);


    </script>
    <!-- Google Map API -->




</head>
<body>
	
	<h1>Data Management</h1>

	<p> <span class="glyphicon glyphicon-map-marker"></span>Location Map</p>
	<div id='chat' style = " display:none; z-index:1000; background-color:rgba(255,255,255,0.7); width:60%; height:60%; position: absolute; top: 25%; left:20%; right:20%; overflow-y:scroll;">CHAT TEST</div>


	<!-- Google Map API -->
	<div id="map-canvas">
	</div>
	<!-- Google Map API -->


</body>
</html>




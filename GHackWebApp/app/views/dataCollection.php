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

	var locations = [
	[55,-100, 1, "http://static.guim.co.uk/sys-images/Money/Pix/pictures/2011/8/9/1312886246159/A-burnt-out-car-Insurers--006.jpg"],
	[40,-120, 2,"http://static.guim.co.uk/sys-images/Money/Pix/pictures/2011/8/9/1312886246159/A-burnt-out-car-Insurers--006.jpg"],
	[80.-80, 3,"http://static.guim.co.uk/sys-images/Money/Pix/pictures/2011/8/9/1312886246159/A-burnt-out-car-Insurers--006.jpg"],
	[97,-100,4,"http://static.guim.co.uk/sys-images/Money/Pix/pictures/2011/8/9/1312886246159/A-burnt-out-car-Insurers--006.jpg"],
	[55,-160,5,"http://static.guim.co.uk/sys-images/Money/Pix/pictures/2011/8/9/1312886246159/A-burnt-out-car-Insurers--006.jpg"],
	[59.260, -112.496, 6,"http://static.guim.co.uk/sys-images/Money/Pix/pictures/2011/8/9/1312886246159/A-burnt-out-car-Insurers--006.jpg"],
	[60,-120,7,"http://static.guim.co.uk/sys-images/Money/Pix/pictures/2011/8/9/1312886246159/A-burnt-out-car-Insurers--006.jpg"],
	[20,-80,8,"http://static.guim.co.uk/sys-images/Money/Pix/pictures/2011/8/9/1312886246159/A-burnt-out-car-Insurers--006.jpg"],
	[99,-30,9,"http://static.guim.co.uk/sys-images/Money/Pix/pictures/2011/8/9/1312886246159/A-burnt-out-car-Insurers--006.jpg"]
	];

	var chat = [
	[["Vera","Ha"],["Service","Hi"]],
	[["Seth","Ha"]],
	[["Tony","Ha"]],
	[["David","Ha"]],
	[["Simon","Ha"]],
	[["Dingtao","Ha"]],
	[["Amy","Ha"]],
	[["Helen","Ha"]],
	[["Sally","Ha"]],
	[["Cassie","Ha"]]
	];

	
	var canada = new google.maps.LatLng(59.260, -112.496);
	var marker;
	var map;

	function initialize() {
		var mapOptions = {zoom: 4, center: canada};
		map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

		var i;
		for (i = 0; i < locations.length; i++) {  
			marker = new google.maps.Marker({
				title:location[2],
				draggable:true,
				animation: google.maps.Animation.DROP,
				position: new google.maps.LatLng(locations[i][0], locations[i][1]),
				map: map
			});
			google.maps.event.addListener(marker, 'click', showChat);
			google.maps.event.addListener(map, 'click', hideChat);
		}
	}


	function showChat() {
		var random = Math.floor((Math.random() * 7) + 1);
		imgURLs = ["http://static.guim.co.uk/sys-images/Money/Pix/pictures/2011/8/9/1312886246159/A-burnt-out-car-Insurers--006.jpg",
		"http://ak.picdn.net/shutterstock/videos/2088356/preview/stock-footage-business-couple-having-fight-by-the-broken-car.jpg",
		"http://cdn2-b.examiner.com/sites/default/files/styles/image_content_width/hash/77/74/7774d168c92d5b66f328cf3c17a73e1c.jpg?itok=Wuio3tpY",
		"http://www.dallasfortworthinjurylawyer.com/files/2013/07/car_crash_0188.jpg",
		"http://extras.mnginteractive.com/live/media/site21/2011/0316/20110316_013508_20110316_CAR_FIRES_468.jpg",
		"http://www.colourbox.com/preview/4032764-807323-the-old-broken-car.jpg",
		"http://www.miroertel.com/imgs/broken-hill-car-04.jpg",
		"http://www.colourbox.com/preview/4267562-114908-woman-near-broken-car.jpg"];
		var imgURL = imgURLs[random];
		var string = "<br><img src=\""+ imgURL +"\" alt=\"broken\" ><br>";
		string += "<br><p>Hi, my car is broken.</p><hr><p>How could I help you?</p>";
		string += "<hr><p>Could you please check the damage for me?</p><hr><p>Sure. Please, one second.</p>";
		//var string + = " <p>HI</p>";

		$('#chat').html(string);
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
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<h1>Data Management</h1>
		<p>
			<span class="glyphicon glyphicon-map-marker"></span>
			Chat Request Location Map  
			<a class = "glyphicon glyphicon-refresh" href="data"></a></p>
		</div>
	</nav>


	<div id='chat' style = " display:none; z-index:1000; background-color:rgba(255,255,255,0.7); width:50%; height:60%; position: absolute; top: 25%; left:25%; right:25%; overflow-y:scroll;">CHAT TEST</div>


	<!-- Google Map API -->
	<div id="map-canvas"></div>
	<!-- Google Map API -->


</body>
</html>




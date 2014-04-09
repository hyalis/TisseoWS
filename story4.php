<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="ico/favicon.ico">

	<title>Tisséo UPS</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/starter-template.css" rel="stylesheet">

	<style type="text/css">
		#map-canvas { height: 460px; width: 100%; }
    </style>

	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
	
	<script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQZg8pUxWMmRpO_RHxyF29tPPthfvIRX8&sensor=true">
	</script>
	<script type="text/javascript">
		function initialize() {
			var mapOptions = {
				center: new google.maps.LatLng(43.561181, 1.469393),
				zoom: 15
			};
			var map = new google.maps.Map(document.getElementById("map-canvas"),
			mapOptions);
			var bounds = new google.maps.LatLngBounds();

			if (window.XMLHttpRequest){	// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else {	// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
	
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					var stations = xmlhttp.responseText.split("<br>");
					var infoWindowContent = new Array();
					var markers = new Array();
					for (index = 0; index < stations.length-1; ++index) {
						stationVelo = stations[index].split("***");
						
						//Markers
						markers.push([stationVelo[0],stationVelo[1],stationVelo[2]]);
					
						//Nom de la station et vélos dispo
						contentString = "<h3>" + stationVelo[0] + "</h3> Vélo(s) disponible(s) = " + stationVelo[3] + "/" + stationVelo[4];
						infoWindowContent.push(contentString);
						
					}
					
					var infoWindow = new google.maps.InfoWindow(), marker, i;
					
					for( i = 0; i < markers.length; i++ ) {
						stationVelo = stations[i].split("***");
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
						bounds.extend(position);
						if(stationVelo[3] > 0)
							icon = 'http://maps.google.com/mapfiles/ms/icons/green-dot.png';
						else
							icon = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
						marker = new google.maps.Marker({
							position: position,
							map: map,
							icon: icon,
							title: markers[i][0]
						});
						
						google.maps.event.addListener(marker, 'click', (function(marker, i) {
							return function() {
								infoWindow.setContent(infoWindowContent[i]);
								infoWindow.open(map, marker);
							}
						})(marker, i));

						map.fitBounds(bounds);
					}

					var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
						this.setZoom(15);
						google.maps.event.removeListener(boundsListener);
					});
					
				}
			}
		xmlhttp.open("GET","getVelos.php",true);
		xmlhttp.send();	
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>


	<body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Tisseo UPS</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
					<li><a href="index.php">ST1</a></li>
					<li><a href="story2.php">ST2</a></li>
					<li><a href="story3.php">ST3</a></li>
					<li class="active"><a href="story4.php">ST4</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>

	<div class="container">
		<h1>Story 4</h1>
		<div class="row">
			<div class="col-md-3">
				<?php include "velosDispos.php"; ?>
			</div>
			<div class="col-md-9">
				<div id="map-canvas"/>
			</div>
		</div>
	</div>
	
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>

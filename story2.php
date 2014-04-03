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

	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>

	<script>
		function afficheStations()
		{
			idLigne = $("#lignes option:selected").val();
			document.getElementById('nomLigne').innerHTML = $("#lignes option:selected").data("nom");
			if (window.XMLHttpRequest){	// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else {	// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById('stations').innerHTML=xmlhttp.responseText;
					document.getElementById('stations').style.visibility="visible";
					afficheResult();
				}
			}
			xmlhttp.open("GET","getStations.php?idLigne="+idLigne,true);
			xmlhttp.send();
		}
		
		function afficheResult()
		{
			idLigne = $("#lignes option:selected").val();
			idStation = $("#stations option:selected").val();
			if (window.XMLHttpRequest){	// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else {	// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById('resultat').innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","checkProchainPassages.php?idLigne="+idLigne+"&idStation="+idStation,true);
			xmlhttp.send();
		}
		
		function like(val){
			idLigne = $("#lignes option:selected").val();
			if (window.XMLHttpRequest){	// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else {	// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					if(val == true)
						document.getElementById('btnLike').innerHTML = xmlhttp.responseText + " Like(s)";
					else
						document.getElementById('btnDisLike').innerHTML = xmlhttp.responseText + " Dislike(s)";
				}
			}
			xmlhttp.open("GET","like.php?like="+val+"&idLigne="+idLigne,true);
			xmlhttp.send();
		}
		
		function showlike(){
			idLigne = $("#lignes option:selected").val();
			if (window.XMLHttpRequest){	// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else {	// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					var res = xmlhttp.responseText.split("/");
					document.getElementById('btnLike').innerHTML = res[0] + " Like(s)";
					document.getElementById('btnDisLike').innerHTML = res[1] + " Dislike(s)";
				}
			}
			xmlhttp.open("GET","showlike.php?idLigne="+idLigne,true);
			xmlhttp.send();
		}
		
		function init(){
			afficheStations();
			showlike();	
		}
	</script>
  
	<body onload="init()">
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
					<li class="active"><a href="#">ST1</a></li>
					<li><a href="#ST2">ST2</a></li>
					<li><a href="#ST3">ST3</a></li>
					<li><a href="#ST4">ST4</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>

	<div class="container">
		<h1>Story 1</h1>
		<div class="row">
			<div class="col-md-4">
				<label class="control-label">Choisir une ligne :</label>
				<select class="form-control" id="lignes" onchange="afficheStations(); showlike();">
					<?php
						include "bdd.php";
						$resultats=$connection->query("SELECT idLigne, numLigne, nomLigne FROM lignes ORDER BY numLigne");
						$resultats->setFetchMode(PDO::FETCH_OBJ);
						while( $resultat = $resultats->fetch() )
						{
							echo '<option data-nom="' . $resultat->nomLigne . '" value = ' . $resultat->idLigne .'>'.$resultat->numLigne.'</option>';
						}
						$resultats->closeCursor();
					?>
				</select>
				<span id="nomLigne"></span><br>
				<button type="button" class="btn btn-success" onClick="like(true)" id="btnLike">Like(s)</button>   <button type="button" class="btn btn-danger" onClick="like(false)" id="btnDisLike">Unlike(s)</button>
			</div>
			<div class="col-md-4">
				<label class="control-label">Choisir une station :</label>
				<select class="form-control" id="stations" style="visibility: hidden;" onchange="afficheResult()">
				
				</select>
			</div>
			<div class="col-md-4">
				<label class="control-label">Résultat :</label><br>
				<span id="resultat"></span>
			</div>
		</div>
	</div><!-- /.container -->

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>

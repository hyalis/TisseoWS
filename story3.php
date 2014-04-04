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
					<li><a href="index.php">ST1</a></li>
					<li><a href="story2.php">ST2</a></li>
					<li class="active"><a href="story3.php">ST3</a></li>
					<li><a href="#ST4">ST4</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>

	<div class="container">
		<h1>Story 3</h1>
		<div class="row">
			<div class="col-md-6">
			<h2> Pertubations Bus/Metro: </h2>
				<?php include "getMessages.php"; ?>
			</div>
			<div class="col-md-6">
				<h2> Vélos disponibles : </h2>
				<!-- Lister les velos dispo pour les differentes bornes autour de l'UPS -->
			
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

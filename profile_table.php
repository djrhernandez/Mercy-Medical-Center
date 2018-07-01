<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
session_start();
require_once('Header.php');
require_once('Connect.php');
require_once('profile_get.php');
//require_once('update_patient.php');

$i = 0;
$updated = array();
$updated[0] = "";
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="">
	<meta name="author" content="David A. Hernandez II">
	<link rel="icon" type="image/png" href="./assets/img/favicon.ico">
	<title>CS3420 Database Systems: Mercy Medical Center</title>

	<!-- Bootstrap core CSS -->
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Animation Library for Notifications -->
	<link href="./assets/css/animate.min.css" rel="stylesheet">
	
	<!-- Light Bootstrap Table Core CSS -->
	<link href="./assets/css/material-dashboard.css" rel="stylesheet">

	<!-- Custom styles/fonts/icons for this template -->	
	<!-- <link href="./canvas/healthrecord.css" rel="stylesheet"> -->
	<link href="./canvas/profile.css" rel="stylesheet">	
	<link href="./canvas/homemodal.css" rel="stylesheet">
	
	<!-- Bootstreap Demo Template -->
	<link href="./assets/css/demo.css" rel="stylesheet"/>
	<!-- <link href="./assets/css/graph.css" rel="stylesheet"/> -->
	<link href="./assets/css/bootstrap-theme.css" rel="stylesheet"/>
	
	<link href="./assets/css/pe-icon-7-stroke.css" rel="stylesheet">
	<link href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="./dist/js/jquery.min.js"><\/script>')</script>
	
	<style>		
		.card {
			
		}
		
		.card .card-header {
			border-radius: 		10px;
			background-color: 	#6600FF;
			
		}
		
		.card .card-content {
			padding: 		20px;
			font-size:		14px;
			font-weight:	400;
		}
		
		.body {
			font-weight: 400;
			font-size: 20px;
		}
		
		tbody {
			background: -webkit-linear-gradient(-45deg, #a6a6a6, #808080);
			background:    -moz-linear-gradient(-45deg, #a6a6a6, #808080);
			background: 	-ms-linear-gradient(-45deg, #a6a6a6, #808080);
			background: 	 -o-linear-gradient(-45deg, #a6a6a6, #808080);
			background: 		linear-gradient(-45deg, #a6a6a6, #808080);
		}
		
		td {
			text-align: center;
			font-weight: 500;
		}
		
		
	</style>
	
</head>

<body class="container-fluid">
	<div class="card">
		<div class="card-header"  data-background-color="#6600FF">
			<h3 class="title">Patient Profile</h3>		
		</div>
	
		<div class="card-body">
			<div class="card-content">
				<table class="table table-striped">
					<?php
						viewPatients();
					?>			
				</table>
			</div>
			<div class="card-content">
				<a type='button' href='insert_summary.php' name='add' class='btn btn-md'>Add Patient</a>
			</div>
		</div>
	</div>
</body>

</html>
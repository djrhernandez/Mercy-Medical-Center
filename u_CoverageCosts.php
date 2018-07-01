<?php
error_reporting(E_ALL ^ E_NOTICE); ini_set('display_errors', 1);
session_start();
require ('Connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="David Hernandez">
	<link rel="icon" href="assets/images/favicon.ico">
	<title>CS3420 Database Systems: Mercy Medical Center</title>

	<!-- Bootstrap core CSS -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animation Library for Notifications -->
    <link href="dist/css/animate.min.css" rel="stylesheet">
	<!-- Light Bootstrap Table Core CSS -->
	<link href="dist/css/light-bootstrap-dashboard.css" rel="stylesheet">	

	<!-- Custom styles for this template -->
	<link href="./canvas/coverage.css" rel="stylesheet">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
	<link href="dist/css/pe-icon-7-stroke.css" rel="stylesheet">
</head>


<body>
<div id="header">
    <div class="jumbotron">
        <img class="img-responsive" src="assets/img/MMC.png" alt="Mercy Medical Center"/>
    </div>
</div>
<!-- Tabs below jumbotron -->
<nav class="navbar navbar-static-top navbar-inverse ">
    <div class="navbar container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <!-- Actual Navbar Area -->
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class=""><a href="http://cs.csubak.edu/~dirizarryher/cs342/u_MainPage.php">Home</a></li>
                <li class=""><a href="http://cs.csubak.edu/~dirizarryher/cs342/u_HealthRec.php">Health Records</a></li>
                <li class=""><a href="http://cs.csubak.edu/~dirizarryher/cs342/u_ApptCenter.php">Appointment Center</a></li>
                <li class=""><a href="http://cs.csubak.edu/~dirizarryher/cs342/u_PhrmCenter.php">Pharmacy Center</a></li>
                <li class=""><a href="http://cs.csubak.edu/~dirizarryher/cs342/u_CoverageCosts.php">Coverage & Costs</a></li>
                <!-- <li class=""><a href="http://cs.csubak.edu/~dirizarryher/u_Logout.html">Log Out</a></li> -->
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->

<!-- Main Body -->
<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        <!-- Sidebar Navigation -->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidenav">
            <div class="list-group">
                <a class="list-group-item active bold"><strong>Health Manager</strong></a>
                <a href="http://cs.csubak.edu/~dirizarryher/cs342/u_Mainpage.php" class="list-group-item">Homepage</a>
                <a href="http://cs.csubak.edu/~dirizarryher/cs342/u_HealthRec.php" class="list-group-item">Health Summary</a>
                <a href="http://cs.csubak.edu/~dirizarryher/cs342/u_ApptCenter.php" class="list-group-item">Upcoming Appointments</a>
                <a href="http://cs.csubak.edu/~dirizarryher/cs342/u_PhrmCenter.php" class="list-group-item">Prescription Summary</a>
            </div>
        </div>
        <!-- End Sidebar Offcanvas -->
        <!-- Body Tabs Button -->
        <div class="col-xs-12 col-sm-9">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Nav</button>
            </p>
        </div>

        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading"><strong>My Coverage & Costs</strong></div>
                <div class="panel-group">
                    <div class="panel panel-body">
                        Questions about claims, benefits, your plan coverage or managing your insurance policy?
                        Call Customer Service at the number on the back of your Mercy Medical Clinic ID card.
                    </div>

                    <div class="panel panel-group">
                        <div class="panel-heading"><strong>Plan Ahead</strong></div>
                        <div class="panel-body" id="contentdiv">
                            Get the information you need to manage your health care budget.
                        </div>
                    </div>

                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">Insurance Claim:</div>
                            <div class="panel-group">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Coverage</td>
                                        <td>Premium</td>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>Purdy-Gaylord Inc.</td>
                                        <td>A small loan of a million dollars</td>
                                        <td>Tree Fiddy</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- End Row Offcanvas -->

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="offcanvas.js"></script>
</div>
</body>
</html>

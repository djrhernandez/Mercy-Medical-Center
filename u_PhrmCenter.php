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
	<link href="./canvas/pharmacy.css" rel="stylesheet">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
	<link href="dist/css/pe-icon-7-stroke.css" rel="stylesheet">
</head>


<body>
<div id="header">
    <div class="jumbotron">
        <img class="img-responsive" src="MMC.png" alt="Header"/>
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
                <a href="http://cs.csubak.edu/~dirizarryher/cs342/u_MainPage.php" class="list-group-item">Homepage</a>
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
                <div class="panel-heading"><strong>My Prescriptions</strong></div>
                <div class="panel-group">
                    <div class="panel panel-body">
                        The table below shows the medications we have on file for you or your family member. This
                        list may not include medications that are filled outside of Mercy Medical Clinic, or
                        medications that you or your family member purchase over the counter.
                    </div>

                    <div class="panel panel-group">
                        <div class="panel-heading"><strong>For Members Using Mail Order:</strong></div>
                        <div class="panel-body" id="contentdiv">
                            To avoid delivery delays during the upcoming holiday season, remember to request
                            prescription refills earlier than usual.
                        </div>
                    </div>

                    <div class="panel panel-group">
                        <div class="panel-heading"><strong>Mail Order Prescription Delivery Policy has
                            Changed</strong></div>
                        <div class="panel-body" id="contentdiv">
                            We will only be able to mail prescriptions to California, Oregon, Nevada, and Arizona.
                            We will no longer be able to mail to any other states within the U.S. We sincerely
                            apologize for any inconvenience this change may cause for you.
                            <br><br>
                            Please call the clinic for more details.
                        </div>
                    </div>

                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">Prescriptions:</div>
                            <div class="panel-group">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>Patient ID</td>
                                            <td>Medication Name</td>
                                            <td>Purpose</td>
                                            <td>Date Issued</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $stid = oci_parse($link, "SELECT m.pat_id, m.name, m.purpose, m.date_issued from cs3420.dhkw_medications m where m.doc_id = 01");
                                        if (!$stid) {
                                            $err = oci_error($link);
                                            trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR);
                                        }
                                        $r = oci_execute($stid);
                                        while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                            print "<tr>\n";
                                            foreach ($row as $item) {
                                                print "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                                            }
                                            print "</tr>\n";
                                        }
                                        oci_free_statement($stid);
                                        ?>

                                        <tr>
                                            <td>14</td>
                                            <td>Ibuprofen</td>
                                            <td>Swelling of the Brain</td>
                                            <td>15-SEP-13</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <div class="navbar navbar-default navbar-fixed-bottom">
                    <p class="text-muted">
                        CS3420 Database Systems | David Hernandez | (661) 444-3691 |
                        <a href="http://www.github.com/djrhernandez"><u>Github</u></a>
                    </p>
                </div>
            </footer>

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

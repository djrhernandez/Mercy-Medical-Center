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
	<link href="./canvas/apptcenter.css" rel="stylesheet">
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
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->

<!-- Main Body -->
<div class="container">
    <div class="container-fluid">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#scheduleappt">Appointment Form</a></li>
            <li><a data-toggle="tab" href="#futureappts">Upcoming Appointments</a></li>
            <li><a data-toggle="tab" href="#pastvisits">Past Visits</a></li>
        </ul>

        <div class="tab-content">
            <!-- Appointment Form Tab -->
            <div id="scheduleappt" class="tab-pane fade in active">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>
                            Set the preferred date and time that works best for you, and we'll try to accommodate
                            with providing an appointment that will best suit your needs.
                        </h4>
                    </div>
                    <br>
                    <!-- Appointment Form -->
                    <div class="panel-title">
                        Fill out this form below to schedule an appointment to see a Doctor:
                    </div>
                    <div class="panel-group">
                        <!-- Patient Name -->
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="full_name" type="text" class="form-control" name="full_name" placeholder="Name">
                        </div>
                        <br>
                        <!-- Patient ID -->
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                            <input id="patient_id" type="number" class="form-control" name="patient_id" placeholder="Medical Record #">
                        </div>
                        <br>
                        <!-- Patient Preferred Date -->
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input id="appt_date" type="date" class="form-control" name="appt_date" placeholder="Preferred Date For Appointment">
                        </div>
                        <br>
                        <!-- Patient Preferred Time -->
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            <input id="appt_time" type="time" class="form-control" name="appt_time" placeholder="Preferred Time For Appointment">
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-default">Submit</button>

                    <!-- Tips Div -->
                    <div class="panel-body">
                        <strong style="color: red;">Important:</strong>
							If you think you are your family member have a medical or psychiatric emergency, call 911 or
	                        go to the nearest hospital. Do not attempt to access emergency care through this website.
                    </div>
                    <div class="panel-body">
                        <h4>Tips for scheduling your appointment:</h4>
                        <div class="panel-body">
                            <li type="circle">For assistance with services for the hearing or speech impaired, or to
                                request interpretation services, please call the clinic.
                            </li>
                            <br>
                            <li type="circle">To learn more about our physicians, use our
                                <a href="">Clinical Staff Directory</a>.
                            </li>
                        </div>
                    </div>
                    <!-- End Appointment Form -->
                </div>
            </div>
            <!-- End Appointment Form Tab -->

            <!-- Upcoming Appointments Tab -->
            <div id="futureappts" class="tab-pane fade">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>
                            Schedule appointments for yourself and your family members, see upcoming appointments
                            and past visits, and more.
                        </h4>
                    </div>
                    <div class="panel-body">
                        <h4><strong>Measles Alert:</strong>If you think either you or your child has been exposed to
                            the measles virus, do not book an appointment online. Instead, please call the clinic.</h4>
                    </div><hr>
                    <div class="panel-title">
                        <h4>Upcoming appointments are listed below:</h4>
                    </div>
                    <div id="showappts" class="panel-group">
                        <table class="table-responsive">
                            <thead>
                                <tr>
                                    <div class="tab-content">
                                        <div class="row">
                                            <div class="col-sm-4">Name: </div>
                                            <div class="col-sm-8">David Hernandez</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">Appointment at:</div>
                                            <div class="col-sm-8">September 21, 2001 9:45 AM</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">Additional Information:</div>
                                            <div class="col-sm-8">Office Visit</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">Doctor:</div>
                                            <div class="col-sm-8">HUAQING WANG MD, M.D.</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-8">General Practice</div>
                                        </div>
                                    </div>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div id="cancel" class="panel-group">
                    <h4>Canceling Appointments:</h4>
                        <div class="tab-content">
                            <p>
                            If you are unable to cancel online, call the medical facility at:
                                <strong> 1-(661) 555-5555 </strong>
                            </p>
                        </div><br>
                        <button type="button" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </div>
            <!-- End Upcoming Appointments Tab -->

            <!-- Past Visits Tab -->
            <div id="pastvisits" class="tab-pane fade">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4>
                            Stay up to date on your past visits by checking below:
                        </h4>
                    </div><hr>
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div id="showappts" class="panel-group">
                                <table class="table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <td>Date/Time</td>
                                            <td>Description</td>
                                            <td>Specialty</td>
                                            <td>Actions</td>
                                        </tr>
                                    </thead>

									<tbody>
										<?php 
                                        $stid = oci_parse($link, 'SELECT appt_dt  FROM CS3420.DHKW_appointments WHERE pat_id = 16');
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
                                            <td>April 20, 2011 04:20 PM</td>
                                            <td>Office Visit - Mh/bh with Huaqing Wang MD, M.D.</td>
                                            <td>PSYCHIATRY</td>
                                            <td>
                                                    <button type="button" class="btn btn-default">
                                                        <span class="glyphicon glyphicon-download-alt"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-default">
                                                        <span class="glyphicon glyphicon-envelope"></span>
                                                    </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>April 20, 2011 04:20 PM</td>
                                            <td>Office Visit - Mh/bh with Huaqing Wang MD, M.D.</td>
                                            <td>PSYCHIATRY</td>
                                            <td>
                                                    <button type="button" class="btn btn-default">
                                                        <span class="glyphicon glyphicon-download-alt"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-default">
                                                        <span class="glyphicon glyphicon-envelope"></span>
                                                    </button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Past Visits Tab -->

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

<!-- -->
<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
require_once('Header.php');
require_once('Connect.php');
session_start();
?>
<!DOCTYPE html>
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
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet" media="all">

	<!-- Animation Library for Notifications -->
	<link href="./assets/css/animate.min.css" rel="stylesheet" media="all">

	<!-- Material-Dashboard for Tables -->
	<link href="./assets/css/material-dashboard.css" rel="stylesheet" media="all">

	<!-- Custom styles/fonts/icons for this template -->
	<!-- <link href="./canvas/healthrecord.css" rel="stylesheet"> -->
	<link href="./canvas/profile.css" rel="stylesheet" media="all">
	<link href="./canvas/homemodal.css" rel="stylesheet" media="all">

	<!-- Bootstreap Demo Template -->
	<link href="./assets/css/demo.css" rel="stylesheet" media="all"/>
	<!-- <link href="./assets/css/graph.css" rel="stylesheet"/> -->
	<link href="./assets/css/bootstrap-theme.css" rel="stylesheet" media="all"/>

	<link href="./assets/css/pe-icon-7-stroke.css" rel="stylesheet">
	<link href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<style>
		body {
			padding-top:		15px;
			font-size:			20px;
			font-weight:		400;
			background-color:	#cccccc;
		}

		.report {
			margin:		25px;
		}

		.row {
			margin:		auto;
		}

		.card .card-header {
			padding:	25px;
		}

		.card .card-body {
			margin:		10px;
			padding:	10px 20px;
		}

		.card .card-header {
			border-radius:		10px;
			background-color:	#6600FF;
		}

		.card .card-title {
			font-size: 18px;
		}

		.card .subtitle {
		}

		.card .card-content {
			padding:		8px 25px;
			font-size:		14px;
			font-weight:	400;
		}

		.card .table {
			border:		1px solid #eee;
			box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42),
						0 4px 25px 0px rgba(0, 0, 0, 0.12),
						0 8px 10px -5px rgba(0, 0, 0, 0.2);
		}

		tbody {
			background: -webkit-linear-gradient(-45deg, #c6c6c6, #e6e6e6);
			background:	   -moz-linear-gradient(-45deg, #c6c6c6, #e6e6e6);
			background:		-ms-linear-gradient(-45deg, #c6c6c6, #e6e6e6);
			background:		 -o-linear-gradient(-45deg, #c6c6c6, #e6e6e6);
			background:			linear-gradient(-45deg, #c6c6c6, #e6e6e6);
		}

		.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th,
		.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
			padding:		5px;
			text-align:		left;
			line-height:	1.75;
			font-weight:	500;
		}

		@media print {
			#btnprint {
				display: none;
				visibility: hidden;
			}

			#report {
				margin: auto;
			}
			#cheader {
				display: none;
				visibility: hidden;
			}
		}

	</style>

</head>

<body class="container-fluid">
	<?php
	$conn = $GLOBALS['link'];

	$nameErr = $socialErr = $dobErr = $genderErr = $emailErr = "";
	$id = $name = $social = $dob = $sex	= $addr	 = "";
	$city = $state	= $zip = $phone = $email = "";
	?>

	<div class="report" id="report">
		<div class="card">
			<div id="cheader" class="card-header">
				<h3 class="title">Patient Information Summary</h3>
			</div>
			<?php
				/* PHP initialize arrays for table */
				$pHeader = array("Medical Number", "SSN", "Name", "Date of Birth", "Gender", "Address", "City", "State", "Zip Code", "Phone Number", "Email");
				$aHeader = array("Date & Time", "Doctor", "Specialty");
				$vHeader = array("Height", "Weight", "Body Temp", "BPM");
				$mHeader = array("Medication", "Purpose", "Date Issued", "Dosage", "Quantity");
				$cHeader = array("Healthcare Provider", "Insurance ID", "Coverage", "Premium");

				$countp = count($pHeader);
				$counta = count($aHeader);
				$countv = count($vHeader);
				$countm = count($mHeader);
				$countc = count($cHeader);
			?>
			<div class="card-body">
				<!-- Patient Information Table -->
				<div class="card-content">
					<div class="card-title">
						<h3 class="subtitle">General Information:</h3>
					</div>

					<div class="container-fluid">
						<table class="table">
							<thead>
								<tr>
								<?php
									/* PHP to traverse and display header array */
									for ($x = 0; $x < $countp/2 - 1; $x++) {
										print '<td>' . $pHeader[$x] . '</td>';
									}
								?>
								</tr>
							</thead>

							<tbody>
								<tr>
								<?php
									$requested = intval($_GET['requested']);
									$pat_sql = "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID = '" . $requested . "'";

									$pat_parse = oci_parse($conn, $pat_sql);
									oci_execute($pat_parse);

									$pat =	oci_fetch_array($pat_parse, OCI_BOTH);
									$count = count($pat);

									for ($j = 0; $j < 5; $j++) {
										print '<td>' . $pat[$j] . '</td>';
									}
								?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
				<!-- Patient Information Table (Part Deux)-->
				<div class="card-content">
					<div class="container-fluid">
						<table class="table">
							<thead>
								<tr>
								<?php
									for ($x = $countp/2; $x < $countp; $x++) {
										print '<td>' . $pHeader[$x] . '</td>';
									}
								?>
								</tr>
							</thead>
							<tbody>
								<?php
									for ($j = 5; $j < 11; $j++) {
										print '<td>' . $pat[$j] . '</td>';
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				
				<!-- Appointments Table -->
				<div class="card-content">
					<div class="card-title">
						<h3 class="title">Appointments:</h3>
					</div>
					<div class="container-fluid">
						<table class="table">
							<thead>
								<tr>
								<?php
									/* PHP to traverse and display header array */
									for ($x = 0; $x < $counta; $x++) {
										print '<td>' . $aHeader[$x] . '</td>';
									}
								?>
								</tr>
							</thead>
							<tbody>
								<tr>
								<?php
									$appts = "SELECT AP.APPT_DT, E.NAME, DR.SPECIALTY FROM (((CS3420.DHKW_APPOINTMENTS AP
									INNER JOIN CS3420.DHKW_PATIENTS P ON AP.PAT_ID = P.PID)
									INNER JOIN CS3420.DHKW_DOCTORS DR ON AP.DOC_ID = DR.DOC_ID)
									INNER JOIN CS3420.DHKW_EMPLOYEES E ON DR.DOC_ID = E.EID)
									WHERE AP.PAT_ID = '" . $requested . "'";

									$appts_parse = oci_parse($conn, $appts);
									$check = oci_execute($appts_parse);
									if (!$check) {
										$err = oci_error($appts_parse);
										trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR);
									}

									$i = 0;
									while ($apt = oci_fetch_array($appts_parse, OCI_ASSOC + OCI_RETURN_NULLS)) {
										foreach ($apt as $item) {
											print '<td>' .	($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp;') . '</td>';
											if ($i % 3 == 3) {
												echo "</tr><tr>";
											}
											$i++;
										}
										echo "</tr>";
									}
								?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Vitals Table -->
				<div class="card-content">
					<div class="card-title">
						<h3 class="title">Vitals:</h3>
					</div>
					<div class="container-fluid">
						<table class="table">
							<thead>
								<tr>
								<?php
									/* PHP to traverse and display header array */
									for ($x = 0; $x < $countv; $x++) {
										print '<td>' . $vHeader[$x] . '</td>';
									}
								?>
								</tr>
							</thead>
							<tbody>
								<tr>
								<?php
									$vitals =  "SELECT HEIGHT, WEIGHT, BODY_TEMP, BPM FROM CS3420.DHKW_RECORDS_VITALS WHERE PAT_ID = '" . $requested . "'";
									$vitals_parse = oci_parse($conn, $vitals);
									oci_execute($vitals_parse);

									while ($vit = oci_fetch_array($vitals_parse, OCI_ASSOC + OCI_RETURN_NULLS)) {
										foreach ($vit as $item) {
											print '<td>' .	($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp;') . '</td>';
										}
									}
								?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Health Insurance Table -->
				<div class="card-content">
					<div class="card-title">
						<h3 class="title">Health Insurance:</h3>
					</div>

					<div class="container-fluid">
						<table class="table">
							<thead>
								<tr>
								<?php
									/* PHP to traverse and display header array */
									for ($x = 0; $x < $countc; $x++) {
										print '<td>' . $cHeader[$x] . '</td>';
									}
								?>
								</tr>
							</thead>
							<tbody>
								<tr>
								<?php
									$cov =	"SELECT NAME, INS_ID, COVERAGE, PREMIUM FROM CS3420.DHKW_INSURANCECO WHERE PAT_ID = '" . $requested . "'";
									$cov_parse = oci_parse($conn, $cov);
									oci_execute($cov_parse);
									//print_r($cov);

									while ($cov = oci_fetch_array($cov_parse, OCI_ASSOC + OCI_RETURN_NULLS)) {
										foreach ($cov as $item) {
											print '<td>' .	($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp;') . '</td>';
										}
									}
									//print '<td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td>';
								?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Medication Table -->
				<div class="card-content">
					<div class="card-title">
						<h3 class="title">Current Medications:</h3>
					</div>

					<div class="container-fluid">
						<table class="table table-responsive">
							<thead>
								<tr>
								<?php
									/* PHP to traverse and display header array */
									for ($x = 0; $x < $countm; $x++) {
										print '<td>' . $mHeader[$x] . '</td>';
									}
								?>
								</tr>
							</thead>
							<tbody>
								<tr>
								<?php
									$meds =	 "SELECT NAME, PURPOSE, DATE_ISSUED, DOSAGE, QUANTITY FROM CS3420.DHKW_MEDICATIONS WHERE PAT_ID = '" . $requested . "'";
									$meds_parse = oci_parse($conn, $meds);
									oci_execute($meds_parse);
									$i = 0;
									while ($meds = oci_fetch_array($meds_parse, OCI_ASSOC + OCI_RETURN_NULLS)) {
										foreach ($meds as $item) {
											print '<td>' .	($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp;') . '</td>';
											if ($i % 5 == 5) {
												print '</tr><tr>';
												}
											$i++;
										}
										echo "</tr>";
									}
									//print '<td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td><td>N/A</td>';
								?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<!-- Button for Printing -->
				<div class="card-content">
					<div class="container-fluid">
						<div class="text-right">
							<a><button id="btnprint" class="btn btn-md" onclick="printpage()">Print</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Bootstrap core JavaScript ================================================== -->
	<!-- Core JS Files -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="./assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
	<!-- Checkbox, Radio & Switch Plugin -->
	<script src="./assets/js/bootstrap-checkbox-radio-switch.js"></script>
	<!-- Notifications Plugin -->
	<script src="./assets/js/bootstrap-notify.js"></script>
	<!-- Charts Plugin -->
	<script src="./assets/js/chartist.min.js"></script>
	<!-- Light Bootstrap Table Core JavaScript and methods for Demo purpose -->
	<script src="./assets/js/light-bootstrap-dashboard.js"></script>
	<!-- Light Bootstrap Table DEMO methods, don't include it in your project.-->
	<script src="./assets/js/demo.js"></script>
	<script src="./assets/js/npm.js"></script>
	<script src="./canvas/offcanvas.js"></script>
	<script type="text/javascript">
		function printpage() {
			window.print();
		}
	</script>

</body>
</html>
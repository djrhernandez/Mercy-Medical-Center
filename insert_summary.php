<!-- -->
<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
require_once('Header.php');
require_once('Connect.php');
require_once('update_patient.php');
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
	
	<!-- Light Bootstrap Table Core CSS -->
	<link href="./assets/css/material-dashboard.css" rel="stylesheet">
	
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
			font-size: 			20px;
			font-weight: 		400;			
		}
		
		body, h1, h2, h3, h4, h5, h6,
		.h1, .h2, .h3, .h4, .h5, .h6 {
			font-family: 'Raleway', sans-serif;
			
		}
		
		.report {			
			margin:		25px;
		}
		
		.row {
			margin: 	auto;
		}
		
		.card {
			font-size: 25px;
		}
		
		.card .card-header {
			padding: 	25px;
		}
		
		.card .card-body {			
			margin:		10px;
			padding: 	10px 20px;
		}
		
		.card .card-header {
			border-radius: 		10px;
			background-color: 	#6600FF;
		}
		
		.card .card-title {
			font-size: 18px;			
		}

		.card-content {
			padding: 		8px 25px;
			font-size:		14px;
			font-weight:	400;
		}
		
		.card .table {
			border: 	1px solid #eee;
			box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.42),
						0 4px 25px 0px rgba(0, 0, 0, 0.12),
						0 8px 10px -5px rgba(0, 0, 0, 0.2);
		}
		
		form {
			margin: auto;
		}
		
		.form-group.label-floating:not(.is-empty) label.control-label {
			font-family: 'Raleway', sans-serif;
			font-size: 20px;
			top: -30px;
		}
		
		.label.control-label {
			font-size: 24px;
		}
		
		.form-control {
			font-size: 16px;
		}
		
		tbody {
			background: -webkit-linear-gradient(-45deg, #c6c6c6, #e6e6e6);
			background:    -moz-linear-gradient(-45deg, #c6c6c6, #e6e6e6);
			background: 	-ms-linear-gradient(-45deg, #c6c6c6, #e6e6e6);
			background: 	 -o-linear-gradient(-45deg, #c6c6c6, #e6e6e6);
			background: 		linear-gradient(-45deg, #c6c6c6, #e6e6e6);
		}
		
		.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, 
		.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
			padding: 		5px;
			text-align: 	left;
			line-height:	1.75;
			font-weight: 	500;
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
	
	$idErr = $nameErr = $socialErr = $dobErr = $genderErr = $emailErr = "";
	$pid  = $name  = $social = $dob   = $sex   = $addr = "";
	$city = $state = $zip    = $phone = $email = "";
	
	/* PHP to save info from $_POST into a temp array and display it */
	$pHeader 	= array("Medical Number", "SSN", "Name", "Date of Birth", "Gender", "Address", "City", "State", "Zip Code", "Phone Number", "Email");
	$countp 	= count($pHeader);
	$summary 	= array();
	$patInfo 	= array();
	
	$summary[0] = "";
	$pInfo[0] 	= "";
	$i = 0;
	
	foreach($_POST as $key => $value) {
		//printf("%s = %s<br>", $key, $value); 
		$summary[$i] = $value;
		$i++;
	}

	if ($_SERVER['REQUEST_METHOD'] ==  "POST") {
		if (empty($_POST['pid'])) 		{ $idErr 	= "Medical ID Number is Required"; } 
		else 							{ $pid 		= display_update($_POST['pid']); 	} 
		
		if (empty($_POST['fullname'])) 	{ $nameErr = "Name is Required"; } 
		else {
			$name = display_update($_POST['fullname']);
			//Checks if name only ccontains letters and whitespaces
			if (!preg_match("/^[a-zA-Z ]*$/", $name)) { $nameErr = "Only Letters and Whitespaces allowed"; }		
		}
				
		if (empty($_POST['social'])) 	{ $socialErr 	= "Social Security Number is Required"; } 
		else 							{ $social 		= display_update($_POST['social']); 	} 
		
		if (empty($_POST['dob'])) 		{ $dobErr 		= "Date of Birth is Required"; 			} 
		else 							{ $dob 			= display_update($_POST['birthday']); 	}
		
		if (empty($_POST['sex'])) 		{ $genderErr 	= "Gender is Required"; 				}
		else 							{ $sex 			= display_update($_POST['sex']); 		}

		if (empty($_POST['address'])) 	{ $addr 		= ""; }
		else 							{ $addr 		= display_update($_POST['address']); 	}
		
		if (empty($_POST['city'])) 		{ $city 		= ""; }
		else 							{ $city 		= display_update($_POST['city']); 		}
		
		if (empty($_POST['states'])) 	{ $state 		= ""; }
		else 							{ $state 		= display_update($_POST['states']); 	}
				
		if (empty($_POST['zip'])) 		{ $zip 			= ""; }
		else 							{ $zip 			= display_update($_POST['zip']); 		}
		
		if (empty($_POST['phone'])) 	{ $phone 		= ""; }
		else 							{ $phone 		= display_update($_POST['phone']); 	}

		if (empty($_POST['email'])) 	{ $emailErr 	= "Email is Required"; }
		else {			
			$email = display_update($_POST['email']);			
			//Checks if email addr is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $emailErr = "Invalid E-Mail Format"; }
		}
		
		
	}

	function display_update($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	?>

	<div class="container-fluid">
		<div class="card">
			<div class="card-header" data-background-color="#6600FF">
				<h3 class="title">Insert Summary</h3>
			</div>

			<div class="card-body">
				<div class="card-content">
					<form action="profile.php" method="POST" enctype"multipart/form-data" name="form" id="form">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group label-floating">
									<label class="control-label">Medical ID</label>
									<input type="number" name="id" class="form-control" value="<?php echo summary[0]; ?>">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group label-floating">
									<label class="control-label">Name</label>
									<input type="text" name="fullname" class="form-control" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group label-floating">
									<label class="control-label">Social Security Number</label>
									<input type="text" name="social" class="form-control" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group label-floating">
									<label class="control-label">Date of Birth</label>
									<input type="text" name="birthday" class="form-control" value="">
								</div>
							</div>
						
							<div class="col-sm-2">
								<div class="form-group label-floating">
									<label class="control-label">Gender</label>
									<input type="text" name="sex" class="form-control" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group label-floating">
									<label class="control-label">Address</label>
									<input type="text" name="address" class="form-control" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group label-floating">
									<label class="control-label">City</label>
									<input type="text" name="city" class="form-control" value="">
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group label-floating">
									<label class="control-label">State</label>
									<input type="text" name="states" class="form-control" value="">
								</div>
							</div>
							
							<div class="col-sm-2">
								<div class="form-group label-floating">
									<label class="control-label">Zip Code:</label>
									<input type="text" name="zip" class="form-control" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group label-floating">
									<label class="control-label">Phone Number:</label>
									<input type="text" name="phone" class="form-control" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group label-floating">
									<label class="control-label">Email Address:</label>
									<input type="text" name="email" class="form-control" value="">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-6">
								<button method="POST" type="submit" action="insert_patient.php" class="btn btn-md pull-left" name="Submit" value="Submit">
									<i class="glyphicon glyphicon-hand-right" aria-hidden="true"></i>
									Submit
								</button>
								<div class="clearfix"></div>
							</div>
							<div class="col-sm-6">
								<div class="card card-profile">
									<div class="card-avatar">
										<a href="#">
											<img class="img img-responsive" src="./assets/img/MMC.png"/>
										</a>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<?php 
							foreach($_POST as $key => $value) {
								//printf("%s = %s<br>", $key, $value);
								//printf("updated[%s]	 = %s<br>", $key, $updated[$i]); 
								
							}
							/*for ($x=0; $x < $i; $x++) {
							printf("Summary[%d] = %s<br><br>", $x, $summary[$x]);
							}*/
							?>
						</div>
						
						<!-- <a type="button" href="profile.php" class="btn btn-md"><i class="fas fa-long-arrow-alt-left fa-2x" aria-hidden="true"></i></a>
						-->
						
					</form>
					
				</div>
				<div class="card-content">
					
				</div>
			</div>
		</div>
	</div>
	
	<!-- Bootstrap core JavaScript ================================================== -->
	<!-- Core JS Files -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="./assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./assets/js/scoped.js"></script>
	
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
		$('#social').keyup(function() {
			var val = this.value.replace(/\D/g, '');
			var nval = '';
			if (val.length > 4) {
				this.value = val;
			}
			if ((val.length > 3) && (val.length < 6) {
				nval += val.substr(0, 3) + '';
				nval += val.substr(3, 2) + '';
				nval = val.substr(5);
			}
			nval += val;
			this.value = nval.substring(0, 9);
		});
	</script>
	
	<script>
		function validateForm() {
			var pid  = document.forms["form"]["pid"].value;
			var name = document.forms["form"]["fullname"].value;
			var soci = document.forms["form"]["social"].value;
			var bday = document.forms["form"]["birthday"].value;
			var meth = document.forms["form"]["sex"].value;
			var addr = document.forms["form"]["address"].value;
			var city = document.forms["form"]["city"].value;
			var stat = document.forms["form"]["states"].value;
			var zips = document.forms["form"]["zip"].value;
			var cell = document.forms["form"]["phone"].value;
			var mail = document.forms["form"]["email"].value;

			/*
			if (name == "") {
				alert("Name is required. Please enter your full name.");
				return false;
			}
			if ( == "") {
				alert(".");
				return false;
			}
			if ( == "") {
				alert(".");
				return false;
			}
			if ( == "") {
				alert(".");
				return false;
			}
			*/
		}
	</script>

	<script>
	</script>

</body>
</html>

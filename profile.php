<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
session_start();
require_once('Header.php');
require_once('Connect.php');
require_once('profile_get.php');
//require_once('update_patient.php');
$idErr = $nameErr = $socialErr = $dobErr = $genderErr = $emailErr = "";
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
	<link href="./assets/css/animate.min.css" rel="stylesheet">
	
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
	
	<script type="text/javascript">
		function getDocHeight(doc) {
			doc = doc || document;
			var body = doc.body, html = doc.documentElement;
			var height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
			return height;
		}
		
		function setIframeHeight(id) {
			var ifrm = document.getElementById(id);
			var doc = ifrm.contentDocument? ifrm.contentDocument: ifrm.contentWindow.document;
			ifrm.style.visibility = 'hidden';
			ifrm.style.height = "10px"; // reset to minimal height in case going from longer to shorter doc
			ifrm.style.height = getDocHeight( doc ) + 10 + "px";
			ifrm.style.visibility = 'visible';
		}
		
		/* var iframe = document.createElement("iframe");
		iframe.setAttribute('id', "card-table");
		iframe.setAttribute('src', './profile_table.php'); // change the URL
		iframe.setAttribute('width', '100%');
		iframe.setAttribute('height', '10');
		iframe.setAttribute('frameBorder', '0');
		iframe.setAttribute('scrolling', 'no');
		iframe.setAttribute('onload' ,"setIframeHeight(this.id)");
		document.body.appendChild(iframe);
		*/
		
	</script>
	
	<style>
		.error { color: #FF0000; }
	</style>
	
</head>

<body class="container-fluid">
	<div class="wrapper container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<div class="logo">
					<a href="u_MainPage.php" class="simple-text">
						<img class="img-responsive" src="./assets/img/MMC.png" alt="logo">					
						<p class="side-title">Mercy Medical Clinic</p>
					</a>
				</div>
								
				<div class="sidebar-wrapper">	
					<div class="nav nav-sidebar">
						<div class="list-group">
							<li class="list-group-item"><a href="u_MainPage.php">Homepage</a></li>
							<li class="list-group-item"><a href="profile.php">Health Summary<span class="sr-only">(current)</span></a></li>												
							<li class="list-group-item"><a href="appointments.php">Appointment Center</a></li>
							<li class="list-group-item"><a href="pharmacy.php">Prescription Summary</a></li>
							<li class="list-group-item"><a href="coverage.php">Coverages & Costs</a></li>			
						</div>
					</div>
				</div>
			</div>
			
			<!-- Main -->
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div class="navbar">
				<!-- Tabs below Jumbotron -->
					<nav class="navbar navbar-inverse">
						
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
									<span class="sr-only">Toggle Navigation</span>
									<span class="icon-bar"/>
									<span class="icon-bar"/>
									<span class="icon-bar"/>
								</button>
								<!-- 
								<a class="navbar-brand" href="#"/> 
								-->
							</div>

							<!-- Actual Navbar Area -->
							<div id="navbar" class="collapse navbar-collapse">
									<?php setHeaderMenu(); ?>								
									<!-- 
										Reminders: 
										- Move PHP code below into header.php and put a function for it here.
											
										- Bubble Divs
											* Make the bubble images clickable
											= Want to make bubbles move to a new page similar to carousel slide												
											= Can also make bubbles go across the screen, and use them like navbar tabs
												- Will then fade out main page and fade in active page
									-->
							</div>
						
					</nav>
				</div>				
				
				<!-- Body Content -->				
				<div class="content">
					<div class="container-fluid">											
						<div class="row">							
							<!-- Mobile Menu Button -->
							<div class="col-xs-12 col-sm-9">
								<p class="pull-right visible-xs">
									<button type="button" class="btn btn-primary btn-xs" data-toggle="sidebar">Menu</button>
								</p>
							</div>
							
							<!-- Information Container -->
							<div class="inform container-fluid">
								<!-- Bubbles Div -->
								<div class="row placeholders">
									<h2 class="sub-header">Medical Record Summary</h2>
									<?php
									foreach($_POST as $key => $value) {
										//printf("%s = %s<br>", $key, $value); 
									}
									?>

								</div>								
								
								<!-- End Bubbles 2 Div -->
								<!-- 
								<div class="" style="border: 1px black solid">
								</div>
								-->

								<!-- Patient Profile Div -->
								<div class="row news">									
									<div class="col-md-7">										
										<h2 class="news-heading">Your Health profile</h2>
										<div class="news-body">
											<p id="profile-div" class="lead">
												View or print details of your medical records and look after your family's health by
												viewing	past appointment visits, prescribed medications, and more. The table below 
												shows all of the information you have provided to us on our Mercy Medical Center database.
											</p>
										</div>
									</div>
									
									<!-- Image -->
									<div class="col-md-5">
										<div id="boxshadow">
											<a href="#">
												<img id="profile" class="news-image img-responsive center-block" data-src="holder.js/400x400/auto" alt="400x400" src="./assets/img/faces/health.jpg" data-holder-rendered="true">
											</a>
										</div>
									</div>
								</div>

								<!-- TABLE GOES HERE WITH PHP CODE -->
								
								<div class="row news" id="card-table">
									<iframe width="100%" height="875px" frameBorder="0" src="./profile_table.php"></iframe>
								</div>
									
								<hr class="row-divider">
								<!-- End Patient Profile Div -->
							
								<!-- Update Profile Div -->
								<div class="row news">
									<div class="col-md-7">
										<h2 class="news-heading">Health Care Reminders</h2>
										
										<div class="news-body">
											<p id="appt-div" class="lead">												
												If you have need to update any information in your health record, you can update your
												information here.
											</p>
											<p>
												<button type="button" class="btn btn-lg" data-toggle="modal" data-target="#updatemodal">Update Profile
												</button>
											</p>
										</div>										
									</div>
									
									<!-- Image -->
									<div class="col-md-5">
										<div id="boxshadow">
											<a href="#">
												<img id="scheduling" class="news-image img-responsive center-block" data-src="holder.js/400x400/auto" alt="400x400" src="./assets/img/faces/appointment.jpg" data-holder-rendered="true">
											</a>
										</div>
									</div>									
								</div>
								
								
								<hr class="row-divider">								
								<!-- End Update Profile Div -->
								
								<div class="row news">
									<?php
										//For debugging, will dump all elements in $_POST
										//foreach($_POST as $key => $value) { printf("%s = %s<br>", $key, $value); }
									?>
								</div>
								
								<!-- Update Modal Information -->
								<div class="modal fade" id="updatemodal" role="view">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header" style="padding: 25px 30px;">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4><span class="glyphicon glyphicon-user"></span>Update</h4>												
											</div>
											
											<div class="modal-dialog-centered" style="padding-top: 10px;"><p><span class="error">* Required Field</span></p>
											</div>
											
											<div class="modal-body" style="padding: 20px 50px;">
												<form action="update_summary.php" method="post" role="form" enctype="multipart/form-data">
													<div class="form-group">
														<label for="pid"><span class="glyphicon glyphicon-user"></span> Medical ID Number: </label>
														<span class="error">*  <?php  echo $idErr; ?></span>
														<input name="pid" type="text" class="form-control" placeholder="#">
													</div>
													
													<div class="form-group">
														<label for="fullname"><span class="glyphicon glyphicon-user"></span> Full Name: </label>
														<span class="error">*  <?php  echo $nameErr; ?></span>
														<input name="fullname" type="text" class="form-control" placeholder="John Smith">
													</div>
													
													<div class="form-group">
														<label for="social"><span class="glyphicon glyphicon-barcode"></span> Social Security Number: </label>
														<span class="error">*  <?php  echo $socialErr; ?></span>
														<input name="social" type="text" class="form-control" placeholder="123-45-6789" maxlength="11">
													</div>
													
													<div class="form-group">
														<label for="birthday"><span class="glyphicon glyphicon-calendar"></span> Date of Birth: </label>
														<span class="error">*  <?php  echo $dobErr; ?></span>
														<input name="birthday" type="date" class="form-control" id="datetimepicker">
													</div>

													<div class="form-group">
														<label for="sex"><span class="glyphicon glyphicon-apple"></span> Gender: </label>
														<span class="error">*  <?php  echo $genderErr; ?></span>														
														<input name="sex" type="radio" <?php if (isset($sex) && $sex == "Female") echo "checked"; ?> value="F">Female
														<input name="sex" type="radio" <?php if (isset($sex) && $sex == "Male") echo "checked"; ?> value="M">Male														
													</div>
													
													<div class="form-group">
														<label for="address"><span class="glyphicon glyphicon-home"></span> Address: </label>
														<input name="address" type="text" class="form-control" placeholder="1234 Pointer St.">
													</div>
													
													<div class="form-group">
														<label for="city"><span class="glyphicon glyphicon-road"></span> City: </label>
														<input name="city" type="text" class="form-control">
													</div>
													
													<div class="form-group">
														<label for="states"><span class="glyphicon glyphicon-star-empty"></span> State: </label>																																		
														<select name="states" id="states" class="form-control">
															<option value="AL">Alabama</option>
															<option value="AK">Alaska</option>
															<option value="AZ">Arizona</option>
															<option value="AR">Arkansas</option>
															<option value="CA">California</option>
															<option value="CO">Colorado</option>
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="DC">District Of Columbia</option>
															<option value="FL">Florida</option>
															<option value="GA">Georgia</option>
															<option value="HI">Hawaii</option>
															<option value="ID">Idaho</option>
															<option value="IL">Illinois</option>
															<option value="IN">Indiana</option>
															<option value="IA">Iowa</option>
															<option value="KS">Kansas</option>
															<option value="KY">Kentucky</option>
															<option value="LA">Louisiana</option>
															<option value="ME">Maine</option>
															<option value="MD">Maryland</option>
															<option value="MA">Massachusetts</option>
															<option value="MI">Michigan</option>
															<option value="MN">Minnesota</option>
															<option value="MS">Mississippi</option>
															<option value="MO">Missouri</option>
															<option value="MT">Montana</option>
															<option value="NE">Nebraska</option>
															<option value="NV">Nevada</option>
															<option value="NH">New Hampshire</option>
															<option value="NJ">New Jersey</option>
															<option value="NM">New Mexico</option>
															<option value="NY">New York</option>
															<option value="NC">North Carolina</option>
															<option value="ND">North Dakota</option>
															<option value="OH">Ohio</option>
															<option value="OK">Oklahoma</option>
															<option value="OR">Oregon</option>
															<option value="PA">Pennsylvania</option>
															<option value="RI">Rhode Island</option>
															<option value="SC">South Carolina</option>
															<option value="SD">South Dakota</option>
															<option value="TN">Tennessee</option>
															<option value="TX">Texas</option>
															<option value="UT">Utah</option>
															<option value="VT">Vermont</option>
															<option value="VA">Virginia</option>
															<option value="WA">Washington</option>
															<option value="WV">West Virginia</option>
															<option value="WI">Wisconsin</option>
															<option value="WY">Wyoming</option>
														</select>																	
													</div>
													
													<div class="form-group">
														<label for="zip"><span class="glyphicon glyphicon-globe"></span> Zip Code: </label>
														<input name="zip" type="number" class="form-control" placeholder="98210" maxlength="5">
													</div>
													
													<div class="form-group">
														<label for="phone"><span class="glyphicon glyphicon-phone-alt"></span> Phone Number: </label>
														<input name="phone" type="number" class="form-control" placeholder="8888675309" maxlength="10">
													</div>
													
													<div class="form-group">
														<label for="email"><span class="glyphicon glyphicon-envelope"></span> Email Address: </label>
														<span class="error">*  <?php  echo $emailErr; ?></span>
														<input name="email" type="text" class="form-control" placeholder="jsmith91@example.com">
													</div>
													
													<!-- 
													<div class="form-group">
														<label for="pwd"><span class="glyphicon glyphicon-hand-right"></span> Password: </label>
														<input name="pwd" type="text" class="form-control" placeholder="Edit Password">
													</div>
													-->

													<!-- Form Template
													<div class="form-group">
														<label for="">
															<span class="glyphicon glyphicon-[icon]"></span> Title:
														</label>
														<input type="text" class="form-control" id="" placeholder="">
													</div>
													-->

													<!-- Cancel Button -->
													<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
														<span class="glyphicon glyphicon-remove"></span> Cancel
													</button>

													<!-- Submit Button -->
													<button name="submit" action="profile_table.php" type="submit" method="POST" class="btn btn-success btn-default pull-right" value="submit">
														<span class="glyphicon glyphicon-ok"></span> Submit
													</button>
												</form>
											</div>	<!-- End Modal Body -->		
											
											<div class="modal-footer" style="padding: 20px 50px;">
											</div> <!-- End Modal Footer -->
										</div> <!-- End Modal Content -->
									</div> <!-- End Modal Dialog -->
								</div> <!-- End Update Modal -->
							</div> <!-- End Inform Container -->
						</div> <!-- End Row -->
					</div> <!-- End Container-Fluid Inside Body -->
				</div> <!-- End Body Content -->
				
				<!-- Footer  -->
				<div class="container-fluid">
					<footer class="footer">
						<div class="container-fluid">
							<p class="pull-left">
								<a href="#">Home</a>  |  <a href="#">Company</a>  |  <a href="#">Portfolio</a>  |  <a href="#">Blog</a>
							</p>
							
							<p class="copyright pull-right text-muted">
								CS3420 Database Systems | David Hernandez | (661) 444-3691 |
								<a href="http://www.github.com/djrhernandez"><u>Github</u></a>
								&copy 2016
							</p>
						</div>
					</footer>					
				</div> <!-- End Footer -->
			</div>	<!-- End Main -->		
		</div> <!-- End Row -->
	</div> <!-- End Wrapper -->
	
	<!-- Bootstrap core JavaScript ================================================== -->
	<!-- Core JS Files -->
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

	<?php
		//Converts Oracle's DateTime into a string that represents the date and time
		function oracleDateTime($value, $oracle) {
			if ($oracle == null || $oracle == '') { return null; }
			else {
				$datetime = explode(' ', $oracle);
				$date = $datetime[0];
				$time = $datetime[1];
				$time_suffix = $datetime[2];
				
				$date 	= explode('-', $date);
				$day	= (int) $date[0];
				$month 	= (int) date('n', strtotime($date[1]));
				$year 	= (int) $date[2];
				
				if  ($year > 50) { $year += 1900; }
				else { $year += 2000; }
				
				$time = explode('.', $time);
				$hours =  $time[0];
				
				if ($time_suffix == 'PM' && $hours != 12) {
					$hours = (int)  $hour + 12;
				}
				
				$minutes = (int) $time[1];
				$seconds = (int) $time[2];
				
				switch($value) {
					case 'oracle':	return date($format, mktime($hour, $minutes, $seconds, $month, $day, $year));
									break;						
					case 'date': 	return $month.'/'.$day.'/'.$year.'. ';
									break;
					case 'time':	return ($hours * 60) + $minutes;
									break;
					case 'month':	return $month;
									break;
					case 'day':		return $day;
									break;
					case 'hours':	return $hours;
									break;
					case 'minutes':	return $minutes;
									break;
					default:		break;
				}
				return 0;
			}
		}
	?>
	
	<script>
	function showPatientSummary(str) {
		if (window.XMLHttpRequest) {
			//Code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else { 
			//Code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
			}
		}

		xmlhttp.open("GET","profile_summary.php?requested="+str,true);
		xmlhttp.send();

	</script>
	
	</body>	
</html>

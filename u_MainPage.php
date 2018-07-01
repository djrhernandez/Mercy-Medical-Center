<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
session_start();
require_once('Header.php');
require_once('Connect.php');
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
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Animation Library for Notifications -->
	<link href="./assets/css/animate.min.css" rel="stylesheet">
	
	<!-- Light Bootstrap Table Core CSS
	<link href="./assets/css/light-bootstrap-dashboard.css" rel="stylesheet">
	-->
	
	<!-- Custom styles/fonts/icons for this template -->
	<link href="./canvas/mainpg.css" rel="stylesheet">
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
	<!-- id = #test, class = .test -->
	<!-- JQuery Scripts
	<script>
	$(document).ready(function() {
		// jQuery methods go here...
		$("img").click(function() {			
			
		});
		
		$("#profile").click(function() {
			$("#profile-div").toggle();
		});
			
		$("#scheduling").click(function() {
			$("#appt-div").toggle();
		});
			
		$("#pharmacy").click(function() {
			$("#meds-div").toggle();
		});
			
		$("#coverage").click(function() {
			$("#cov-div").toggle();
		});						
	});
	</script>
	-->
</head>

<body>
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
							<li class="list-group-item"><a href="u_MainPage.php">Homepage<span class="sr-only">(current)</span></a></li>
							<li class="list-group-item"><a href="profile.php">Health Summary</a></li>
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
								<ul class="nav navbar-nav navbar-right">
									<!-- 
										Reminders: 
											- Move PHP code below into header.php and put a function for it here.
											
											- Bubble Divs
												* Make the bubble images clickable
												= Want to make bubbles move to a new page similar to carousel slide												
												= Can also make bubbles go across the screen, and use them like navbar tabs
													- Will then fade out main page and fade in active page

									<li>
										<?php
											/*if (isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])) {
												echo '<form id="logout" method="post" action="'. htmlspecialchars($_SERVER["PHP_SELF"]).'">';
												echo '<a href="logout.php" class="btn btn-primary btn-login" role="button">Login</a>';
												echo '</form>';
												echo 'Logout';
											} else {
												echo '<a href="login.php" class="btn btn-primary btn-login" role="button">Login</a>';
												echo '</button>';
											}*/
										?>								
									</li>
								</ul>
								-->
							</div>
						
					</nav>
				</div>				
				
				<!-- Body Content -->				
				<div class="content">
					<div class="container-fluid">					
						<!-- <div class="row row-offcanvas row-offcanvas-right"> -->
						<div class="row">							
							<!-- Body Tabs Button -->
							<!--
								<div class="row">
									<div class="col-md-8">
										<div class="card">
											<div class="header-tab">
												<h4 class="title">Cage Use</h4>
												<p class="category">Previous Weeks Performance</p>
											</div>
											<div class="content">
												<div id="chartHours" class="ct-chart"></div>
												<div class = "footer">
													<div class="legend">
														<i class="fa fa-circle text-danger"></i>Cages Used
														<i class="fa fa-circle text-info"></i>Cages Unused
													</div>
													<hr>
													<div class="stats">
														<i class="fa fa-history"></i>Updates on page refresh
													<div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="card">
											<div class="header-tab">
												<h4 class="title">2015 Rentals</h4>
												<p class="category">All Products (Cages, Coaching Sessions, etc.)</p>
											</div>
											<div class="content">
												<div id="chartActivity" class="ct-chart"></div>
												<div class = "footer">
													<div class="legend">
														<i class="fa fa-circle text-info"></i>Cages
														<i class="fa fa-circle text-danger"></i>Coaching Sessions
														<i class="fa fa-circle text-warning"></i>Meeting Room
													</div>
													<hr>
													<div class="stats">
														<i class="fa fa-check"></i> - 
													<div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="card">
											<div class="header-tab">
												<h4 class="title">Tasks</h4>
												<p class="category">Back-End Development</p>
											</div>
											
											<div class="content">
												<div class="table-full-width">
													<table class="table">
														<tbody>
															<tr>
																<td>
																	<label class="checkbox">
																		<input type="checkbox" value="" data-toggle="checkbox">
																	</label>
																</td>
																<td>Sign Contract For "Rental Agreement #00891?</td>
																<td class="td-actions text-right">
																	<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
																		<i class="fa fa-edit"/>
																	</button>
																	<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
																		<i class="fa fa-times"/>
																	</button>
																</td>															
															</tr>
															
															<tr>
																<td>
																	<label class="checkbox">
																		<input type="checkbox" value="" data-toggle="checkbox" checked="">
																	</label>
																</td>
																<td>Customer E-Mails</td>
																<td class="td-actions text-right">
																	<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
																		<i class="fa fa-edit"/>
																	</button>
																	<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
																		<i class="fa fa-times"/>
																	</button>
																</td>															
															</tr>
															
															<tr>
																<td>
																	<label class="checkbox">
																		<input type="checkbox" value="" data-toggle="checkbox" checked="">
																	</label>
																</td>
																<td></td>
																<td class="td-actions text-right">
																	<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
																		<i class="fa fa-edit"/>
																	</button>
																	<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
																		<i class="fa fa-times"/>
																	</button>
																</td>															
															</tr>
															
															<tr>
																<td>
																	<label class="checkbox">
																		<input type="checkbox" value="" data-toggle="checkbox">
																	</label>
																</td>
																<td></td>
																<td class="td-actions text-right">
																	<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
																		<i class="fa fa-edit"/>
																	</button>
																	<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
																		<i class="fa fa-times"/>
																	</button>
																</td>															
															</tr>
															
															<tr>
																<td>
																	<label class="checkbox">
																		<input type="checkbox" value="" data-toggle="checkbox">
																	</label>
																</td>
																<td></td>
																<td class="td-actions text-right">
																	<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
																		<i class="fa fa-edit"/>
																	</button>
																	<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
																		<i class="fa fa-times"/>
																	</button>
																</td>															
															</tr>
															
															<tr>
																<td>
																	<label class="checkbox">
																		<input type="checkbox" value="" data-toggle="checkbox">
																	</label>
																</td>
																<td></td>
																<td class="td-actions text-right">
																	<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
																		<i class="fa fa-edit"/>
																	</button>
																	<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
																		<i class="fa fa-times"/>
																	</button>
																</td>															
															</tr>
																													
														</tbody>
													</table>
												</div>
												
												
												<div class="footer">
													<hr>
													<div class="stats">
														<i class="fa fa-history"></i>Updates on Page Refresh
													</div>
												</div>											
											</div>
										</div>
									</div>							
								</div>		
							-->
							
							<!-- Mobile Menu Button -->
							<div class="col-xs-12 col-sm-9">
								<p class="pull-right visible-xs">
									<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Menu</button>
								</p>
							</div>
							
							<!-- Information Container -->
							<div class="inform container-fluid">								
								<!-- Bubbles 1 Div
								<div class="row placeholders">
									<div class="col-xs-6 col-sm-3 placeholder">
										<img src="./assets/img/faces/health.jpg" width="300" height="300" class="img-responsive" alt="Generic Placeholder Thumbnail">
										<h4>Health</h4>
										<span class="text-muted">Something Else 1</span>
									</div>
									
									<div class="col-xs-6 col-sm-3 placeholder">
										<img src="./assets/img/faces/appointment.jpg" width="300" height="300" class="img-responsive" alt="Generic Placeholder Thumbnail">
										<h4>Appointments</h4>
										<span class="text-muted">Something Else 2</span>
									</div>
									
									<div class="col-xs-6 col-sm-3 placeholder">
										<img src="./assets/img/faces/meds.jpg" width="300" height="300" class="img-responsive" alt="Generic Placeholder Thumbnail">
										<h4>Medication</h4>
										<span class="text-muted">Something Else 3</span>
									</div>
									
									<div class="col-xs-6 col-sm-3 placeholder">
										<img src="./assets/img/faces/coverage.jpg" width="300" height="300" class="img-responsive" alt="Generic Placeholder Thumbnail">
										<h4>Health Coverage</h4>
										<span class="text-muted">Something Else 4</span>
									</div>
								</div>
								End Bubbles 1 Div -->
							
								<!-- Bubbles 2 Div -->
								<div class="row placeholders">
									<h2 class="sub-header">Welcome to Mercy Medical Clinic</h2>
									<div class="row mission">
										<p>Our Mission:</p>
									</div>
									
									<div class="row statement">
										<p>
											The DK Clinical Facility currently serves 10,000 members in Kern County. 
											Recognized as one of America's rising health case providers and not-for-profit health plans,
											we are committed to helping shape the future of health care.
										</p>
									</div>									
								</div>
								<!-- End Bubbles 2 Div -->
								<!-- 
								<div class="" style="border: 1px black solid">
								</div>
								-->
							
								<hr class="row-divider">
								<!-- Patient Profile Div -->
								<div class="row news">
									<div class="col-md-7">
										<h2 class="news-heading">
											Your Medical Records
											<span class="text-muted">
												
											</span>
										</h2>
										<div class="news-body">
											<p id="profile-div" class="lead">
												View health reminders, prescriptions, ongoing health conditions,
												and more in the Medical Record Center.
											</p>
										</div>
									</div>
									
									<div class="col-md-5">
										<div id="boxshadow">
											<a href="profile.php">
												<img id="profile" class="news-image img-responsive center-block" data-src="holder.js/400x400/auto" alt="400x400" src="./assets/img/faces/health.jpg" data-holder-rendered="true">
											</a>
										</div>
									</div>
								</div>
								<hr class="row-divider">
							
								<!-- Appointment Center Div -->
								<div class="row news">
									<div class="col-md-5">
										<div id="boxshadow">
											<a href="appointments.php">
												<img id="scheduling" class="news-image img-responsive center-block" data-src="holder.js/400x400/auto" alt="400x400" src="./assets/img/faces/appointment.jpg" data-holder-rendered="true">
											</a>
										</div>
									</div>
									
									<div class="col-md-7">
										<h2 class="news-heading">
											Appointment Center
											<span class="text-muted">
												
											</span>
										</h2>
										
										<div class="news-body">
											<p id="appt-div" class="lead">
												Schedule appointments online, quickly and conveniently.
												View or cancel upcoming appointments or view past visits.
											</p>
										</div>
									</div>
								</div>
								<hr class="row-divider">
								
								<!-- Medication Div -->
								<div class="row news">
									<div class="col-md-7">
										<h2 class="news-heading">
											Pharmacy Center
											<span class="text-muted">
												
											</span>
										</h2>
										
										<div id="meds-div" class="news-body">
											<p class="lead">
												You can view your prescriptions here, or learn about specific
												medications in our drug encyclopedia link
												<a href="http://cs.csubak.edu/~dirizarryher/u_CoverageCosts.html">here</a>.
											</p>
										</div>
									</div>
									
									<div class="col-md-5">
										<div id="boxshadow">
											<a href="pharmacy.php">
												<img id="pharmacy"  class="news-image img-responsive center-block" data-src="holder.js/400x400/auto" alt="400x400" src="./assets/img/faces/meds.jpg" data-holder-rendered="true">
											</a>
										</div>
									</div>
								</div>
								<hr class="row-divider">
								
								<!-- Coverage Div -->
								<div class="row news">
									<div class="col-md-5">
										<div id="boxshadow">
											<a href="coverage.php">
												<img id="coverage" class="news-image img-responsive center-block" data-src="holder.js/400x400/auto" alt="400x400" src="./assets/img/faces/coverage.jpg" data-holder-rendered="true">
											</a>
										</div>
									</div>
									
									<div class="col-md-7">
										<h2 class="news-heading">
											Health Coverage & Costs
											<span class="text-muted">
												
											</span>
										</h2>
										
										<div  id="cov-div" class="news-body">
											<p class="lead">
												Get the facts about your insurance plan and benefits,
												download forms, pay medical bills, and more in my
												coverage & costs.
											</p>
										</div>
									</div>
								</div>
								<hr class="row-divider">
								<?php
									/*
									require "refs/Header.php";
									if(isset($_SESSION['active'])) {
										$user = $_SESSION['Username'];
										$sql = "SELECT * FROM MMC_Users WHERE Username = '$user'";
										//Print out User's Username
										if ($result = mysqli_query($link, $sql)) {
											echo "<div border='1'> Welcome back " . $user . "</div>";
											welcome($user);
										}
									}
									*/
								?>
								
								<?php
									/*$stid = oci_parse($link, 'SELECT NAME FROM CS3420.DHKW_PATIENTS WHERE PID=1');
									if (!$stid) {
										$err = oci_error($linked);
										trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR);
									}
									
									$r = oci_execute($stid);
									if (!$r) trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR);											
									
									while ($res = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
										foreach($res as $item)	echo "<p> " , ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") , " </p>\n";
									}
									*/
								?>								
							</div>
							<!-- End Information Container -->
						</div>
						<!-- End Row -->
					</div>
					<!-- End Main Content -->
					
					<!-- Footer  -->
					<div class="container-fluid">
						<footer class="footer">
							<p class="pull-left">
								<a href="#">Home</a> | 
								<a href="#">Company</a> | 
								<a href="#">Portfolio</a> | 
								<a href="#">Blog</a>
							</p>
							
							<p class="copyright pull-right text-muted">
								CS3420 Database Systems | David Hernandez | (661) 444-3691 |
								<a href="http://www.github.com/djrhernandez"><u>Github</u></a>
								&copy 2016
							</p>						
						</footer>
					</div>
					<!-- End Footer -->
				</div>
				<!-- End Body Content -->
			</div>		
			<!-- End Main -->		
		</div>
		<!-- End Row -->
	</div>
	<!-- End Wrapper -->
	
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

		//Retrives current Date/Time
		
		
	?>
	</body>	
</html>

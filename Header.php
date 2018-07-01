<?php
require_once("Connect.php");
require_once("Lib.php");

//Welcome Notification in Health Manager Div
function welcome($result) {
	if ($result) {
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$name = $row['full_name'];
		}
		echo "Welcome Back <strong> $name! </strong><br>";
	}
}

//Menu when user logs in
function loginmenu() {
	echo <<<EOT
	<li class=""><a href="u_MainPage.php">Home</a></li>
	<li class=""><a href="profile.php">Health Records</a></li>
	<li class=""><a href="appointments.php">Appointment Center</a></li>
	<li class=""><a href="pharmacy.php">Pharmacy Center</a></li>
	<li class=""><a href="coverage.php">Coverages & Costs</a></li>
	<li class=""><a href="u_Logout.php">Logout</a></li>
EOT;
}

//Menu before a user logs outs or doesn't have a log in
function logoutmenu() {
	echo <<<EOT
<ul class="nav navbar-nav">
	<li class=""><a href="u_MainPage.php">Home</a></li>
	<li class=""><a href="profile.php">Health Records</a></li>
	<li class=""><a href="appointments.php">Appointment Center</a></li>
	<li class=""><a href="pharmacy.php">Pharmacy Center</a></li>
	<li class=""><a href="coverage.php">Coverages & Costs</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li class=""><button type="button" class="btn btn-lg" data-toggle="modal" data-target="#logmodal">Login</a></li>

<div class="modal fade" id="logmodal" role="login">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="padding: 25px 30px;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
			</div>
			
			<div class="modal-body" style="padding: 40px 50px;">
				<form action="u_MainPage.php" method="post" role="form">
					<div class="form-group">
						<label for="usrname">
							<span class="glyphicon glyphicon-user"></span> Username:
						</label>
						<input type="text" class="form-control" id="usrname" placeholder="Enter email">
					</div>
					
					<div class="form-group">
						<label for="psw">
							<span class="glyphicon glyphicon-eye-open"></span> Password:
						</label>
						<input type="text" class="form-control" id="psw" placeholder="Enter password">
					</div>
					
					<div class="checkbox">
						<label>
							<input  type="checkbox" value="" checked>Remember me
						</label>					
					</div>
					<button type="submit" class="btn btn-success btn-block">
						<span class="glyphicon glyphicon-off"></span> Login
					</button>
				</form>
			</div>			
			
			<div class="modal-footer" style="padding: 20px 50px;">
				<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove"></span> Cancel
				</button>
				<p>Not a member? <a href="#">Sign Up</a></p>
				<p>Forgot <a href="#">Password?</a></p>
			</div>
		</div>
	</div>
</div>
EOT;
}

function setHeaderMenu() {
	if (isset($_SESSION['active'])) { loginmenu(); }
	if (!isset($_SESSION['active'])) { logoutmenu(); }
}



?>

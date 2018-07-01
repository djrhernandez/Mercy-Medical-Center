<?php
	error_reporting(E_ALL); ini_set('display_errors', '1');
	require_once('Header.php');
	require_once('Connect.php');	
	
	$i = 0;
	$updated = array();
	$updated[0] = "";
	
	if(isset($_POST['submit'])) {
		$conn 	= $GLOBALS['link'];
		$pid 	= $_POST['pid'];
		$name	= $_POST['fullname'];
		$ssn	= $_POST['social'];
		$dob	= $_POST['birthday'];
		$sex	= $_POST['sex'];
		$addr	= $_POST['address'];
		$city	= $_POST['city'];
		$states	= $_POST['states'];
		$zip	= $_POST['zip'];		
		$phone	= $_POST['phone'];
		$email	= $_POST['email'];
		//$pwd	= $_POST['pwd'];

		
		$temp 	= date_create($dob);
		$date	= date_format($temp, "d-M-y");
		
		if (preg_match("#^\d[0-9]{3}-?\d[0-9]{2}-?\d[0-9]{4}$#", $ssn)) {
			//return preg_replace("#^(\d[0-9]{3})-?(\d[0-9]{2})-?(\d[0-9]{4})$#", "$1-$2-$3", $ssn);
		} else {
			//die("Input cannot be formatted as a social security number");
		}
		
		
		foreach($_POST as $key => $value) {
			//	printf("%s = %s<br>", $key, $value); 
			$updated[$i] = $value;
			$i++;
		}
		
		//For adding patients to the table and database
		$sql = 'BEGIN CS3420.DHKW_UPDATE_PATIENT(:pid, :ssn, :name, :dob, :sex, :addr, :city, :states, :zip, :phone, :email);END;';
		$result = oci_parse($conn, $sql);
		oci_bind_by_name($result, ':pid',	$pid);
		oci_bind_by_name($result, ':ssn',	$ssn);
		oci_bind_by_name($result, ':name',	$name);
		oci_bind_by_name($result, ':dob',	$date);	
		oci_bind_by_name($result, ':sex',	$sex);
		oci_bind_by_name($result, ':addr',	$addr);
		oci_bind_by_name($result, ':city',	$city);
		oci_bind_by_name($result, ':states', $states);
		oci_bind_by_name($result, ':zip',	$zip);
		oci_bind_by_name($result, ':phone', $phone);
		oci_bind_by_name($result, ':email', $email);
		oci_execute($result, OCI_DEFAULT);
		
		if (!oci_execute($result)) {
			var_dump(oci_error());
			print "<br><br>";
			var_dump($result, $_POST);
			print "<br><br>";
		}

		//Prepares the statement for SQL
		if (!$result) {
			$err = oci_error($conn);
			trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR);
		}

		//Performs the logic of the query
		if (!oci_execute($result)) {
			$err = oci_error($result);
			trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR);
		}
		
		/*Fetches the results of the query
		print "<table><thead><tr></tr></thead><tbody>";
		while ($summary = oci_fetch_array($result, OCI_ASSOC + OCI_RETURN_NULLS)) {
			print "<tr>\n";
			foreach ($summary as $item) {
				echo "<td> " , ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") , " </td>\n";
			}
			print "</tr>\n";
		}
		print "</tbody></table>";
		*/
		oci_free_statement($result);
	}
	
	print "<table><thead><tr></tr></thead><tbody>";
	foreach ($updated as $item) {
		echo "<tr><td> " , ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") , " </td></tr>\n";
	}
?>
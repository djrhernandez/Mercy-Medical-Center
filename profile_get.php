<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('Connect.php');
//Don't need to put in session_start();
function viewPatients() {
	
	$conn = $GLOBALS['link'];
	$headers = array("Medical ID", "SSN", "Name", "Date of Birth", "Gender", "Address", "City", "State", "Zip Code", "Phone Number", "Email");
	$stid = array();
	$temp = array();
	$idarray = array();
	$inputid = array(1, 5, 6, 8, 14, 16);
	$stid[0] 	= oci_parse($conn, "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID='" . $inputid[0] . "'");
	$stid[1] 	= oci_parse($conn, "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID='" . $inputid[1] . "'");
	$stid[2] 	= oci_parse($conn, "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID='" . $inputid[2] . "'");
	$stid[3] 	= oci_parse($conn, "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID='" . $inputid[3] . "'");
	$stid[4] 	= oci_parse($conn, "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID='" . $inputid[4] . "'");
	$stid[5] 	= oci_parse($conn, "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID='" . $inputid[5] . "'");	
	
	$idarray[0] = oci_parse($conn, "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID='" . $inputid[0] . "'");
	$idarray[1] = oci_parse($conn, "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID='" . $inputid[1] . "'");
	$idarray[2] = oci_parse($conn, "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID='" . $inputid[2] . "'");
	$idarray[3] = oci_parse($conn, "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID='" . $inputid[3] . "'");
	$idarray[4] = oci_parse($conn, "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID='" . $inputid[4] . "'");
	$idarray[5] = oci_parse($conn, "SELECT * FROM CS3420.DHKW_PATIENTS WHERE PID='" . $inputid[5] . "'");
	
	$arrlength 	= count($stid);	
	$hcount 	= count($headers);	
	
	print "<thead><tr>";
	//Traverses and displays the header array
	for ($x = 0; $x < $hcount; $x++) {
		print '<td>' . $headers[$x] . '</td>';
	}
		
	print "</tr></thead><tbody>";
	
	//Variables to get the id of the patient that the user puts in to look at their summary	
	$i = $id = $pick = 0;
	
	
	for ($x = 0; $x < $arrlength; $x++) {
		//Validation of SQL statements
		if (!$stid[$x]) {
			$err = oci_error($conn);
			trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR);
		}
		
		//Retrieves the patient IDs from the oci string
		$check = oci_execute($idarray[$x]);
		if (!$check) {
			$err = oci_error($idarray[$x]);
			trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR);
		}
		
		while ($return = oci_fetch_array($idarray[$x], OCI_BOTH)) {			
			$temp[$i] = $return[0];
			//echo "temp[$i] = " . $temp[$i] . "<br>\n";
		}
		$i++;
		/* ---------------------------------------------------------------------------- */

		//$id = count($temp); //id = 5
		//Retrieves all of the information about the patient in the database		
		$view = oci_execute($stid[$x]);
		if (!$view) {
			$err = oci_error($stid[$x]);
			trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR);
		}
		
		//Fetches the results of the query
		//Note: OCI_BOTH will allow temp to take result's value, but will duplicate info in cells		
		while ($result = oci_fetch_array($stid[$x], OCI_ASSOC + OCI_RETURN_NULLS)) {
			print "<tr>\n";
			foreach ($result as $item) {
				print "<td> " . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . " </td>\n";
			}
			
			//Buttons have their respective patient ID values
			print "<td><a type='button' href='profile_summary.php?requested=" . $temp[$pick] . "' name='requested' class='btn btn-sm' value='$temp[$pick]' onclick='showPatientSummary(this.value)'>Info</a></td>";
			print "</tr>\n";
			$pick++;
		}
		print "</tbody>";
		oci_free_statement($stid[$x]);
	}
	
	//echo "temp id count = $id <br>";	
}



?>
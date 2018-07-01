<?php
error_reporting(E_ALL); ini_set('display_errors', 1);

define("USERNAME", "cs342");
define("PASSWORD", "c3m4p2s");
putenv("ORACLE_HOME=:/home/oracle/app/product/11.2.0/dbhome_1");
$db = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)
			(HOST=delphi.cs.csub.edu)(PORT=1521)))
			(CONNECT_DATA=(SID=dbs01)))";

if ($link = oci_connect(USERNAME, PASSWORD, $db)) {
	//echo "Successfully connected to Oracle!\n";	
} else {
	die('Could not connect: ' . oci_error($link));
	return;
}

//Connect to Oracle Database
?>
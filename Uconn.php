<?php
// Global variables
	$server = "10.0.3.19";
	$user = "uconn";
	$pass = "nShyN4QEvuN5csat";
	$database = "lh";
// Setting
	$setting = "lhconf";

function ulink($s, $u, $p, $d) {
	/*
	 * Open an Unprivileged connection to MySQL server
	 * Parameters stands for server, username, password and database respectively
	 */
	$uconn = new mysqli($s, $u, $p, $d);
 
	if ($uconn -> connect_errno) {
		echo '<script type="text/javascript"> alert("Cannot connect to database: '. $uconn->connect_error.'");</script>';
		throw new Exception ("Cannot connect to MySQL: ". $uconn->connect_error);
	} else {
		return $uconn;
	}
}

function loadsettings($settingslink) {
	/*
	 * TBD: QUERY CONDITION
	 * POSSIBLE SOLUTION: BUILD AN INUSE RECORD
	 */
	$settingsquery = "SELECT lhconf_year, lhconf_y10, lhconf_y11, lhconf_y12 FROM lhconf 
					  WHERE lhconf_profile == 'INUSE'";
	// Test query and connection
	$settingsresult = $settingslink->query($settingquery);
	if (!settingsresult) {
		// FAULTY CONNECTION!!! EXCEPTION!!!
		echo '<script type="text/javascript"> alert("Cannot load server settings: '. $settingsresult->error. '")';
		throw new Exception ("Cannot load server settings: ". $settingslink->error);
	} else {
		return $settingsresult;
	}
}

function loaddepts($deptslink) {
	$deptsquery = "SELECT dept_id FROM dept
				   WHERE dept_id > 0";
	$deptsquery = $deptslink->query($deptsquery);
	if (!deptssresult) {
		// FAULTY CONNECTION!!! EXCEPTION!!!
		echo '<script type="text/javascript"> alert("Cannot load departments: '. $settingsresult->error. '")';
		throw new Exception ("Cannot load departments: ". $settingslink->error);
	} else {
		return $deptsresult;
	}
}
?>
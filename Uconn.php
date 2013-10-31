<?php
// Global variables
	$server = "10.0.3.19";
	$user = "uconn";
	$pass = "nShyN4QEvuN5csat";
	$database = "lh";

function ulink($s, $u, $p, $d) {
	/*
	 * Open an Unprivileged connection to MySQL server
	 * Parameters stands for server, username, password and database respectively
	 */
	$uconn = mysqli_connect($s, $u, $p, $d);
 
	if (mysqli_connect_errno($con)) {
		<script language='javascript'> alert("无法连接到数据库: ". mysqli_connect_error()); </script>
	} else {
		return $uconn;
	}
}
?>
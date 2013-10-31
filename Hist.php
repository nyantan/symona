<?php
include('Uconn.php');

try {
	$newlink = ulink($server, $user, $pass, $database);
} catch (Exception $ex) {
	echo '错误信息：' .$ex->getMessage();
}

$searchdate = date("Y-m-d");	// MySQL type: DATE


while ()
$sqlcurreval = "SELECT FROM WHERE ";	// Current evaluation period SQL
$result = mysqli_query($newlink, $sqlcurreval);
while($record = mysqli_fetch_array($result))
  {
  echo $row['FirstName'] . " " . $row['LastName'];
  echo "<br>";
  } 

$sqlpreveval = 'SELECT FROM WHERE';	// Previous evaluation period SQL

?>
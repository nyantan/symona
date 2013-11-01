<?php
include('Uconn.php');

try {
	$newlink = ulink($server, $user, $pass, $database);
} catch (Exception $ex) {
	echo $ex->getMessage();
}

// Load from loadsettings()
	$loaded = loadsettings($newlink);
	while ($loader = $loaded->fetch_field()) {
		$histyear = $loader->lhconf_year;
		$histy = array(1 => $loader->lhconf_y10,
					   2 => $loader->lhconf_y11,
					   3 => $loader->lhconf_y12);
	}
	$loaded = null;
// END of loadsettings()
// Load from loaddepts()
	$loaded = loaddepts($newlink);
	$count = 1;
	$depts = array();
	while ($loader = $loaded->fetch_field()) {
		$depts[$count] = $loader->dept_name;
	}
	return $depts;
// END of loaddepts()

/*
 * 
 */
function outputeval() {
	echo '<tr align="center">';
	$searchdate = date("Y-m-d");	// MySQL type: DATE
	foreach($histy as &$yearinfo) {
		$loopingyear = $histyear + $i;
		$numofclasses = $yearinfo % 10;
		for($q = 0; q < $numofclasses; q++) {
			$thisclass = ((int) $yearinfo / $numofclasses) + $q;
			echo '<td>'. (string) $loopingyear. '级'. (string) $thisclass. '班'. '</td>'
			$thistotal = 0;
			foreach($depts as &$dept) {
				$sqlthiseval = "SELECT SUM(eval_score) FROM eval
								WHERE eval_effective = '1' AND
								eval_class = ". (string) $loopingyear. (string) $thisclass. "AND
								eval_dept_name = '". (string) $dept. "'";	// Current evaluation period SQL
				$sqlthisreturn = $newlink->query($sqlthiseval);
				$thistotal += $sqlthisreturn->fetch_field()->SUM(eval_score);
				echo '<td>'. (string) $sqlthisreturn->fetch_field()->SUM(eval_score). '</td>';
			}
			echo '<td>'. (string) $thistotal. '</td>';
			echo '</tr>\n'
		}
	}
}

//$sqlpreveval = 'SELECT FROM WHERE';	// Previous evaluation period SQL

?>
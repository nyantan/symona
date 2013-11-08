<?php
/*
 * Unpriviledged MySQL server connection
 *
 * @Author: Yi Zhang
 * @Email:  sakane@live.cn
 * 
 * @Version:  2013-11-06
 *
 */

// Global variables
  $server = '10.0.3.19';
  $user = 'uconn';
  $pass = 'nShyN4QEvuN5csat';
  $database = 'lh';
  $settings = 'lhconf';

  $histyear = 0;
  $histgrade = array();
  $depts = array();

function ulink() {
  global $server, $user, $pass, $database;
  $newconn = new mysqli($server, $user, $pass, $database);

  if ($newconn->connect_errno) {
    echo "<script type=\"text/javascript\"> alert(\"Cannot contact database: {$newconn->connect_error}\");<script>";
    return false;
  } else {
    return $newconn;
  }
}

function loadsettings ($l) {
  global $histyear, $histgrade;

  $query = "SELECT lhconf_year, lhconf_y10, lhconf_y11, lhconf_y12
	          FROM lhconf
	          WHERE lhconf_profile = 'INUSE'";
  $reply = $l->query($query);

  if (!$reply) {
    echo "<script type=\"text/javascript\"> alert(\"Cannot load settings: {$reply->error}\");</script>";
    return false;
  }

  $loader = $reply->fetch_array();
  $histyear = $loader[0];
  array_push($histgrade, $loader[1], $loader[2], $loader[3]);
}

function loaddepts ($l) {
  global $depts;

  $query = "SELECT dept_id
	          FROM dept
	          WHERE dept_id > 0";
  $reply = $l->query($query);

  if (!$reply) {
    echo "<script type=\"text/javascript\"> alert(\"Cannot load departments: {$reply->error}\");</script>";
    return false;
  }

  /* Notice:
   * Departments are sequenced according to the layout of table
   * If the sequence of departments appears differently from the record in database
   * Wrong subtotals may be assigned.
   */              
  while ($loader = $reply->fetch_array()) {
    array_push($depts, $loader[0]);
  }
}

function printthiseval () {
  global $histyear, $histgrade, $depts;

  // Define a grade counter;
  $gradecount = 0;
  foreach ($histgrade as &$gradeinfo) {
    $loopingyear = $histyear - $gradecount;
    $numofclasses = $gradeinfo % 10;

    for ($q = 0; $q < $numofclasses; $q++) {
      $thisclass = ($gradeinfo - $numofclasses) / 10 + $q;
      $fullclassstr = $loopingyear. $thisclass; // XXX:
      // First column: Grade and Class
      echo "\t<tr align=\"center\"><td>{$loopingyear}级{$thisclass}班</td>";
    
      $thistotal = 0;
      foreach($depts as &$dept) {  
        $depttotal = 0;  
        $sqlthiseval = "SELECT SUM(eval_score) FROM eval
                        WHERE eval_effective = '1' AND
                        eval_class = '{$fullclassstr}' AND
                        eval_dept_id = '{$dept}'";

        $sqlthisreturn = ulink()->query($sqlthiseval);
        $depttotal = $sqlthisreturn->fetch_array();
        $thistotal += $depttotal[0];
        // Second to the last but one columns, for each departments
        echo "<td>{$depttotal[0]}</td>";
      }

      // Last column, class total
      echo "<td>{$thistotal}</td></tr>\n";
    }

    $gradecount++;
  }
}

?>
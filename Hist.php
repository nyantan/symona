<?php
/*
 * Tab: Show history
 *
 * @Author: Yi Zhang
 * @Email:  sakane@live.cn
 * 
 * @Version:  2013-11-06
 *
 */

include('Uconn.php');

try {
  $newlink = ulink();
} catch (Exception $ex) {
  // TBD: Echo a frame of error message;
  // echo $ex->getMessage();
}

// Load settings
  $loader = loadsettings($newlink)->fetch_field();
  // TBD: $histyear indicates the entry year of y10
  $histyear = $loader->lhconf_year;
  $histgrade = array(1 => $loader->lhconf_y10
                     2 => $loader->lhconf_y11
                     3 => $loader->lhconf_y12);
// Settings loaded

// Load departments
  $result = loaddepts($newlink);
  $count = 1;
  $depts = array();

  /* Notice:
   * Departments are sequenced according to the layout of table
   * If the sequence of departments appears differently from the record in database
   * Wrong subtotal will be assigned.
   */

  while ($loader = $result->fetch_field()) {
    $depts[$count] = $loader->dept_name;
  }
// Departments loaded

function printthiseval() {
  echo '<tr align="center">';

  // Define a grade counter;
  $gradecount = 0;

  foreach ($histgrade as &$gradeinfo) {
    $loopingyear = $histyear - $gradecount;
    $numofclasses = $gradeinfo % 10;

    for ($q = 0; $q < $numofclasses; $q++) {
      $thisclass = ($gradeinfo - $numofclasses) / 10 + $q;

      // First column: Grade and Class
      echo '<td>Grade '.  (string) $loopingyear. ' Class '. (string) $thisclass. '</td>';

      $thistotal = 0;
      foreach($depts as &$dept) {
        // Select SUM(eval_score), less php loops
        $sqlthiseval = 'SELECT SUM(eval_score) FROM eval
        		WHERE eval_effective = \'1\' AND
        		eval_class = \'. (string) $loopingyear. (string) $thisclass. ' AND
        		eval_dept_name = \''. (string) $dept. '\'';

        $sqlthisreturn = $newlink->query($sqlthiseval);
        $depttotal = $sqlthisreturn->fetch_field()->SUM(eval_score);
        $thistotal += $depttotal;

        // Second to the last but one columns, for each departments
        echo '<td>'. (string) $depttotal. '</td>';
      }

      // Last column, class total
      echo '<td>'. (string) $thistotal. '</td></tr>\n';
    }

    $gradecount++;
  }
}

function printpreveval() {
  // To be filled out.
}

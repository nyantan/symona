<?php
/*
 * hitokoto.us api fetcher
 * 
 */

$source = 'http://api.hitokoto.us/rand?&charset=utf-8';

function htkt_parse() {
	global $source;
	$infoarr = array();
	$raw = file_get_contents($source);
	$startpos = 0; $endpos = 0;

	// Get hitokoto
	$startpos = (strpos($raw, ':') + 2);
	$endpos = (strpos(substr($raw, $startpos), ',') - 1);
	$str = substr($raw, $startpos, $endpos);
	array_push($infoarr, $str);

	// Get hitokoto id
	$startpos = (strrpos($raw, ':') + 1);
	$endpos = (strpos(substr($raw, $startpos), '}'));
	$str = substr($raw, $startpos, $endpos);
	array_push($infoarr, $str);

	return $infoarr;
}

function htkt_write($arr) {
	echo "<span class='htkt' title='hitokoto.us - ヒトコト' target='_blank'><a href=\"http://hitokoto.us/view/{$arr[1]}\">{$arr[0]}</a></span>";
}
?>
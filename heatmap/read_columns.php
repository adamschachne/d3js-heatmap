<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$time_start = microtime_float();


if (($expr = fopen('/home/sahoo/test/jsto-colon-expr.txt',"r")) !== FALSE) {
	// seek to the correct line
	if (($data = fgetcsv($expr, 10000, "\t")) !== FALSE) {
		echo json_encode(array_slice($data,2)); // take off ProbeID and name
		fclose($expr);
	}
}
else {
	echo "-1";
}
$time_end = microtime_float();
$time = $time_end - $time_start;

//echo "\noperation took $time seconds\n";

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
?>

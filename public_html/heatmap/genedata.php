<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$q = urldecode($_GET['q']); // query
$time_start = microtime_float();
$seek = 0;

if (($handle = fopen('/home/sahoo/test/jsto-colon-idx.txt',"r")) !== FALSE) {
	$found = false;
	while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) { //read 100 rows at max
		$num = count($data);
		if ($data[0] == $q) {
			$seek = $data[1]; // got the gene ptr
			$found = true;
			break;
		}
	}
	fclose($handle);
	if ($found == false) {
		echo "-1";
		//echo "could not find geneID: $q";
	}
	else {
		if (($expr = fopen('/home/sahoo/test/jsto-colon-expr.txt',"r")) !== FALSE) {
			// seek to the correct line
			fseek($expr, $seek);
			if (($data = fgetcsv($expr, 10000, "\t")) !== FALSE) {
				echo json_encode(array_slice($data,2));
				fclose($expr);
			}
		}
		else {
			echo "-1";
			//echo "error getting gene data: $q";
		}
	}

}
else {
	echo "-1";
	//echo "failed to load";
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

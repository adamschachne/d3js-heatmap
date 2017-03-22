<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$row = 0;
$output = array();
if (($handle = fopen('/home/sahoo/test/jsto-colon-idx.txt',"r")) !== FALSE) {
	while (($data = fgetcsv($handle, 10000, "\t")) !== FALSE) { //read 100 rows at max
		$num = count($data);
		if ($row == 0) {
			// do nothing for first row or less than target row
		}
		else {
			//echo "<li><a>".$data[$c]."</a></li>";
			//echo "<option data-tokens=\"".$data[0]."\">".$data[0]."</option>";
			$output[] = $data[0];
		}
		$row++;
	}
	fclose($handle);
	echo json_encode($output);
}
else {
	echo "failed to load data: " . $datasets[$q];
}
?>

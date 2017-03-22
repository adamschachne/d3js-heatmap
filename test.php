<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$row = 1;
$output = array();
if (($handle = fopen('/home/sahoo/test/jsto-colon-idx.txt',"r")) !== FALSE) {
	while (($data = fgetcsv($handle, 10000, "\t")) !== FALSE) {
		$num = count($data);
		//echo <option data-tokens="mustard">Burger, Shake and a Smile</option>
		//for ($c = 0; $c < $num; $c++) {
			if ($row == 1) {
				// do nothing for first row
			}
			else {
				//echo "<li><a>".$data[$c]."</a></li>";
				//echo "<option data-tokens=\"".$data[0]."\">".$data[0]."</option>";
				$output[] = $data[0];
			}
		//}
		$row++;
	}
	fclose($handle);
	echo json_encode($output);
}
else {
	echo "failed to load data: " . $datasets[$q];
}
?>

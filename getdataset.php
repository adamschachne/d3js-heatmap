<style>
	table {
	    width: 100%;
	    border-collapse: collapse;
	}

	table, td, th {
	    border: 1px solid black;
	    padding: 5px;
	}

	th {
		text-align: left;
	}
</style>

<?php
$datasets = array(
	"", //0
	"loboda-2011-colon-expr.txt", //1
	"loboda-2011-colon-idx.txt", //2
	"loboda-2011-colon-ih.txt", //3
	"loboda-2011-colon-survival.txt" //4
);

$q = intval($_GET['q']);
$row = 1;
if (($handle = fopen('../data/'.$datasets[$q],"r")) !== FALSE) {
	echo "<table>";
	while (($data = fgetcsv($handle, 2000, "\t")) !== FALSE && $row <= 10) {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
		echo "<tr>";
        for ($c = 0; $c < $num; $c++) {
			if ($row == 1) {
				echo "<th>".$data[$c]."</th>";
			}
			else {
				echo "<td>".$data[$c]."</td>";
			}
        }
		echo "</tr>";
		$row++;
    }
    fclose($handle);
}
else {
	echo "failed to load data: " . $datasets[$q];
}
?>

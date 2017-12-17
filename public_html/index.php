<!doctype html>
<html>

<head>
	<!-- <script src="jquery-3.1.1.min.js"></script> -->
	<style>
		td {
			width: auto;
			padding-right: 30px;
		}
		th {
			text-align: center;
		}
	</style>

	<body>
		<h1 style="margin-top: 2px;">Adam Schachne</h1>
		<table> <tbody>
			<tr>
				<th>Page</th>
				<th>Date Modified</th>
				<th>Description</th>
			</tr>
			<tr><th colspan="10"><hr></th></tr>
      <tr>
				<td><a href="./login.php" style="font-size: 16px">login page</a></td>
				<td>
					<?php
						$filename = "./login.php";
						if (file_exists($filename)) {
							echo date("F d Y H:i:s.", filemtime($filename));
						}
						else {
							echo "couldnt find file";
						}
					?>
				</td>
				<td>
					template login system
				</td>
			</tr>
			<tr>
				<td><a href="./heatmap/" style="font-size: 16px">heatmap</a></td>
				<td>
					<?php
						$filename = "./heatmap/index.html";
						if (file_exists($filename)) {
							echo date("F d Y H:i:s.", filemtime($filename));
						}
						else {
							echo "couldnt find file";
						}
					?>
				</td>
				<td>
					concept for a 2D heatmap with Bootstrap
				</td>
			</tr>
			<tr>
				<td><a href="./test/color_scale_v2.html" style="font-size: 16px">color scale with pivots</a></td>
				<td>
					<?php
						$filename = "./test/color_scale_v2.html";
						if (file_exists($filename)) {
							echo date("F d Y H:i:s.", filemtime($filename));
						}
						else {
							echo "couldnt find file";
						}
					?>
				</td>
			</tr>
			<tr>
				<td><a href="./test/color_scale.html" style="font-size: 16px">color scale</a></td>
				<td>
					<?php
						$filename = "./test/color_scale.html";
						if (file_exists($filename)) {
							echo date("F d Y H:i:s.", filemtime($filename));
						}
						else {
							echo "couldnt find file";
						}
					?>
				</td>
			</tr>
			<tr>
				<td><a href="./test/svg_path.html" style="font-size: 16px">svg paths</a></td>
				<td>
					<?php
						$filename = "./test/svg_path.html";
						if (file_exists($filename)) {
							echo date("F d Y H:i:s.", filemtime($filename));
						}
						else {
							echo "couldnt find file";
						}
					?>
				</td>
			</tr>
			<tr>
				<td><a href="./test/ajaxtest.html" style="font-size: 16px">ajax test</a></td>
				<td>
					<?php
						$filename = "./test/ajaxtest.html";
						if (file_exists($filename)) {
							echo date("F d Y H:i:s.", filemtime($filename));
						}
						else {
							echo "couldnt find file";
						}
					?>
				</td>
				<td style="max-width: 350px;"></td>
			</tr>
			<tr>
				<td><a href="./test/enter_exit.html" style="font-size: 16px">enter/exit test</a></td>
				<td>
					<?php
						$filename = "./test/enter_exit.html";
						if (file_exists($filename)) {
							echo date("F d Y H:i:s.", filemtime($filename));
						}
						else {
							echo "couldnt find file";
						}
					?>
				</td>
			</tr>
			<tr><th colspan="10"><hr></th></tr>
		</tbody> </table>
		This page was last modified on <?php echo date("F d Y H:i:s.", filemtime("./index.php"));?>
	</body>

</head>

</html>

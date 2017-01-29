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
				<td><a href="./d3/color_scale_v2.html" style="font-size: 16px">color scale with pivots</a></td>
				<td>
					<?php
						$filename = "./d3/color_scale_v2.html";
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
				<td><a href="./d3/color_scale.html" style="font-size: 16px">color scale</a></td>
				<td>
					<?php
						$filename = "./d3/color_scale.html";
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
				<td><a href="./d3/svg_path.html" style="font-size: 16px">svg paths</a></td>
				<td>
					<?php
						$filename = "./d3/svg_path.html";
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
				<td><a href="./ajaxtest.html" style="font-size: 16px">ajax test</a></td>
				<td>
					<?php
						$filename = "./ajaxtest.html";
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
				<td><a href="./d3/enter_exit.html" style="font-size: 16px">enter/exit test</a></td>
				<td>
					<?php
						$filename = "./d3/enter_exit.html";
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

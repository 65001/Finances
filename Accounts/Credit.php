<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<title>Credit Usage</title>
		<script>
			$(document).ready(function() { $("#Credit").DataTable(); });
		</script>
	</head>
	<body>
	
		<table id="Credit">
			<thead>
				<tr>
					<td id="Main" colspan="9">Credit</td>
				</tr>
				<tr>
					<th>ID</th>
					<th>Institution</th>
					<th>Status</th>
					<th>Created</th>
					<th>Closed</th>
					<th>Category</th>
					
					<th>Current Balance</th>
					<th>Maximum</th>
					<th>Usage</th>
				</tr>
			</thead>
			<tbody>
				<?php			
					print "\n";
					print Table(Query("SELECT * FROM [Credit View]"),array("ID","Institution","Status","Created","Closed","Category","Current Balance","Maximum","Percentage Used"));
				?>
			</tbody>
		</table>
		<br>
	</body>
</html>
<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<title>My Inactive Accounts</title>
		
		<script>
			$(document).ready(function() { $("#Inactive").DataTable(); });
		</script>
	</head>
	<body>
	
		
		
		<table id="Inactive">
			<thead>
				<tr>
					<td id="Main" colspan="5">My Inactive Accounts</td>
				</tr>
				<tr>
					<th>ID</th>
					<th>Person</th>
					<th>Created</th>
					<th>Closed</th>
					<th>Category</th>
				</tr>
			</thead>
			<tbody>
				<?php			
					print "\n";
					print Table(Query("SELECT * FROM [My Inactive Accounts]"),array("ID","Person","Created","Closed","Category"));			
				?>
			</tbody>
		</table>
		<br>
	</body>
</html>
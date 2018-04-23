<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<title>All Accounts</title>
		<script>
			$(document).ready(function() { $("#AllAccounts").DataTable({"iDisplayLength": 100}); });
		</script>
	</head>
	<body>
	

		<table id="AllAccounts">
			<thead>
				<tr>
					<td id="Main" colspan="4">Accounts</td>
				</tr>
				<tr>
					<th>ID</th>
					<th>Institution</th>
					<th>Status</th>
					<th>Category</th>
				</tr>
			</thead>
			<tbody>
				<?php			
					print "\n";
					print Table(Query("SELECT * FROM [Accounts View]"),array("ID","Person","Status","Category"));					
				?>
			</tbody>
		</table>
		<br>
		<button>Add an Account</button>
	</body>
</html>
<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<title>My Accounts</title>
		<script>
			$(document).ready(function() { $("#Balance").DataTable(); });
		</script>
	</head>
	<body>
		<table id="Balance">
			<thead>
				<tr>
					<td id="Main" colspan="2">Balance Summary</td>
				</tr>
				<tr>
					<th>Account</th>
					<th>Balance</th>
				</tr>
			</thead>
			<tbody>
				<?php		
					print "\n";
					print Table(Query("SELECT * FROM Balance"),array("Account","Money"));			
				?>
			</tbody>
		</table>
		<br>
	</body>
</html>
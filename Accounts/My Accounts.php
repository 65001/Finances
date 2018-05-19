<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<title>My Accounts</title>
		<script>
			$(document).ready(function() { $("#MyAccounts").DataTable(); });
		</script>
	</head>
	<body>
	

		<table id="MyAccounts">
			<thead>
				<tr>
					<td id="Main" colspan="5">My Accounts</td>
				</tr>
				<tr>
					<th>ID</th>
					<th>Institution</th>
					<th>Status</th>
					<th>Category</th>
					<th>Balance</th>
				</tr>
			</thead>
			<tbody>
				<?php			
					print "\n";
					print Table(Query("SELECT ID,Person,Status,Category,printf(\"%.2f\",Balance) AS 'Balance' FROM [My Accounts]"),array("ID","Person","Status","Category","Balance"));			
				?>

			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" style="text-align:left">Total:</td>
					<td><?php print Query("Select SUM(Balance) AS 'Balance' From [My Accounts]")->fetch(PDO::FETCH_ASSOC)["Balance"]?></td>
				</tr>
        	</tfoot>
		</table>
		<br>
		<button onclick="location.href ='form.php';">Add an Account</button>
	</body>
</html>
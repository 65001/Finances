<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<title>Transactions</title>
		
		<script>
			$(document).ready(function() { $("#Transact").DataTable({"iDisplayLength": 100});});
		</script>
	</head>
	<body>
	
		<table id="Transact">
			<thead>
				<tr>
					<td id="Main" colspan="5">Transactions</td>
				</tr>
				<tr>
					<th>Date</th>
					<th>From</th>
					<th>To</th>
					<th>Amount</th>
					<th>Memo</th>
				</tr>
			</thead>
			<tbody>
				<?php			
					print "\n";
					print Table(Query("SELECT Date,\"From\",\"To\",printf(\"%.2f\",Amount) AS 'Amount',Memo FROM [Transactions View]"),array("Date","From","To","Amount","Memo"));				
				?>
			</tbody>
		</table>
		<br>
		
		<a href="Form.php">
			<button>Add Transaction</button>
		</a>
	</body>
</html>
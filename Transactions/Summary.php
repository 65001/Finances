<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<title>Transactions</title>
		
		<script>
			$(document).ready(function() { $("#Summary").DataTable({"iDisplayLength": 100}); });
		</script>
	</head>
	<body>
	
		<table id="Summary">
			<thead>
				<tr>
					<td id="Main" colspan="5">Summary</td>
				</tr>
				<tr>
					<th>From</th>
					<th>To</th>
					<th>Amount</th>
					<th># Transactions</th>
					<th>Avg Amount</th>
				</tr>
			</thead>
			<tbody>
				<?php			
					$result = Query("SELECT \"From\",\"To\",printf(\"%.2f\",Money) AS 'Money',\"Number of Transactions\",printf(\"%.2f\",round(Money/\"Number of Transactions\",2)) AS 'AVG' FROM [Transactions Summary]");
					print "\n";
					print Table($result,array('From',"To","Money","Number of Transactions","AVG"));			
				?>
			</tbody>
		</table>
		<br>
		
		<button>Add Transaction</button>
	</body>
</html>
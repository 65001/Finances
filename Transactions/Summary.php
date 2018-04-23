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
					$result = Query("SELECT * FROM [Transactions Summary]");
					print "\n";
					foreach($result as $row)
					{
						print Tab(4)."<tr>\n";
						print Tab(5)."<td>".$row['From']."</td>\n";
						print Tab(5)."<td>".$row['To']."</td>\n";
						print Tab(5)."<td>".$row['Money']."</td>\n";
						print Tab(5)."<td>".$row['Number of Transactions']."</td>\n";
						print Tab(5)."<td>".round( $row['Money'] / $row['Number of Transactions'],2)."</td>\n";
						print Tab(4)."</tr>\n";
					}				
				?>
				
		</table>
		<br>
		
		<button>Add Transaction</button>
	</body>
</html>
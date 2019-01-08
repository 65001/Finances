<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<title>Transactions</title>
		
		<script>
			$(document).ready(function() { $("#Transact").DataTable(
				{"iDisplayLength": 100,"columnDefs": [
    				{ "orderable": false, "targets": 0 }
  					]});});
		</script>
	</head>
	<body>
		<div class = "w3-bar w3-dark-gray"> 
			<a class = "w3-bar-item w3-button records" href="Transactions.php"> 
				Entire History
			</a>

			<a class = "w3-bar-item w3-button records" href = "TLY">
				Last Year
			</a>

			<a class = "w3-bar-item w3-button records" href = "TTY">
				This Year
			</a>

			<a class = "w3-bar-item w3-button records" href = "TLM">
				Last Month
			</a>

			<a class = "w3-bar-item w3-button records w3-green" href = "TTM">
				This Month
			</a>
		</div>
		
		<br>
		<table id="Transact">
			<?php			
				print "\n";
				print Table(Query("SELECT ID,Date,\"From\",\"To\",printf(\"%.2f\",Amount) AS 'Amount',Memo 
					FROM [This Months Transactions] ORDER BY DATE DESC"),array("Date","From","To","Amount","Memo"),"Transactions",true);				
			?>
		</table>
		<br>
		
		<a href="Form.php">
			<button>Add Transaction</button>
		</a>
	</body>
</html>
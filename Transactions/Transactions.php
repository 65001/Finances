<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<title>Transactions</title>
		
		<script>
			$(document).ready(function() { $("#Transact").DataTable(
				{"iDisplayLength": 100,"columnDefs": [
    				{ "orderable": false, "targets": 0 }
  					]});});
		</script>
	</head>
	<body>
	
		<table id="Transact">
			<?php			
				print "\n";
				print Table(Query("SELECT ID,Date,\"From\",\"To\",printf(\"%.2f\",Amount) AS 'Amount',Memo FROM [Transactions View] ORDER BY DATE DESC"),array("Date","From","To","Amount","Memo"),"Transactions",true);				
			?>
		</table>
		<br>
		
		<a href="Form.php">
			<button>Add Transaction</button>
		</a>
	</body>
</html>
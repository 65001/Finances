<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<title>Transactions</title>
		
		<script>
			$(document).ready(function() { $("#Summary").DataTable({"iDisplayLength": 100}); });
		</script>
	</head>
	<body>
	
		<table id="Summary">
			<?php			
				$result = Query("SELECT \"From\",\"To\",printf(\"%.2f\",Money) AS 'Money',\"Number of Transactions\",printf(\"%.2f\",round(Money/\"Number of Transactions\",2)) AS 'AVG' FROM [Transactions Summary]");
				print "\n";
				print Table($result,array('From',"To","Money","Number of Transactions","AVG"),"Summary");			
			?>
		</table>
		<br>
		
		<button>Add Transaction</button>
	</body>
</html>
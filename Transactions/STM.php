<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<title>Transaction Summaries</title>
		
		<script>
			$(document).ready(function() { $("#records").DataTable({"iDisplayLength": 100}); });
		</script>
	</head>

	<body>
		<div class = "w3-bar w3-dark-gray"> 
			<a class = "w3-bar-item w3-button records" href = "Summary"> 
				Entire History
			</a>

			<a class = "w3-bar-item w3-button records"  href = "SLY">
				Last Year
			</a>

			<a class = "w3-bar-item w3-button records"  href = "STY">
				This Year
			</a>

			<a class = "w3-bar-item w3-button records"  href = "SLM">
				Last Month
			</a>

			<a class = "w3-bar-item w3-button records  w3-green"  href = "STM">
				This Month
			</a>
		</div>

		<br>
		<table id = "records">
			<?php			
				$result = Query("SELECT \"From\",\"To\",printf(\"%.2f\",Money) AS 'Money',\"Number of Transactions\",printf(\"%.2f\",round(Money/\"Number of Transactions\",2)) AS 'AVG' 
                    FROM [Months Transactions Summary]");
				print "\n";
				print Table($result,array('From',"To","Money","Number of Transactions","AVG"),"Summary");	
			?>
		</table>

		<br>
		<a href="Form.php">
			<button>Add Transaction</button>
		</a>
	</body>
</html>
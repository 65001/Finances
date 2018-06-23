<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<title>My Inactive Accounts</title>
		
		<script>
			$(document).ready(function() { $("#Inactive").DataTable(); });
		</script>
	</head>
	<body>
	
		
		
		<table id="Inactive">
				<?php			
					print "\n";
					print Table(Query("SELECT * FROM [My Inactive Accounts]"),array("ID","Person","Created","Closed","Category"),"My Inactive Accounts");			
				?>
		</table>
		<br>
	</body>
</html>
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
				<?php		
					print "\n";
					print Table(Query("SELECT Account,printf(\"%.2f\",round(Money,2)) AS 'Balance' FROM Balance"),array("Account","Balance"),"Balance Summary");			
				?>
		</table>
		<br>
	</body>
</html>
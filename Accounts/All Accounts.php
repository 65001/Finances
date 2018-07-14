<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<title>All Accounts</title>
		<script>
			$(document).ready(function() { $("#AllAccounts").DataTable({"iDisplayLength": 100}); });
		</script>
	</head>
	<body>
		<table id="AllAccounts">
				<?php			
					print "\n";
					print Table(Query("SELECT * FROM [Accounts View]"),array("ID","Person","Status","Category"),"Accounts");					
				?>
		</table>
		<br>
		<button onclick="location.href ='form.php';">Add an Account</button>
	</body>
</html>
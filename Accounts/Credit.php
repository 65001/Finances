<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<title>Credit Usage</title>
		<script>
			$(document).ready(function() { $("#Credit").DataTable(); });
		</script>
	</head>
	<body>
	
		<table id="Credit">
			<?php			
				print "\n";
				print Table(Query("SELECT * FROM [Credit View]"),array("ID","Institution","Status","Created","Closed","Category","Current Balance","Maximum","Percentage Used"),"Credit");
			?>
		</table>
		<br>
	</body>
</html>
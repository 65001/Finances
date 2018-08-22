<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<title>People</title>
		<script>
			$(document).ready(function() { $("#People").DataTable({"iDisplayLength": 100}); });
		</script>
	</head>
	<body>
	
		<table id="People">
			<thead>
				<tr>
					<td id="Main" colspan="4">People</td>
				</tr>
				<tr>
					<th>ID</th>
					<th>Person</th>
					<th>Phone</th>
					<th>Email</th>
				</tr>
			</thead>
			<?php			
				$result = Query("SELECT * FROM Persons");
				print "\n";
				foreach($result as $row)
				{
					print Tab(4)."<tr>\n";
					print Tab(5)."<td>".$row['ID']."</td>\n";
					print Tab(5)."<td>".$row['Person']."</td>\n";
					print Tab(5)."<td><a href=\"tel:".$row['Phone']."\">".$row['Phone']."</a></td>\n";
					print Tab(5)."<td>".$row['Email']."</td>\n";
					print Tab(4)."</tr>\n";
				}				
			?>
		</table>
		<br>
		
		<button onclick="location.href ='form.php';">Add Person</button>
		</a>
	</body>
</html>
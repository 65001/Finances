<html>
	<head>
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<link rel="stylesheet" type="text/css" href="..\form.css">
		<title>Add a Person</title>
	</head>

	<?php
		include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
	?>
	
	<body>
		<div>
			<form method="post" action="post.php">
				<span class="entry">
					Name:<br> 
					<input type="text" name="Name"/> 
				</span>
				
				<span class="entry">
					Phone:<br>
					<input type="tel" name="Phone"/>
				</span>
				
				<span class="entry">
					Email:<br>
					<input type="email" name="Email"/> 
				</span>
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>
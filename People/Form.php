<html>
	<head>
		<title>Add a Person</title>
	</head>

	<?php
		include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
	?>
	
	<body>
		<div>
			<h1>Add Person</h1>
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
<head>
    <head>
        <title>Add a Person</title>
	</head>

	<?php
		include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
	?>

    <body>
        <div>
            <h1>Add a Category</h1>
            <form method="post" action="post.php">
                <span class = "entry">
                    Category: <br>
                    <input type="text" name="Type"/>
                </span>

                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
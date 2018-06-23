<html>
	<head>
		<?php 
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<link rel="stylesheet" type="text/css" href="..\form.css">
		<title>Add an Account</title>
	</head>

    <body>
		<h1>Add an Account</h1>
        <script>
			$(document).ready(function() {
				$('.js-example-basic-single').select2();
			});
		</script>

        <div>
            <form method="post" action="post.php">
                <span class="entry">
					Person:<br>
					<select required id="Person" name="Person" class="js-example-basic-single">
						<?php
							echo GetPersons();
						?>
					</select>	
                </span>

				<span class="entry">
					Category:<br>
					<select required id="Type" name="Type" class="js-example-basic-single">
						<?php
							echo GetCategories();
						?>
					</select>	
				</span>
				<input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
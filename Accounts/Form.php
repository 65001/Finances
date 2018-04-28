<html>
	<head>
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<link rel="stylesheet" type="text/css" href="..\form.css">
		<title>Add an Account</title>

				
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" type="text/javascript"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
	</head>

    <?php
		include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."code.php");
	?>

    <body>
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
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<link rel="stylesheet" type="text/css" href="..\form.css">
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" type="text/javascript">
		</script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
		<title>Add a Transaction</title>
		<script>
			$(document).ready(function() { 
					$(".js-example-basic-single").select2(); 
			});
		</script>
	</head>

	<!-- 
		Look into js form validation before posting...
	-->
	<body>
		<script>
			$(document).ready(function() {
				$('.js-example-basic-single').select2();
			});
		</script>
		
		<?php
			$path = dirname(__DIR__).DIRECTORY_SEPARATOR."Datalists".DIRECTORY_SEPARATOR."Accounts.php";
			include($path);
		?>
		
		<div>
			<form method="post" action="post.php">
				<span class="entry">
					<label>Date:</label>
					<input required type="date" name="Date" id="Date"/> 
				</span>
		
				<span class="entry">
					<label>From:</label> 
					<select required id="From" name="From" class="js-example-basic-single">
						<?php
							echo GetAccounts();
						?>
					</select>					
				</span>
				
				<span class="entry">
					<label>To:</label> 
					<select required id="To" name="To" class="js-example-basic-single">
						<?php
							echo GetAccounts();
						?>
					</select>
				</span>
				
				<span class="entry">
					<label>Amount:</label> 
					<input required type="number" step="0.01" name="Amount"/> 
				</span>
				
				<span class="entry">
					<label>Memo:</label> 
					<select id="Memo" name="Memo"  class="js-example-basic-single"/> 
						<?php
							echo GetMemos();
						?>
					</select>
				</span>
				
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>
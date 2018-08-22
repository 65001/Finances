<html>
	<?php 
		include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
	?>
	<head>
		
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
		<h1>Add a Transaction</h1>
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
					<?php
							echo GetMemos();
					?>
					<input id="Memo" name="Memo"  list="Memos"/>
				</span>
				
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>
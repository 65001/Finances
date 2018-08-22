<html>
	<?php 
        include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
        $ID = $_POST["ID"];
        $results = Query("Select * From Transactions Where ID =".$ID.";")->fetchall();
        $results = $results[0];
        $Date = $results["Date"];
        $Date = substr($Date,0,4)."-".substr($Date,4,2)."-".substr($Date,6,2);
        $From = $results["From"];
        $To = $results["To"];
        $Amount = $results["Amount"];
        $Memo = $results["Memo"];
        ?>

	<head>
		
		<title>Update a Transaction</title>
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
		<h1>Update a Transaction</h1>
		<div>
			<form method="post" action="Update.php">
                <span class="entry" style="display:none">
                    <label>ID:</label>
                    <input readonly id="ID" name = "ID" value="<?php echo $ID;?>"/>
                </span>

				<span class="entry">
					<label>Date:</label>
					<input required type="date" name="Date" id="Date" value="<?php echo $Date;?>"/> 
				</span>
		
				<span class="entry">
					<label>From:</label> 
					<select required id="From" name="From" class="js-example-basic-single">
						<?php
							echo GetAccounts($From);
						?>
					</select>					
				</span>
				
				<span class="entry">
					<label>To:</label> 
					<select required id="To" name="To" class="js-example-basic-single">
						<?php
							echo GetAccounts($To);
						?>
					</select>
				</span>
				
				<span class="entry">
					<label>Amount:</label> 
					<input required type="number" step="0.01" name="Amount" value="<?php echo $Amount;?>"/> 
				</span>
				
				<span class="entry">
					<label>Memo:</label> 
					<?php
							echo GetMemos();
					?>
					<input id="Memo" name="Memo"  list="Memos" value="<?php echo $Memo; ?>"/>
				</span>
				
				<input type="submit" value="Update">
			</form>
		</div>
	</body>
</html>
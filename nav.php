<?php
	include("code.php");
?>
		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
		<div class="navbar">
			<div class="dropdown">
				<a href=<?php echo Wrap(Finances()); ?>>
					<img src="https://image.flaticon.com/icons/svg/263/263115.svg" width="30" height="20">
				</a>	
			</div>
			<div class="dropdown">
				 <button class="dropbtn">Accounts 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href=<?php echo Wrap(Accounts()."My Accounts"); ?>>My Accounts</a>
					<a href=<?php echo Wrap(Accounts()."My Inactive Accounts"); ?>>My Inactive Accounts</a>
					<a href=<?php echo Wrap(Accounts()."All Accounts"); ?>>All Accounts</a>
					<a href=<?php echo Wrap(Accounts()."Balance"); ?>>Balance Summary</a>
					<a href=<?php echo Wrap(Accounts()."Credit"); ?>>Credit Usage</a>
				</div>
			</div>
			
			<div class="dropdown">
			    <button class="dropbtn">Transactions 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href=<?php echo Wrap(Transactions()."Transactions"); ?>>All Transactions</a>
					<a href=<?php echo Wrap(Transactions()."Summary"); ?>>Summary</a>
					<a href=<?php echo Wrap(Transactions()."Form");?>> Add Transaction</a>
				</div>
			</div>
			
			<div class="dropdown">
				<a href=<?php echo Wrap(People()."People"); ?>>People</a>
			</div>
		</div>

		
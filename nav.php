	<?php
		include("code.php");
		echo "\n";
	?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" type="text/javascript"></script>
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" />
		<link rel="stylesheet" type="text/css" href=<?php echo Wrap(Finances()."style.css"); ?>>
		<link rel="stylesheet" type="text/css" href=<?php echo Wrap(Finances()."form.css"); ?>> 
		
		<link rel="manifest" href="/Finances/manifest.json">

		<div class="navbar">
			<div class="dropdown w3-mobile">
				<a href=<?php echo Wrap(Finances()); ?>>
					<i style="font-size:24px" class="fa fa-home fa-fw"></i>
				</a>
			</div>

			<div class="dropdown">
				<button class="dropbtn">Accounts <i class="fa fa-caret-down"></i></button>
				<div class="dropdown-content">
					<a href=<?php echo Wrap(Accounts()."My Accounts"); ?>>My Accounts</a>
					<a href=<?php echo Wrap(Accounts()."My Inactive Accounts"); ?>>My Inactive Accounts</a>
					<a href=<?php echo Wrap(Accounts()."All Accounts"); ?>>All Accounts</a>
					<a href=<?php echo Wrap(Accounts()."Balance"); ?>>Balance Summary</a>
					<a href=<?php echo Wrap(Accounts()."Balance Graph");?>>Balance Graph</a>
					<a href=<?php echo Wrap(Accounts()."Credit"); ?>>Credit Usage</a>
					<a href=<?php echo Wrap(Insurance()."Insurance")?>>Insurance</a>
					<a href=<?php echo Wrap(Accounts()."form"); ?>>Add Account</a>
				</div>
			</div>
			
			<div class="dropdown">
			    <button class="dropbtn">Transactions <i class="fa fa-caret-down"></i></button>
				<div class="dropdown-content">
					<a href=<?php echo Wrap(Transactions()."Transactions"); ?>>All Transactions</a>
					<a href=<?php echo Wrap(Transactions()."Summary"); ?>>Summary</a>
					<a href=<?php echo Wrap(Transactions()."Income and Expense Graph");?>>Income/Expense Graph</a>
					<a href=<?php echo Wrap(Transactions()."Form");?>> Add Transaction</a>
				</div>
			</div>
			
			<div class="dropdown">
				<button class="dropbtn">People <i class="fa fa-caret-down"></i></button>

				<div class="dropdown-content">
					<a href=<?php echo Wrap(People()."People"); ?>>People</a>
					<a href=<?php echo Wrap(People()."Form");?>>Add Person</a>
				</div>
			</div>

			<div class="dropdown w3-mobile">
				<button class="dropbtn">Administration <i class="fa fa-caret-down"></i></button>

				<div class="dropdown-content">
					<a href=<?php echo Wrap(Setup()."setup"); ?>>Status</a>
				</div>
			</div>
		</div>
		<?php 
			echo "\n";
		?>	
	<?php
		include("code.php");
		echo "\n";
	?>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js" charset="utf8" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js" charset="utf8"></script>
		<script type="text/javascript" src=<?php echo Wrap(CSS()."select 2/js/select2.min.js"); ?> charset="utf-8"></script>

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href=<?php echo Wrap(CSS()."select 2/css/select2.min.css"); ?>/>
		<link rel="stylesheet" type="text/css" href=<?php echo Wrap(CSS()."style.css"); ?>>
		<link rel="stylesheet" type="text/css" href=<?php echo Wrap(CSS()."form.css"); ?>> 
		<link rel="stylesheet" type="text/css" href=<?php echo Wrap(CSS()."w3.css"); ?>> 
		
		<link rel="manifest" href="/Finances/manifest.json">

		<div class="w3-bar w3-dark-gray w3-large">
			<a class="w3-bar-item w3-button" href=<?php echo Wrap(Finances()); ?>> <i style="font-size:24px" class="fa fa-home fa-fw"></i></a>

			<div class="w3-dropdown-hover">
				<button class="w3-button">Accounts <i class="fa fa-caret-down"></i></button>
				<div class="w3-dropdown-content w3-bar-block w3-card-4">
					<div class="w3-bar-item w3-button">
						<a class = "w3-button" style = "padding-left:0px;" href=<?php echo Wrap(Accounts()."My Accounts"); ?> rel="preload">My Accounts</a>
						<a class = "w3-right w3-button w3-square w3-light-gray" href=<?php echo Wrap(Accounts()."form"); ?>>+</a>
					</div>

					<a class="w3-bar-item w3-button" href=<?php echo Wrap(Accounts()."My Inactive Accounts"); ?>>My Inactive Accounts</a>
					<a class="w3-bar-item w3-button" href=<?php echo Wrap(Accounts()."All Accounts"); ?>>All Accounts</a>
					<a class="w3-bar-item w3-button" href=<?php echo Wrap(Accounts()."Balance"); ?>>Balance Summary</a>
					<a class="w3-bar-item w3-button" href=<?php echo Wrap(Accounts()."Balance Graph");?>>Balance Graph</a>
					<a class="w3-bar-item w3-button" href=<?php echo Wrap(Accounts()."Credit"); ?>>Credit Usage</a>
					<a class="w3-bar-item w3-button" href=<?php echo Wrap(Insurance()."Insurance")?>>Insurance</a>
				</div>
			</div>
			
			<div class="w3-dropdown-hover">
			    <button class="w3-button">Transactions <i class="fa fa-caret-down"></i></button>
				<div class="w3-dropdown-content w3-bar-block w3-card-4">
					<div class="w3-bar-item w3-button">
						<a class="w3-button" style = "padding-left:0px;" href=<?php echo Wrap(Transactions()."Transactions"); ?>>All Transactions</a>
						<a class = "w3-button w3-square w3-light-gray" href=<?php echo Wrap(Transactions()."Form");?> rel="preload">+</a>
						<!--
						<div class = "w3-right w3-button w3-square w3-dark-gray w3-dropdown"> 
							>
						</div>
						-->
					</div>

					<a class="w3-bar-item w3-button" href=<?php echo Wrap(Transactions()."Summary"); ?>>Summary</a>
					<a class="w3-bar-item w3-button" href=<?php echo Wrap(Transactions()."Income and Expense Graph");?>>Income/Expense Graph</a>
				</div>
			</div>

			<div class = "w3-dropdown-hover">
				<button class="w3-button">Misc <i class="fa fa-caret-down"></i></button>
				<div class="w3-dropdown-content w3-bar-block w3-card-4">
					<div class="w3-bar-item w3-button">
						<a class="w3-button" style = "padding-left:0px;" href=<?php echo Wrap(Category()."Category"); ?>>Categories</a>
						<a class="w3-button w3-right w3-square w3-light-gray" href=<?php echo Wrap(Category()."Form");?>>+</a>
					</div>

					<div class="w3-bar-item w3-button">
						<a class = "w3-button" style = "padding-left:0px;" href=<?php echo Wrap(People()."People"); ?>>People</a>
						<a class = "w3-button w3-right w3-square w3-light-gray" href=<?php echo Wrap(People()."Form") ?>>+</a>
					</div>
					<a class="w3-bar-item w3-button" href=<?php echo Wrap(Setup()."setup"); ?>>Admin Status</a>
				</div>
			</div>
		</div>

		<?php 
			echo "\n";
		?>	
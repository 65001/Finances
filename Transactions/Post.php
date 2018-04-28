<?php
	include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$myPDO = Load();
	
	echo "<br>";
	echo"Date:";

	if(array_key_exists("Date",$_POST) == true){
		echo $_POST["Date"];
		$_POST["Date"] = str_replace("-","",$_POST["Date"]);
	}
	else{
		echo "Nan";
		echo "Failure :(";
		exit;
	}

	echo "<br>";
	echo "From:";
	if(array_key_exists("From",$_POST)){
		echo $_POST["From"];
	}
	else{
		echo "Nan";
		echo "Failure :(";
		exit;
	}

	echo "<br>";
	echo "To:";
	if(array_key_exists("To",$_POST)){
		echo $_POST["To"];
	}
	else{
		echo "Nan";
		echo "Failure :(";
		exit;
	}

	echo "<br>";
	echo "Amount:";
	if(array_key_exists("Amount",$_POST)){
		echo $_POST["Amount"];
	}
	else{
		echo "Nan";
		echo "Failure :(";
		exit;
	}

	echo "<br>";
	echo "Memo:";
	if(array_key_exists("Memo",$_POST)){
		echo $_POST["Memo"];
	}
	else{
		$_POST["Memo"] ="";
	}
	echo"<br>";
	if($statement = $myPDO->prepare("INSERT INTO Transactions (\"Date\",\"From\",\"To\",Amount,Memo) VALUES (?,?,?,?,?)")){
		$statement -> execute(array($_POST["Date"],$_POST["From"],$_POST["To"],$_POST["Amount"],$_POST["Memo"]));
		echo "Success!";
	}
	else
	{
		echo "Failure :(";
	}
?>
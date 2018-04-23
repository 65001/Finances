<link rel="stylesheet" type="text/css" href="..\style.css">
<?php
	include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."code.php");
	
	$path = dirname(__DIR__).DIRECTORY_SEPARATOR."nav.php";
	include($path);
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	$myPDO = Load();

	echo $_POST["Name"]." ".$_POST["Phone"]." ".$_POST["Email"]."\n";
	if($statement = $myPDO->prepare("INSERT INTO Persons (Person,Phone,Email) VALUES (?,?,?)")){
		$statement -> execute(array($_POST["Name"],$_POST["Phone"],$_POST["Email"]));
		echo "Success!";
	}
	else
	{
		echo "Failure :(";
	}
?>


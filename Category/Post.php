<?php 
    $path = dirname(__DIR__).DIRECTORY_SEPARATOR."nav.php";
    include($path);
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $myPDO = Load();

    if($statement = $myPDO->prepare("INSERT INTO Types (Category) VALUES (?)")){
		$statement -> execute(array($_POST["Type"]));
		echo "Success!";
	}
	else
	{
		echo "Failure :(";
	}
?>
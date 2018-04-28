<link rel="stylesheet" type="text/css" href="..\style.css">
<?php
    include(dirname(__DIR__).DIRECTORY_SEPARATOR."nav.php");
    error_reporting(E_ALL);
	ini_set('display_errors', 1);

    $myPDO = Load();
    
    echo "Person:";
    echo $_POST["Person"]."<br>";
    
    echo "Type:";
    echo $_POST["Type"]."<br>";

    if($statement = $myPDO->prepare("INSERT INTO Accounts (Institution,Category) VALUES (?,?)")){
		$statement -> execute(array($_POST["Person"],$_POST["Type"]));
		echo "Success!";
	}
	else
	{
		echo "Failure :(";
	}
?>
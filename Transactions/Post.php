<?php
	echo "<br>";
	echo"Date:";

	if(array_key_exists("Date",$_POST) == true){
		echo $_POST["Date"];
	}
	else{
		echo "Nan";
	}

	echo "<br>";
	echo "From:";
	if(array_key_exists("From",$_POST)){
		echo $_POST["From"];
	}
	else{
		echo "Nan";
	}

	echo "<br>";
	echo "To:";
	if(array_key_exists("To",$_POST)){
		echo $_POST["To"];
	}
	else{
		echo "Nan";
	}

	echo "<br>";
	echo "Amount:";
	if(array_key_exists("Amount",$_POST)){
		echo $_POST["Amount"];
	}
	else{
		echo "Nan";
	}

	echo "<br>";
	echo "Memo:";
	if(array_key_exists("Memo",$_POST)){
		echo $_POST["Memo"];
	}
	else{
		echo "";
	}
?>
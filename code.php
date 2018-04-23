<?php
	function Finances(){
		return $_SERVER['SERVER_NAME'].DIRECTORY_SEPARATOR ."Finances".DIRECTORY_SEPARATOR;
	}
	
	function Accounts()
	{
		return Finances()."Accounts". DIRECTORY_SEPARATOR;
	}
	
	function Transactions()
	{
		return Finances()."Transactions". DIRECTORY_SEPARATOR;
	}
	
	function People()
	{
		return Finances()."People".DIRECTORY_SEPARATOR;
	}
	
	function Wrap($string)
	{
		return "\""."http://".$string."\"";
	}
	
	function Tab($count){
		$string="";
		for($i = 0;$i <= $count;$i++){
			$string .= "\t";
		}
		return $string;
	}
	
	function Load(){
		$db = dirname(dirname(__DIR__)). DIRECTORY_SEPARATOR ."Sqlite". DIRECTORY_SEPARATOR ."Finances.db" ;
		$myPDO = new PDO('sqlite:'.$db,null,null,array(PDO::ATTR_PERSISTENT => true));
		$myPDO ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $myPDO ;
	}
	
	function Query($query){
		return Load()->query($query);
	}
	
	function Table($results,$data){
		foreach($results as $row){
			print Tab(4)."<tr>\n";
		
			for($x = 0;$x < count($data);$x++){
				print Tab(5)."<td>".$row[$data[$x]]."</td>\n";
			}
			print Tab(4)."</tr>\n";
		}
	}
	
	function GetAccounts(){
		$result = Query("SELECT ID,Person,Category FROM [Accounts View]");
		foreach($result as $row){
			if($row["Category"] == "General"){
				echo Tab(6)."<option value=\"".$row["ID"]."\">".$row["Person"]."</option>\n";
			}
			else{
				echo Tab(6)."<option value=\"".$row["ID"]."\">".$row["Person"]." ".$row["Category"]."</option>\n";
			}
		}
	}
	
	function GetMemos(){
		$result = Query("SELECT Distinct Memo,Count(Memo) From Transactions WHERE MEMO IS NOT NULL AND Length(MEMO) > 0 Group By Memo ORDER BY Count(Memo) DESC;");
		foreach($result as $row){
			echo Tab(6)."<option>".$row["Memo"]."</option>\n";
		}
	}
?>
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

	function Setup(){
		return Finances().'Setup'.DIRECTORY_SEPARATOR;
	}

	function Misc(){
		return Finances()."Misc".DIRECTORY_SEPARATOR;;
	}

	function Insurance(){
		return Misc()."Insurance".DIRECTORY_SEPARATOR;
	}

	function CSS() {
		return Finances()."css".DIRECTORY_SEPARATOR;
	}

	function Category() {
		return Finances()."Category".DIRECTORY_SEPARATOR;
	}

	function Reports() {
		return Finances()."Reports".DIRECTORY_SEPARATOR;
	}

	function Sqlite(){
		return dirname(dirname(__DIR__)). DIRECTORY_SEPARATOR ."Sqlite". DIRECTORY_SEPARATOR;
	}

	function DataBase(){
		return Sqlite()."Finances.db";
	}

	function Schema(){
		return __DIR__. DIRECTORY_SEPARATOR.'Finance Schema.sql';
	}

	function Patch(){
		return __DIR__. DIRECTORY_SEPARATOR.'Patch'.DIRECTORY_SEPARATOR.(Results(Query("PRAGMA User_Version;"))["user_version"]).'.sql';
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
		$db = DataBase();
		$myPDO = new PDO('sqlite:'.$db,null,null,array(PDO::ATTR_PERSISTENT => true));
		$myPDO ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $myPDO ;
	}
	
	function Query($query){
		return Load()->query($query);
	}

	function Results($PDO){
		return $PDO->fetch(PDO::FETCH_ASSOC);
	}

	function JSON($results) {
		return json_encode( $results );
	}
	
	function Table($results,$data,$title,$editable = false){
		print Tab(2)."<thead>\n";
		$colspan = count($data);
		$offset = 0;

		if($editable){
			$offset = 1;
		}
		print Tab(3)."<tr>\n".Tab(4)."<td id='Main' colspan=".($colspan + $offset).">".$title."</td>\n".Tab(3)."</tr>\n";
		print Tab(3)."<tr>\n";

		if($editable){
			print Tab(4)."<th sortable=false><i class='fa fa-pencil'></th>\n";
		}

		for($x = 0;$x < $colspan;$x++){
			print Tab(4)."<th>".$data[$x]."</th>\n";
		}
		print Tab(3)."</tr>\n";
		print Tab(2)."</thead>\n";

		print Tab(2)."<tbody>\n";
		foreach($results as $row){
			print Tab(4)."<tr>\n";

			if($editable){
				print Tab(5)."<td>";
				print "<form action='Update Form.php' method='post'>";
				print "<button type='image' name='ID' value='".$row["ID"]."'><i class='fa fa-edit fa-fw'></button>";
				print "</form>";
				print "</td>\n";
			}
		
			for($x = 0;$x < $colspan;$x++){
				print Tab(5)."<td>".$row[$data[$x]]."</td>\n";
			}
			print Tab(4)."</tr>\n";
		}
		print Tab(2)."</tbody>\n";
	}

	function Graph($results,$columns,$count,$isNumber){
		for($x = 0; $x < $count;$x++){
		   $row = $results->fetch(PDO::FETCH_ASSOC);
		   print Tab(4)."[";
		   
		   for($i = 0; $i < count($columns);$i++){
			   if($isNumber[$i] == false){
				   print "'";
			   }
			   print $row[$columns[$i]];
			   if($isNumber[$i] == false){
				   print "'";
			   }

			   if($i < count($columns)){
				   print ",";
			   }
		   }

		   print "]";
		   if($x < $count){
				print ",";
			}
			print "\n";
		}
	}
	
	function GetAccounts($selected = 0){
		$result = Query("SELECT ID,Person,Category FROM [Accounts View]");
		$i = 0;
		echo "\n";
		foreach($result as $row){
			$i = $i + 1;
			if($row["Category"] == "General"){
				echo Tab(6)."<option ";
				if($i == $selected){
					echo "selected ";
				}
				echo " value=\"".$row["ID"]."\">".$row["Person"]."</option>\n";
			}
			else{
				echo Tab(6)."<option ";
				if($i == $selected){
					echo "selected ";
				}
				echo "value=\"".$row["ID"]."\">".$row["Person"]." ".$row["Category"]."</option>\n";
			}
			
		}
	}
	
	function GetMemos(){
		$result = Query("SELECT Distinct Memo,Count(Memo) From Transactions WHERE MEMO IS NOT NULL AND Length(MEMO) > 0 Group By Memo ORDER BY Count(Memo) DESC;");
		echo Tab(6)."<datalist id=\"Memos\">\n";
		echo Tab(6)."<option></option>\n";
		foreach($result as $row){
			echo Tab(6)."<option>".$row["Memo"]."</option>\n";
		}
		echo Tab(6)."</datalist>";
	}

	function GetPersons()
	{
		$result = Query("SELECT ID,Person From Persons;");
		foreach($result as $row){
			echo Tab(6)."<option value=\"".$row["ID"]."\">".$row["Person"]."</option>\n";
		}
	}

	function GetCategories(){
		$result = Query("SELECT ID,Category FROM Types;");
		foreach($result as $row){
			echo Tab(6)."<option value=\"".$row["ID"]."\">".$row["Category"]."</option>\n";
		}
	}
?>
<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<title>Setup</title>
    </head>
	
	<?php 
		$DirExists = is_dir(Sqlite());
		$DBExists = is_file(DataBase());
		$FirstTime = false;
		$PatchExists = false;
		$Select2 = false;
		$JQuery = false;
		$FontAwesome = false;
		if($DirExists == false || $DBExists == false){
			$FirstTime = true;
		}
		else{
			$PatchExists = !is_file(Patch());
		}
		
	?>

    <body>
		<h1>Status</h1>
		<table class="w3-table-all w3-hoverable">
			<thead>
				<tr>
					<th>Operation</th>
					<th>State</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Sqlite Directory Exists</td>
					<td>
						<?php 
							if($DirExists){
								echo "&#10003\n";
							}
							else{
								echo "&#10006\n";
							}
						 ?>
					</td>
				</tr>
				<tr>
					<td>Database Exists</td>
					<td>
						<?php
							if($DBExists){
								echo "&#10003\n";
							}
							else{
								echo "&#10006\n";
							}
						?>
					</td>
				</tr>
				<tr>
					<td>Database Patches</td>
					<td>
						<?php
							if($PatchExists){
								echo "&#10003\n";
								//echo Patch();
							}
							else{
								echo "&#10006\n";
								
							}
						?>
					</td>
				</tr>
			</tbody>
		</table>

		<?php
			if($FirstTime == false){
				$Integrity = Results(Query("PRAGMA integrity_check;"))["integrity_check"];
				if($Integrity == "ok"){
					echo "<p>No integrity violations detected</p>";
				}
				else{
					echo '<table id="Integrity">'."\n";
					print Table(Query("PRAGMA integrity_check;"),array("integrity_check"),"Integrity Check");
					print "</table>";
				}
			}
		?>
	
		<?php
			if($FirstTime == false){
				$results = Query("PRAGMA foreign_key_check;");
				$i = 0;
				foreach($results as $row){
					$i++;
				}
				if($i == 0){
					print "<p>No foreign key errors detected.</p>";
				}
				else{
					echo '<table id="FK">'."\n";
					print Table($results,array("table","rowid","parent","fkid"),"Foreign Keys");
					print "</table>";
				}
			}
		?>


		<h2>Operations</h1>
		<div>
		<?php 
			if($DirExists){
				echo "\n".Tab(2)."Directory Creation Finished.<br>\n";
			}
			else{
				if(mkdir(Sqlite())){
					echo Tab(2)."Created Directory.<br>\n";
				}
				else{
					echo Tab(2)."Failed to create Directory.<br>\n";
				}
			}
			
			if($DBExists){
				echo Tab(2)."Database Creation Finished.<br>\n";
			}
			else{
				echo Tab(2)."Loading SQL Schema<br>\n";
				$sql = file_get_contents(Schema());
				echo Tab(2)."Creating SQLite Database.<br>\n";
				Load()->exec($sql);
				echo Tab(2)."Database Creation Finished.<br>\n";
			}

			if($PatchExists){
				echo Tab(2)."All Patches have been applied.<br>\n";
			}
			else{
				while(is_file(Patch())){
					echo Tab(2)."Loading Patch:".Patch()."<br>\n";
					$sql = file_get_contents(Patch());
					echo Tab(2)."Patching<br>\n";
					Load()->exec($sql);
					echo Tab(2)."Completing Patching.<br>\n";

					echo Tab(2)."Patch has been applied.<br>\n";
				}
			}

			echo Tab(2)."Setup Completed.\n";
		?>
		</div>
			
    </body>
</html>
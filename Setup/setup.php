<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="..\style.css">
		<title>Setup</title>
    </head>
	
	<?php 
		$DirExists = is_dir(Sqlite());
		$DBExists = is_file(DataBase());
		$PatchExists = !is_file(Patch());
	?>

    <body>
		<h1>Status</h1>
		<table>
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
								echo "&#10003";
							}
							else{
								echo "&#10006";
							}
						 ?>
					</td>
				</tr>
				<tr>
					<td>Database Exists</td>
					<td>
						<?php
							if($DBExists){
								echo "&#10003";
							}
							else{
								echo "&#10006";
							}
						?>
					</td>
				</tr>
				<tr>
					<td>Database Patches</td>
					<td>
						<?php
							if($PatchExists){
								echo "&#10003";
								//echo Patch();
							}
							else{
								echo "&#10006";
								
							}
						?>
					</td>
				</tr>
			</tbody>
		</table>

		<?php
			$Integrity = Results(Query("PRAGMA integrity_check;"))["integrity_check"];
			if($Integrity == "ok"){
				echo "<p>No integrity violations detected</p>";
			}
			else{
				echo '<table id="Integrity">'."\n";
				print Table(Query("PRAGMA integrity_check;"),array("integrity_check"),"Integrity Check");
				print "</table>";
			}
		?>
	
		<table id="FK">
			<?php
				$results = Query("PRAGMA foreign_key_check;");
				$i = 0;
				foreach($results as $row){
					$i++;
				}
				if($i == 0){
					print "<p>No foreign key errors detected.</p>";
				}
				else{
					print Table($results,array("table","rowid","parent","fkid"),"Foreign Keys");
				}
			?>
		</table>


		<h2>Operations</h1>
		<?php 
			if($DirExists){
				echo "Directory Creation Finished.<br>";
			}
			else{
				if(mkdir(Sqlite())){
					echo "Created Directory.<br>";
				}
				else{
					echo "Failed to create Directory.<br>";
				}
			}
			
			if($DBExists){
				echo "Database Creation Finished.<br>";
			}
			else{
				echo "Loading SQL Schema<br>";
				$sql = file_get_contents(Schema());
				echo 'Creating SQLite Database.<br>';
				Load()->exec($sql);
				echo 'Database Creation Finished.<br>';
			}

			if($PatchExists){
				echo "All Patches have been applied.<br>";
			}
			else{
				while(!is_file(Patch())){
					echo "Loading Patch:".Patch()."<br>";
					$sql = file_get_contents(Patch());
					echo "Patching<br>";
					Load()->exec($sql);
					echo "Completing Patching.<br>";

					echo "Patch has been applied.<br>";
				}
			}

			echo 'Setup Completed.';
		?>
			
    </body>
</html>
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

		<h2>Operations</h1>
		<pre>
			<?php 
				echo "\n";
				if($DirExists){
					echo "Directory Creation Finished.\n";
				}
				else{
					if(mkdir(Sqlite())){
						echo "Created Directory.\n";
					}
					else{
						echo "Failed to create Directory.\n";
					}
				}
				
				if($DBExists){
					echo "Database Creation Finished.\n";
				}
				else{
					echo "Loading SQL Schema\n";
					$sql = file_get_contents(Schema());
					echo 'Creating SQLite Database\n';
					Load()->exec($sql);
					echo 'Database Creation Finished.\n';
				}

				if($PatchExists){
					echo "All Patches have been applied.\n";
				}
				else{
					echo "Loading Patch:".Patch()."\n";
					$sql = file_get_contents(Patch());
					echo "Patching\n";
					Load()->exec($sql);
					echo "Completing Patching.\n";

					echo "One Patch has been applied.\n";
				}
				echo 'Setup Completed.';
			?>
			
		</pre>
    </body>
</html>
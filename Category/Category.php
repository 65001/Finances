<html>
	<head>
		<?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
		?>
		
		<title>Categories</title>
        <script>
			$(document).ready(function() { $("#Categories").DataTable({"iDisplayLength": 100}); });
		</script>
	</head>

	<body>

    <table id="Categories">
        <?php			
            $result = Query("SELECT * From Types");
            print "\n";
            print Table($result,array('ID','Category'),"Categories");			
        ?>
    </table>

    <a href="Form.php">
        <button>Add Category</button>
    </a>
    </body>
</html>
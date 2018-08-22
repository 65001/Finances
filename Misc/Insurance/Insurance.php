<html>
    <head>
        <?php 
            include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
        ?>
    </head>

    <body>
        <table>
            <?php echo Table(Query("SELECT * From [Insurance View]"),array("Institution","Status","Created","Closed","Face Value","Deductible","Yearly Premium"),"Insurance");?>
        </table>
    </body>
</html>


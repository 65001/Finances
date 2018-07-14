<html>
    <head>
        <?php
			include( $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."Finances".DIRECTORY_SEPARATOR."nav.php");
        ?>
        <link rel="stylesheet" type="text/css" href="..\style.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>

    <body>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(Draw);

            function Draw(){
                var data = new google.visualization.DataTable();
                data.addColumn('string','Account');
                data.addColumn('number','Money');
                data.addRows([
                    <?php
                        print "\n";
                        Graph(Query("SELECT * FROM Balance WHERE Money != 0 ORDER BY Money"),array("Account","Money"),Query("SELECT count(*) FROM Balance WHERE Money != 0")->fetchColumn(),array(false,true));
                    ?>
                ]);

                var options = {'title':'Balance','width':1000,'height':1000};
                var chart = new google.visualization.BarChart(document.getElementById('chart'));
                chart.draw(data, options);
            }
        </script>

        <div id="chart"></div>
    </body>

</html>
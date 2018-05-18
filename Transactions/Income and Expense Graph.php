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
            google.charts.setOnLoadCallback(Income);
            google.charts.setOnLoadCallback(Expenses);
            google.charts.setOnLoadCallback(Assets);

            function Income(){
                var data = new google.visualization.DataTable();
                data.addColumn('string','Account');
                data.addColumn('number','Money');
                data.addRows([
                    <?php
                        print "\n";
                        Graph(Query("SELECT Account,ABS(Money) AS \"Money\" FROM Balance WHERE Money < 0 "),array("Account","Money"),Query("SELECT count(*) FROM Balance WHERE Money < 0")->fetchColumn(),array(false,true));
                    ?>
                ]);

                var options = {'title':'Income','width':1000,'height':1000};
                var chart = new google.visualization.PieChart(document.getElementById('Income'));
                chart.draw(data, options);
            }

            function Expenses(){
                var data = new google.visualization.DataTable();
                data.addColumn('string','Account');
                data.addColumn('number','Money');
                data.addRows([
                    <?php
                        print "\n";
                        Graph(Query("SELECT Account,ABS(Money) AS \"Money\" FROM Balance WHERE Money > 0 AND Account NOT LIKE '%Savings%' AND Account NOT LIKE '%Checking%' AND Account NOT LIKE '%Cash%'"),array("Account","Money"),
                        Query("SELECT count(*) FROM Balance WHERE Money > 0 AND Account NOT LIKE '%Savings%' AND Account NOT LIKE '%Checking%' AND Account NOT LIKE '%Cash%'")->fetchColumn(),array(false,true));
                    ?>
                ]);

                var options = {'title':'Expenses','width':1000,'height':1000};
                var chart = new google.visualization.PieChart(document.getElementById('Expenses'));
                chart.draw(data, options);
            }

            function Assets(){
                var data = new google.visualization.DataTable();
                data.addColumn('string','Account');
                data.addColumn('number','Money');
                data.addRows([
                    <?php
                        print "\n";
                        Graph(Query("SELECT Account,ABS(Money) AS \"Money\" FROM Balance WHERE Money > 0 AND (Account LIKE '%Savings%' OR Account LIKE '%Checking%' OR Account LIKE '%Cash%')"),array("Account","Money"),
                        Query("SELECT count(*) FROM Balance WHERE Money > 0 AND (Account LIKE '%Savings%' OR Account LIKE '%Checking%' OR Account LIKE '%Cash%')")->fetchColumn(),array(false,true));
                    ?>
                ]);

                var options = {'title':'Assets','width':1000,'height':1000};
                var chart = new google.visualization.PieChart(document.getElementById('Assets'));
                chart.draw(data, options);
            }
        </script>

        <div id="Income"></div>
        <div id="Expenses"></div>
        <div id="Assets"></div>
    </body>
</html>
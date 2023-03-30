<html>

<head>
    <title>Google Chart in PHP and MySQL</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        /* Aqui utliza-se Ajax com Jquery para converter os dados do banco em formato JSON */
        $(document).ready(function() {
            /* carregar os dados a partir da consulta ao banco no arquivo "data.php" */
            $.ajax({
                url: "data.php",
                dataType: "JSON",
                success: function(result) {
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(function() {
                        drawChart(result);
                    });
                }
            });

            /* Função responsável por desenhar os gráficos */
            function drawChart(result) {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Name');
                data.addColumn('number', 'Quantity');
                var dataArray = [];
                $.each(result, function(i, obj) {
                    dataArray.push([obj.name, parseInt(obj.quantity)]);
                });

                data.addRows(dataArray);
                
                /* Gráfico do tipo Pizza */
                var piechart_options = {
                    title: 'Gráfico de Pizza: Quantos produtos foram vendidos',
                    width: 400,
                    height: 300
                };
                var piechart = new google.visualization.PieChart(document
                    .getElementById('piechart_div'));
                piechart.draw(data, piechart_options);
               
                /* Gráfico do tipo Barras */
                var barchart_options = {
                    title: 'Gráfico de barra: Quantos produtos foram vendidos',
                    width: 400,
                    height: 300,
                    legend: 'none'
                };
                var barchart = new google.visualization.BarChart(document
                    .getElementById('barchart_div'));
                barchart.draw(data, barchart_options);
               
                /* Gráfico do tipo Linha */
                var linechart_options = {
                    title: 'Gráfico de linha: Quantos produtos foram vendidos',
                    width: 400,
                    height: 300,
                    legend: 'none'
                };
                var linechart = new google.visualization.LineChart(document
                    .getElementById('linechart_div'));
                linechart.draw(data, linechart_options);
              
                /* Gráfico do tipo Colunas */
                var columnchart_options = {
                    title: 'Gráfico de coluna: Quantos produtos foram vendidos',
                    width: 400,
                    height: 300,
                    legend: 'none'
                };
                var columnchart = new google.visualization.ColumnChart(document
                    .getElementById('columnchart_div'));
                columnchart.draw(data, columnchart_options);
            }

        });
    </script>

</head>

<body>
    <table class="columns">
        <tr>
            <td>
                <div id="piechart_div" style="border: 1px solid #ccc"></div>
            </td>
            <td>
                <div id="barchart_div" style="border: 1px solid #ccc"></div>
            </td>
            <td>
                <div id="linechart_div" style="border: 1px solid #ccc"></div>
            </td>
        </tr>
        <tr>
            <td>
                <div id="columnchart_div" style="border: 1px solid #ccc"></div>
            </td>
        </tr>
    </table>
</body>

</html>
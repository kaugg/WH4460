<!--Victoria-->

<h3>Comparisons Bar Graph</h3>

        <script type="text/javascript">
            var chart;

            var chartData = [
                {
                    "year": 2004,
                    "Improved Water": 23.5,
                    "Improved Sanitation": 18.1
                },
                {
                    "year": 2005,
                    "Improved Water": 26.2,
                    "Improved Sanitation": 22.8
                }
                
               
            ];


            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "year";
                chart.startDuration = 1;
                chart.plotAreaBorderColor = "#DADADA";
                chart.plotAreaBorderAlpha = 1;
                // this single line makes the chart a bar chart
                chart.rotate = true;

                // AXES
                // Category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.axisAlpha = 0;

                // Value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                valueAxis.gridAlpha = 0.1;
                valueAxis.position = "top";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "column";
                graph1.title = "Improved Water";
                graph1.valueField = "Improved Water";
                graph1.balloonText = "Improved Water:[[value]]";
                graph1.lineAlpha = 0;
                graph1.fillColors = "#ADD981";
                graph1.fillAlphas = 1;
                chart.addGraph(graph1);

                // second graph
                var graph2 = new AmCharts.AmGraph();
                graph2.type = "column";
                graph2.title = "Improved Sanitation";
                graph2.valueField = "Improved Sanitation";
                graph2.balloonText = "Improved Sanitation:[[value]]";
                graph2.lineAlpha = 0;
                graph2.fillColors = "#81acd9";
                graph2.fillAlphas = 1;
                chart.addGraph(graph2);

                // LEGEND
                var legend = new AmCharts.AmLegend();
                chart.addLegend(legend);

                chart.creditsPosition = "top-right";

                // WRITE
                chart.write("chartdiv2");
            });
        </script>

        <div id="chartdiv2" style="width:550px; height:400px;"></div>

			
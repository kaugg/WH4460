<!--Nicole-->

<script type="text/javascript">

var chartData3 = [];

var chart7 = AmCharts.makeChart("chartdiv3", {
    "theme": "none",	
    "type": "serial",
		"autoMargins": false,
		"marginLeft":8,
		"marginRight":8,
		"marginTop":10,
		"marginBottom":26,
    "pathToImages": "http://www.amcharts.com/lib/3/images/",
    "dataProvider": chartData3,
    "valueAxes": [{
        "id":"v1",
        "axisAlpha": 0,
        "inside": true
    }],
    "graphs": [{
               "useNegativeColorIfDown":true,
        "balloonText": "[[category]]<br><b>value: [[value]]</b>",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletBorderColor": "#FFFFFF",
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "lineColor": "#fdd400",
        "negativeLineColor": "#67b7dc",
        "valueField": "visits"
    }],
    "chartScrollbar": {
    },
    "chartCursor": {
        "valueLineEnabled":true,
        "valueLineBalloonEnabled":true
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": false,
        "axisAlpha": 0,
        "minHorizontalGap":60
    }
});

chart.addListener("dataUpdated", zoomChart);
//zoomChart();

function zoomChart(){
  if(chart.zoomToIndexes){
    chart.zoomToIndexes(130, chartData.length - 1);
  }
}
</script>

<h3>Progress of Country: <span id="country_label"></span></h3>

<div id="chartdiv3" style="height: 300px; width: 600px;"></div>
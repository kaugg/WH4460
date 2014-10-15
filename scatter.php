<!--Michael-->
<script src="amcharts/amcharts.js" type="text/javascript"></script>
<script src="amcharts/xy.js" type="text/javascript"></script>

<script type="text/javascript">
var chart = AmCharts.makeChart("chartdiv", {
	"type": "xy",
	"theme": "none",
	"pathToImages": "images/scatter.png",
	"dataProvide": [{
		"x": 10,
		"y": 14,
		"errorX": 3,
		"errorY": 4
	}, {
		"x": 5,
		"y": 3,
		"errorX": 1.52,
		"errorY": 6.8
	}],
	"valueAxes": [{
		"title": "X Axis",
		"position": "bottom",
		"id": "x1"
	}, {
		"minMaxMultiplier": 1.2,
		"position": "left",
		"id": "y1",
		"title": "Y Axis"
	}],
	"graphs": [{
		"balloonText": "x:<b>[[x]]</b> y:<b>[[y]]</b><br>x error:<b>[[errorX]]</b><br>y error:<b>[[errorY]]</b>",
		"bullet": "xError",
		"bulletAxis": "x1",
		"errorField": "errorX",
		"lineAlpha": 0,
		"xField": "x",
		"yField": "y",
		"fillAlphas": 0
	}, {
		"balloonText": "x:<b>[[x]]</b> y:<b>[[y]]</b><br>x error:<b>[[errorX]]</b><br>y error:<b>[[errorY]]</b>",
		"bullet": "yError",
		"bulletAxis": "y1",
		"errorField": "errorY",
		"lineAlpha": 0,
		"xField": "x",
		"yField": "y",
		"fillAlphas" : 0
	}]
});
</script>

<h3>Scatterplot</h3>
<div id="chartdiv"></div>

<!--img src="images/scatter.png"-->

<p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. 
Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. 
Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
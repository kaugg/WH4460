<!--Kemble-->

<h3>Compare Two Countries Progress</h3>


			Select Country A:
			<select  onChange="comp_init()"  id="input_country_A" style="width: 200px;">
				<option value='0'>Country:</option>
			 </select>

			 
			 Select Country B:
			 <select  onChange="comp_init()"  id="input_country_B"  style="width: 200px;">
				<option value='0'>Country:</option>
			 </select>


<hr>


        <script type="text/javascript">
           
		   var chart9 = AmCharts.makeChart("chartdiv2", {
    "theme": "none",
    "type": "serial",
    "dataProvider": [],
    "valueAxes": [{
        "unit": "%",
        "position": "left",
        "title": "Water / Sanitation %",
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "GDP grow in [[category]] (Country A): <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2004",
        "type": "column",
        "valueField": "cA"
    }, {
        "balloonText": "GDP grow in [[category]] (Country B): <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "2005",
        "type": "column",
        "clustered":false,
        "columnWidth":0.5,
        "valueField": "cB"
    }],
    "plotAreaFillAlphas": 0.1,
    "categoryField": "year",
    "categoryAxis": {
        "gridPosition": "start"
    }
});
		   
		   
        </script>


        <div id="chartdiv2" style="width:550px; height:300px;"></div>

			
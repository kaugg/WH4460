<?php include('data_import.php'); ?>

<!--Kemble-->
<!DOCTYPE html>
<html>
  <head>
  	<script src="libs/jquery.js"></script>
  
    <title>4460 World Health</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	
		<link rel="stylesheet" href="maps/jquery-jvectormap-1.1.1.css" type="text/css" media="screen"/>
		<script src="maps/jquery-jvectormap-1.1.1.min.js"></script>
		<script src="maps/jquery-jvectormap-world-mill-en.js"></script>
	
	<script src="amcharts/amcharts/amcharts.js" type="text/javascript"></script>
	<script src="amcharts/amcharts/xy.js" type="text/javascript"></script>
	<script src="amcharts/amcharts/serial.js" type="text/javascript"></script>
	
	<script src="main.js" type="text/javascript"></script>
	<script src="cn/index.js" type="text/javascript"></script>
	
	<link rel="stylesheet" href="main.css" type="text/css" media="screen"/>
	
	
	  <script>
	  
	  function updateCountryDropDown(event,code)
	  {
		var two_letter_iso_code = code;
		
		$( '#input_country' ).val( code );  //when clicked, set country drop down to map value
		
		on_filter_change(); // call filter change
	  }
	  
	  
		
				
	
				
		</script>
	
<!--Victoria-->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
	    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
	
  </head>
  <body onload="start()">
  
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">World Health 4460</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Team:  Kemble, Michael, Nicole, Victoria
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Infoviz</a></li>
              <li><a href="#about" data-toggle="modal" data-target="#myModal" onclick="z_open()" >Help</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span6">
	
	
	
          <div class="well">
			 <div id="world-map" style="width: 100%; height: 280px"></div>
		 </div>
		 
		 
		 <div class="well">
     
			 <h4>Legend:</h4>
			 <div align="center">
			<img src="legend.png" style="margin: auto;" />
		      </div>
		 </div>
		 
 
        </div><!--/span-->
		
		<div class="span6">
		<div class="well" style="z-index: 9999999;">
			 Welcome to the World Health infoviz. Filter results using the dropdowns below:<br><br>
			 
			 <select onChange="on_filter_change()" id="input_year">
			    <option value="0">Year:</option>
				<option>1990</option>
				<option>1995</option>
				<option>2000</option>
				<option>2005</option>
				<option>2010</option>
				<option>2012</option>
			 </select>
			 
			 <select  onChange="on_filter_change()"  id="input_area_type">
			 	<option value="0">Area Type</option>
				<option>Total</option>
				<option>Urban</option>
				<option>Rural</option>
			 </select>
			 
			  <select  onChange="on_filter_change()"  id="input_health_type">
			    <option value="0">Health Type:</option>
				<option>Water</option>
				<option>Sanitation</option>
			 </select>
			 
			 <select  onChange="on_filter_change()"  id="input_population_portion">
			    <option value="0">Quartile:</option>
				<option value="1">0-25%</option>
				<option value="2">25-50%</option>
				<option value="3">50-75%</option>
				<option value="4">75-100%</option>
			 </select>
			 
			  <select  onChange="on_filter_change()"  id="input_country">
				<option value='0'>Country:</option>
			 </select>
			 
			 <input type="button" value="X" onclick="clear_filters()" />
			 
		 </div>
		
			<div class="bs-example">
				<ul class="nav nav-tabs">
					<li class="disabled" id="li_country_prog"><a data-toggle="tab" href="#sectionA">Country Progress</a></li>
					<li class="disabled" id="li_water_prog"><a data-toggle="tab" href="#sectionB">Water vs. Septic Progress</a></li>
					<li class="disabled" id="li_comp"><a data-toggle="tab" href="#dropdown1">Compare Countries</a></li>
					<li  class="active"><a data-toggle="tab" href="#sectionD">Raw Data</a></li>
				</ul>
				<div class="tab-content" style="padding-bottom: 30px;">
					<div id="sectionA" class="tab-pane fade">

						<?php include('line.php'); ?>
						
					</div>
					<div id="sectionB" class="tab-pane fade">
					
						<?php include('scatter.php'); ?>
						
					</div>
					<div id="sectionD" class="tab-pane fade in active">
					
						<div style="overflow: scroll-y; height: 270px;">
						<?php include('raw.php'); ?>
						</div>
						
					</div>
					<div id="dropdown1" class="tab-pane fade">
						
						<?php include('bar.php'); ?>
						
					</div>
	
				</div>
			</div>
		
	   	   		
	
		 
        </div><!--/span-->
		
      </div><!--/row-->

      <hr>

      <footer>
        <p>World Health 4460, Fall 2014</p>
      </footer>

    </div><!--/.fluid-container-->
  
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" style="z-index: -1;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Need some help with our Infoviz? </h4>
      </div>
      <div class="modal-body">
      
	  <h3>Filter Help:</h3>
	  
	  <ul class="list-group">
	  <li class="list-group-item"><b>Year:</b> Select the year you're interested in for water and sanitation data.</li>
	  <li class="list-group-item"><b>Area Type:</b> Rural denotes rural spaces in a country, and urban denotes cities. Total is both combined and averaged.</li>
	  <li class="list-group-item"><b>Health type:</b> Water denotes cleanliness of water facilities, and sanitation denotes septic systems, sinks, etc.</li>
	  <li class="list-group-item"><b>Quartile:</b> You can select the lower and upper quartiles of the countries based on cleanliness.</li>
	  <li class="list-group-item"><b>Country:</b> Select a single country you want to inspect further.</li>
	  <li class="list-group-item"><b>X:</b> Clear all filters to reset to a global view.</li>
	</ul>
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  

  </body>
</html>
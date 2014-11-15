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
	
	
	  <script>
	  
	  function go(event,code)
	  {
		alert( code );  //getCountryName(code)
	  }
	  
	  
				$(function(){
				  $('#world-map').vectorMap({
						backgroundColor : "f1f1f1",
						onRegionClick : go,
						regionStyle : {
											initial : {fill:"#a0a0a0"}
										}
				  
				  });
				});
				
				
				
	
				
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
  <body onload="on_filter_change()">
  
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
              <li><a href="#about" data-toggle="modal" data-target="#myModal" >Help</a></li>
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
				<p>Scroll around the map and select the countries you're interested in.  Use the time slider to see changes in world health over time.</p>
		      
		 </div>
		 
		 
		<!--
		<div class="well">
          
					<div class="btn-group" style="display: inline;">
					  <button type="button" class="btn btn-default" onclick="alert('rural')">Rural</button>
					  <button type="button" class="btn btn-default" onclick="alert('urban')">Urban</button>
					  <button type="button" class="btn btn-default" onclick="alert('total')">Total</button>
					</div>

            </div>
		-->
		 		
          <div class="well">
			<h4>Time Slider:</h4>
			    <input type="range" name="points" min="0" max="6" style="width: 100%" onChange="on_filter_change()" id="ts">
  
			
				<div class="span2">1990</div>
				<div class="span2">1995</div>
				<div class="span2">2000</div>
				<div class="span2">2005</div>
				<div class="span2">2010</div>
				<div class="span1">2012</div>

  
		 </div>
		 
        </div><!--/span-->
		
		<div class="span6">
		<div class="well">
			 Welcome to the World Health infoviz. Filter results using the dropdowns below:<br>
			 
			 <select onChange="on_filter_change()" id="input_year">
				<option>1990</option>
				<option>1995</option>
				<option>2000</option>
				<option>2005</option>
				<option>2010</option>
			 </select>
			 
			 <select  onChange="on_filter_change()"  id="input_area_type">
				<option>Total</option>
				<option>Urban</option>
				<option>Rural</option>
			 </select>
			 
			  <select  onChange="on_filter_change()"  id="input_health_type">
				<option>Water</option>
				<option>Sanitation</option>
			 </select>
			 
			 <select  onChange="on_filter_change()"  id="input_population_portion" disabled="disabled">
				<option>0-25%</option>
				<option>25-50%</option>
				<option>50-75%</option>
				<option>75-100%</option>
			 </select>
			 
			  <select  onChange="on_filter_change()"  id="input_country" disabled="disabled">
				<option>Country:</option>
				
			 </select>
			 
		 </div>
		
			<div class="bs-example">
				<ul class="nav nav-tabs">
					<li><a data-toggle="tab" href="#sectionA">Line Graph</a></li>
					<li><a data-toggle="tab" href="#sectionB">Scatterplot</a></li>
					<li><a data-toggle="tab" href="#dropdown1">Bar Graph</a></li>
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
					
						<?php include('raw.php'); ?>
					
					</div>
					<div id="dropdown1" class="tab-pane fade">
						
						<?php include('pie.php'); ?>
						
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Need some help with our Infoviz? </h4>
      </div>
      <div class="modal-body">
      
	  
	  <ul class="list-group">
	  <li class="list-group-item">Cras justo odio</li>
	  <li class="list-group-item">Dapibus ac facilisis in</li>
	  <li class="list-group-item">Morbi leo risus</li>
	  <li class="list-group-item">Porta ac consectetur ac</li>
	  <li class="list-group-item">Vestibulum at eros</li>
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
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
	
	  <script>
	  
	  function go(event,code)
	  {
		alert(code);
	  }
	  
	  
				$(function(){
				  $('#world-map').vectorMap({
						backgroundColor : "f1f1f1",
						onRegionClick : go,
						regionStyle : {
											initial : {fill:"#a0a0a0"}
										},
										markers: [
      {latLng: [41.90, 12.45], name: 'Vatican City'},
      {latLng: [43.73, 7.41], name: 'Monaco'},
      {latLng: [-0.52, 166.93], name: 'Nauru'},
      {latLng: [-8.51, 179.21], name: 'Tuvalu'},
      {latLng: [43.93, 12.46], name: 'San Marino'},
      {latLng: [47.14, 9.52], name: 'Liechtenstein'},
      {latLng: [7.11, 171.06], name: 'Marshall Islands'},
      {latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis'},
      {latLng: [3.2, 73.22], name: 'Maldives'},
      {latLng: [35.88, 14.5], name: 'Malta'},
      {latLng: [12.05, -61.75], name: 'Grenada'},
      {latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines'},
      {latLng: [13.16, -59.55], name: 'Barbados'},
      {latLng: [17.11, -61.85], name: 'Antigua and Barbuda'},
      {latLng: [-4.61, 55.45], name: 'Seychelles'},
      {latLng: [7.35, 134.46], name: 'Palau'},
      {latLng: [42.5, 1.51], name: 'Andorra'},
      {latLng: [14.01, -60.98], name: 'Saint Lucia'},
      {latLng: [6.91, 158.18], name: 'Federated States of Micronesia'},
      {latLng: [1.3, 103.8], name: 'Singapore'},
      {latLng: [1.46, 173.03], name: 'Kiribati'},
      {latLng: [-21.13, -175.2], name: 'Tonga'},
      {latLng: [15.3, -61.38], name: 'Dominica'},
      {latLng: [-20.2, 57.5], name: 'Mauritius'},
      {latLng: [26.02, 50.55], name: 'Bahrain'},
      {latLng: [0.33, 6.73], name: 'São Tomé and Príncipe'}
    ]
				  
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
  <body onload="">
  
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
          
					<div class="btn-group" style="display: inline;">
					  <button type="button" class="btn btn-default">Rural</button>
					  <button type="button" class="btn btn-default">Urban</button>
					  <button type="button" class="btn btn-default">Total</button>
					</div>

            </div>
		
		 		
          <div class="well">
			<h4>Time Slider:</h4>
			    <input type="range" name="points" min="0" max="6" style="width: 100%" onChange="alert(this.value)">
  
			
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
			 Welcome to the World Health infoviz.
		 </div>
		
			<div class="bs-example">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#sectionA">Line Graph</a></li>
					<li><a data-toggle="tab" href="#sectionB">Scatterplot</a></li>
					<li><a data-toggle="tab" href="#dropdown1">Pie Chart</a></li>
					<li><a data-toggle="tab" href="#sectionD">Raw Data</a></li>
				</ul>
				<div class="tab-content" style="padding-bottom: 30px;">
					<div id="sectionA" class="tab-pane fade in active">

						<?php include('line.php'); ?>
						
					</div>
					<div id="sectionB" class="tab-pane fade">
					
						<?php include('scatter.php'); ?>
						
					</div>
					<div id="sectionD" class="tab-pane fade">
					
						<?php include('raw.php'); ?>
					
					</div>
					<div id="dropdown1" class="tab-pane fade">
						
						<?php include('pie.php'); ?>
						
					</div>
	
				</div>
			</div>
		
		  <div class="well">
     
			 <h4>Info for Current Country:</h4>
		     <p>....</p>
		      
		 </div>       	   		
		
		 <div class="well">
     
			 <h4>Guide to Using this Infoviz:</h4>
				<p>Scroll around the map and select the countries you're interested in.  Use the time slider to see changes in world health over time.</p>
		      
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
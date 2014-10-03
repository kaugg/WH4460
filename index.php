<!DOCTYPE html>
<html>
  <head>
  	<script src="jquery.js"></script>
  
    <title>4460 World Health</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	
   <link rel="stylesheet" href="maps/jquery-jvectormap-1.1.1.css" type="text/css" media="screen"/>
  <script src="maps/jquery-jvectormap-1.1.1.min.js"></script>
  <script src="maps/jquery-jvectormap-world-mill-en.js"></script>
	
	
	  <script>
				$(function(){
				  $('#world-map').vectorMap({
						backgroundColor : "f1f1f1",
						regionStyle : {
											initial : {fill:"#a0a0a0"}
										}
				  
				  });
				});
		</script>
	

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
  <body>
  
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
              <li><a href="#about">Help</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span6">
		
		
			<div class="bs-example">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#sectionA">Line Graph</a></li>
					<li><a data-toggle="tab" href="#sectionB">Scatterplot</a></li>
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">Comparisons <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a data-toggle="tab" href="#dropdown1">Pie Chart</a></li>
							<li><a data-toggle="tab" href="#dropdown2">Line Chart</a></li>
						</ul>
					</li>
				</ul>
				<div class="tab-content" style="padding-bottom: 30px;">
					<div id="sectionA" class="tab-pane fade in active">
						<h3>Line Graph</h3>
						<p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
					</div>
					<div id="sectionB" class="tab-pane fade">
						<h3>Scatterplot</h3>
						<p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
					</div>
					<div id="dropdown1" class="tab-pane fade">
						<h3>Comparisons Pie Chart</h3>
						<p>WInteger convallis, nulla in sollicitudin placerat, ligula enim auctor lectus, in mollis diam dolor at lorem. Sed bibendum nibh sit amet dictum feugiat. Vivamus arcu sem, cursus a feugiat ut, iaculis at erat. Donec vehicula at ligula vitae venenatis. Sed nunc nulla, vehicula non porttitor in, pharetra et dolor. Fusce nec velit velit. Pellentesque consectetur eros.</p>
					</div>
					<div id="dropdown2" class="tab-pane fade">
						<h3>Dropdown 2</h3>
						<p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis dis parturient.</p>
					</div>
				</div>
			</div>
		
       	   		 
		 <div class="well">
     
			 <h4>Guide to Using this Infoviz:</h4>
				<p>Scroll around the map and select the countries you're interested in.  Use the time slider to see changes in world health over time.</p>
		      
		 </div>
	   
        </div><!--/span-->
        <div class="span6">
		
		
		   <div class="row-fluid">
            <div class="well">
            
			<div class="btn-group" data-toggle="buttons">
			  <label class="btn btn-primary active">
				<input type="radio" name="options" id="option1" checked> Option 1 (preselected)
			  </label>
			  <label class="btn btn-primary">
				<input type="radio" name="options" id="option2"> Option 2
			  </label>
			  <label class="btn btn-primary">
				<input type="radio" name="options" id="option3"> Option 3
			  </label>
			</div>
			
            </div>
          </div><!--/row-->
		
		
          <div class="well">
			<h3>World Map:</h3>
			 <div id="world-map" style="width: 100%; height: 400px"></div>
		      
		 </div>
		 
		 
		 		
          <div class="well">
			<h4>Time Slider:</h4>
			    <input type="range" name="points" min="0" max="10" style="width: 100%" onChange="alert(this.value)">
  
		 </div>
		 
		


        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>World Health 4460, Fall 2014</p>
      </footer>

    </div><!--/.fluid-container-->
  


  </body>
</html>
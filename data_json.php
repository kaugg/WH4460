<?php

header('Content-Type: application/json');

$csv = array_map('str_getcsv', file('data.csv'));

$data = array();

// FILTERS: only one filter at a time for now
$f_country		= null;		// ... 
$f_year			= null;		// 1990, 1995, 2000, 2005, 2010
$f_area_type	= null;		// Total, Rural, Urban
$f_health_type 	= null; 	// SANITATION, WATER

$f_min_value = 0;  // default 0
$f_max_value = 101;  // default 101


if( isset($_REQUEST['country']) )
{
	$f_country = $_REQUEST['country'];
}
if( isset($_REQUEST['year']) )
{
	$f_year = $_REQUEST['year'];
}
if( isset($_REQUEST['area_type']) )
{
	$f_area_type = $_REQUEST['area_type'];
}
if( isset($_REQUEST['health_type']) )
{
	$f_health_type = $_REQUEST['health_type'];
}
if( isset($_REQUEST['min_value']) )
{
	$f_min_value = $_REQUEST['min_value'];
}
if( isset($_REQUEST['max_value']) )
{
	$f_max_value = $_REQUEST['max_value'];
}


for($i=1; $i < count($csv); $i++)
{
	$line = $csv[$i];

	$country			= $line[13];	// name of country
	$area_type  		= $line[16]; // type will be either RURAL, URBAN, or TOTAL
	$year  				= $line[6]; // year will be 1990, 1995, 2000, 2005, 2010
	$health_type  		= $line[0]; // health type will be WATER or SANITATION
	$value	  			= $line[18]; // value will be a percentage of the RURAL or URBAN population with good WATER or SANITATION facilities  
	
	if( $health_type == "WHS5_158")
	{
		$health_type = 'Sanitation';
	}
	else
	{
		$health_type = 'Water';
	}
	
	// THIS FILTERS THE DATA IN THE TABLE
	if	(
			(($year == $f_year) || ($f_year == null)) &&
			(($area_type == $f_area_type) || ($f_area_type == null)) &&
			(($health_type == $f_health_type) || ($f_health_type == null))  &&
			(($country == $f_country) || ($f_country == null))  &&
			( $f_min_value < $value ) &&
			( $f_max_value > $value )
		)
	{
		$data[$i] = array();
	
		// Record list model
		$data[$i]['country'] 		= $country;
		$data[$i]['area_type'] 		= $area_type;
		$data[$i]['year'] 			= $year;
		$data[$i]['health_type'] 	= $health_type;
		$data[$i]['value'] 			= $value;
	}
}

echo(json_encode($data));

?>


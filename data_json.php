<?php

include('codes_import.php');

header('Content-Type: application/json');

$csv = array_map('str_getcsv', file('data.csv'));

$data = array();

// FILTERS: only one filter at a time for now
$f_country		= null;		// ... 
$f_country_code	= null;
$f_year			= null;		// 1990, 1995, 2000, 2005, 2010
$f_area_type	= null;		// Total, Rural, Urban
$f_health_type 	= null; 	// SANITATION, WATER

$f_min_value = 0;  // default 0
$f_max_value = 101;  // default 101


if( isset($_REQUEST['country']) && (($_REQUEST['country'] != '0') || ($_REQUEST['country'] != 0)) )
{
	$f_country = $_REQUEST['country'];
}
if( isset($_REQUEST['country_code']) && (($_REQUEST['country_code'] != '0') || ($_REQUEST['country_code'] != 0)) )
{
	$f_country_code = $two_to_three_iso[ $_REQUEST['country_code'] ]; // convert request two letter code to 3 letter code
}
if( isset($_REQUEST['year']) && (($_REQUEST['year'] != '0') || ($_REQUEST['year'] != 0)))
{
	$f_year = $_REQUEST['year'];
}
if( isset($_REQUEST['area_type'])&& (($_REQUEST['area_type'] != '0') || ($_REQUEST['area_type'] != 0)) )
{
	$f_area_type = $_REQUEST['area_type'];
}
if( isset($_REQUEST['health_type']) && (($_REQUEST['health_type'] != '0') || ($_REQUEST['health_type'] != 0)) )
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

$count = 0;

for($i=1; $i < count($csv); $i++)
{
	$line = $csv[$i];

	$country			= $line[13];	// name of country
	$country_code		= $line[12];	// iso 3 letter code
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
			(($f_country == 0) || ($f_country == '0') ) &&
			(($area_type == $f_area_type) || ($f_area_type == null)) &&
			(($health_type == $f_health_type) || ($f_health_type == null))  &&
			(($country_code == $f_country_code) || ($f_country_code == null))  &&
			( $f_min_value < $value ) &&
			( $f_max_value > $value )
		)
	{
		$data[$count] = array();
	
		// Record list model
		$data[$count]['country'] 		= $country;
		$data[$count]['country_code'] 	= $codes_array[ $country_code ]; // turn 3 letter ISO abbreviation into two letter abbrv
		$data[$count]['area_type'] 		= $area_type;
		$data[$count]['year'] 			= $year;
		$data[$count]['health_type'] 	= $health_type;
		$data[$count]['value'] 			= $value;
		
		$count++;
	}
}

echo(json_encode($data));

?>


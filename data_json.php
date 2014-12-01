<?php

include('codes_import.php');
include('db.php');

header('Content-Type: application/json');

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

$data = get_data(   $f_year, 
					$f_country, 
					$f_area_type,
					$f_health_type,
					$f_country_code,
					$f_min_value,
					$f_max_value);

echo(json_encode($data));

?>


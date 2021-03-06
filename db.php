<?php  // DB

include('codes_import.php');

function get_data( 
					$f_year, 
					$f_country, 
					$f_area_type,
					$f_health_type,
					$f_country_code,
					$f_min_value,
					$f_max_value
				)
{
	global $codes_array; // make global variable


	$csv = array_map('str_getcsv', file('data.csv'));

	$data = array();
	
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
	
	return $data;
}


?>
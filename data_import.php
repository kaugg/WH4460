<?php

$csv = array_map('str_getcsv', file('data.csv'));

//print_r($csv);



$html_data = '';
$data = array();

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
		$health_type = 'SANITATION';
	}
	else
	{
		$health_type = 'WATER';
	}
	
	$html_data .= "<tr>
		<td>$country</td>
	    <td>$year</td>
		<td>$area_type</td>
		<td>$health_type</td>
		<td>$value %</td>
	</tr>";
}
?>



<?php
/*
for($i=1; $i < 2; $i++)
{
	$line = $csv[$i];

	$country			= $line[0];	// name of country
	$area_type  		= $line[1]; // type will be either rural or urban
	$year  				= $line[2]; // year will be 1990, 1995, 2000, 2005, 2010
	$health_type  		= $line[3]; // health type will be WATER or SANITATION
	$value	  			= $line[4]; // value will be a percentage of the RURAL or URBAN population with good WATER or SANITATION facilities  
	
	$html_data .= "<tr>
		<th>$country</th>
	    <th>$year</th>
		<th>$area_type</th>
		<th>$health_type</th>
		<th>$value</th>
	</tr>";
}

for($i=2; $i < count($csv); $i++)
{
	$line = $csv[$i];

	$health			= $line[0];
	$total_workers  = $line[1];
	$drove_alone  	= $line[2];
	$car_pooled  	= $line[3];
	$used_public  	= $line[4];
	$walked 		= $line[5];
	$other  		= $line[6];
	$worked_at_home = $line[7];
	$avg_travel_time= $line[8];
	$abbr     = $line[9];
	$key=$i-2;
	
	$data[$key] = array(); 
	             
	$data[$key]['health'] 			= $health;
	$data[$key]['total_workers'] 	= $total_workers;
	$data[$key]['drove_alone'] 		= $drove_alone;
	$data[$key]['car_pooled'] 		= $car_pooled;
	$data[$key]['used_public'] 		= $used_public;
	$data[$key]['walked'] 			= $walked;
	$data[$key]['other'] 			= $other;
	$data[$key]['worked_at_home'] 	= $worked_at_home;
	$data[$key]['avg_travel_time'] 	= $avg_travel_time;
	$data[$key]['abbr'] 				= $abbr;
	
	$html_data .= "<tr>
		<td>$health</td>
		<td>$abbr</td>
		<td>$total_workers</td>
		<td>$drove_alone</td>
		<td>$car_pooled</td>
		<td>$used_public</td>
		<td>$walked</td>
		<td>$other</td>
		<td>$worked_at_home</td>
		<td>$avg_travel_time</td>
	</tr>";
}
*/
?>
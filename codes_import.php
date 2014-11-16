
<?php

$csv = array_map('str_getcsv', file('codes.csv')); // import the CSV world codes

$codes_array = array();			// go from 2 letter code to 3 letter codes
$single_codes_array = array();  // single list of 2 letter codes

$two_to_three_iso = array(); // go from 2 letter code back to 3 letter iso codes

for($i=0; $i < count($csv); $i++)  // make the three letter code the array key for the two letter code (ISO)
{
	$line = $csv[$i];

	$codes_array[ $line[0] ] = $line[1];
	
	$single_codes_array[ $i ] = $line[1];
	
	$two_to_three_iso[ $line[1] ] = $line[0];
}

//print_r($codes_array);

?>


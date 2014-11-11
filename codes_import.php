
<?php

$csv = array_map('str_getcsv', file('codes.csv')); // import the CSV world codes

$codes_array = array();

for($i=0; $i < count($csv); $i++)  // make the three letter code the array key for the two letter code (ISO)
{
	$line = $csv[$i];

	$codes_array[ $line[0] ] = $line[1];
}

//print_r($codes_array);

?>


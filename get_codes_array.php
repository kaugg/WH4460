<?php

// Export all of the codes as JSON
header('Content-Type: application/json');

include('codes_import.php');

echo(json_encode($single_codes_array));

?>


<?php

echo "totoo je index";
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
include_once ("Database.php");
$databaza = new Database();
$conn = $databaza->vytvorSpojenie();
var_dump($conn);

?>

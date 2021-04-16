<?php
// required headers
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include ("../../Database.php");
include ("../../modely/Dni.php");

$databaza = new Database();
$db = $databaza->vytvorSpojenie();

// initialize object
$dni = new Dni($db);

// query products
$vsetkyDni = $dni->getVsetkyDni();
http_response_code(200);
echo json_encode($vsetkyDni);

<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include("../../Database.php");
include("../../modely/Mena.php");

$database = new Database();
$db = $database->vytvorSpojenie();

$product = new Mena($db);

// get posted data
$data = json_decode(file_get_contents("php://input"),true);
var_dump($data);
// make sure data is not empty
if(
!empty($data->meno) &&
!empty($data->den) &&
!empty($data->mesiac)
){
 var_dump($data);
// set product property values
$product->meno = $data->meno;
$product->den = (int)$data->den;
$product->mesiac = (int)$data->mesiac;
$product->idKrajina = 2;


// create the product
if($product->vytvorMeno()){

// set response code - 201 created
http_response_code(201);

// tell the user
echo json_encode(array("message" => "Product was created."));
}

// if unable to create the product, tell the user
else{

// set response code - 503 service unavailable
http_response_code(503);

// tell the user
echo json_encode(array("message" => "Unable to create product."));
}
}

// tell the user data is incomplete
else{

// set response code - 400 bad request
http_response_code(400);

// tell the user
echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>
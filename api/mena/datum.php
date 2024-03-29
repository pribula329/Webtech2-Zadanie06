<?php


// required headers
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include("../../Database.php");
include("../../modely/Mena.php");

$databaza = new Database();
$db = $databaza->vytvorSpojenie();

// initialize object
$mena = new Mena($db);

// query products
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') {

    if (isset($_GET['meno']) && !empty($_GET['meno']) && isset($_GET['krajina'])){
        $meno= $_GET['meno'];
        $krajina = $_GET['krajina'];
        $stmt = $mena->getDatum($meno,$krajina);
        $num = $stmt->rowCount();
    }


    // check if more than 0 record found
    if ($num > 0) {

        // products array
        $products_arr = array();
        $products_arr["records"] = array();

        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);

            $product_item = array(
                "id" => $id,
                "den" => $den,
                "mesiac" => $mesiac,
                "idKrajina" => $idKrajina,
                "meno" => $meno
            );

            array_push($products_arr["records"], $product_item);
        }

        // set response code - 200 OK
        http_response_code(200);

        // show products data in json format
        echo json_encode($products_arr);
        return json_encode($products_arr);
    } else {

        // set response code - 404 Not found
        http_response_code(404);

        // tell the user no products found
        echo json_encode(
            array("message" => "No products found.")
        );
    }
}



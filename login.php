<?php

function pokusLogin()
{

    include_once("../config.php");

    try {
        $conn = new PDO("mysql:host=$servername;dbname=dbPribulikZadanie06", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;


}
function db(){
    include_once("../config.php");
    $db = mysqli_connect($servername, $username, $password, 'dbPribulikZadanie06');
    return $db;
}

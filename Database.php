<?php

class Database{

public $conn;

public function vytvorSpojenie(){
    $conn=null;
    include("../config.php");
    try {
        $conn = new PDO("mysql:host=$servername;dbname=dbPribulikZadanie06", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn=$conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }



    return $this->conn;

}

}

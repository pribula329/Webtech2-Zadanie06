<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
class Dni{

    private $conn;
    private $table_name = "dni";
    public $id;
    public $den;
    public $mesiac;

    /**
     * Dni constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getVsetkyDni(){
        // select all query
        $query = 'SELECT * FROM ' . $this->table_name .';';

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;

    }



}
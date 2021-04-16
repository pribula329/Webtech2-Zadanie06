<?php

class Mena{

    private $conn;
    private $table_name = "mena";
    public $id;
    public $den;
    public $mesiac;
    public $idKrajina;
    public $meno;
    /**
     * Dni constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getMenaOslavencou($den,$mesiac){
        // select all query
        $query = 'select mena.id,dni.den,dni.mesiac, mena.idKrajina,mena.meno from mena 
                left join dni on mena.idDen = dni.id where dni.den='.$den.' and dni.mesiac='.$mesiac.';';
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    public function getDatum($meno,$krajina){
        // select all query
        $query1 = 'select krajiny.id from krajiny where nazov_krajiny='.$krajina.' limit 1;';
        // prepare query statement
        $stmt1 = $this->conn->prepare($query1);

        // execute query
        $stmt1->execute();
        $id = $stmt1->fetch(PDO::FETCH_ASSOC);

        $query = 'select mena.id, mena.idKrajina,mena.meno from mena where meno='.$meno.' and idKrajina='.$id['id'].';';
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

}
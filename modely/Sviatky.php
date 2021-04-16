<?php
class Sviatky{
    private $conn;
    private $table_name = "sviatky";
    public $id;
    public $den;
    public $mesiac;
    public $idKrajina;
    public $nazovSviatku;

    /**
     * Dni constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getVsetkySviatkySK(){
        // select all query
        $query = 'select sviatky.id,dni.den,dni.mesiac, sviatky.idKrajina, sviatky.nazovSviatku from sviatky left join dni on sviatky.idDen = dni.id where idKrajina=1;';
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;

    }
    public function getVsetkySviatkyCZ(){
// select all query
        $query = 'select sviatky.id,dni.den,dni.mesiac, sviatky.idKrajina, sviatky.nazovSviatku from sviatky left join dni on sviatky.idDen = dni.id where idKrajina=3;';


        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

}
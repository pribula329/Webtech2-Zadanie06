<?php

class PamatneDni{
    private $conn;
    private $table_name = "pamatneDni";
    public $id;
    public $den;
    public $mesiac;
    public $idKrajina;
    public $pamatnyDen;

    /**
     * Dni constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getVsetkyPamatneDni(){
// select all query
        $query = 'select pamatneDni.id,dni.den,dni.mesiac, pamatneDni.idKrajina, pamatneDni.pamatnyDen from pamatneDni left join dni on pamatneDni.idDen = dni.id;';


        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }


}
<?php

class Dni{

    private $conn;

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
        $stm = $this->conn->prepare("select * from dni ");
        $stm->execute();
        $pole = $stm->fetchAll(PDO::FETCH_CLASS,"Dni");

        return $pole;

    }

    public function getJedenDen(){

    }

}
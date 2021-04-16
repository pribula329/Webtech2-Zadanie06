<?php

class Mena{

    private $conn;
    private $table_name = "mena";
    public $id;
    public $idDen;
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
}
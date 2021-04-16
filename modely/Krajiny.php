<?php

class Krajiny{

    private $conn;
    private $table_name = "krajiny";
    public $id;
    public $nazovKrajiny;

    /**
     * Dni constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

}
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

        $query = 'select mena.id,dni.den,dni.mesiac, mena.idKrajina,mena.meno from mena left join dni on mena.idDen = dni.id where meno='.'"'.$meno.'"'.' and idKrajina='.$krajina.';';
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function vytvorMeno(){

        // select all query
        $query = 'SELECT id FROM dni WHERE den='.$this->den.' AND mesiac='.$this->mesiac.';';

        // prepare query statement
        $stm = $this->conn->prepare($query);

        // execute query
        $stm->execute();
        $konstanta = $stm->fetch(PDO::FETCH_ASSOC);

        if ($konstanta!=false){
            $id = $konstanta['id'];
            echo $id;
        }
        else{
            return false;
        }


        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                meno=:meno, idDen=:idDen, idKrajina=:idKrajina";

        // prepare query
        $stmt = $this->conn->prepare($query);

        $this->meno=htmlspecialchars(strip_tags($this->meno));


        // bind values
        $stmt->bindParam(":meno", $this->meno);
        $stmt->bindParam(":idDen", $id);
        $stmt->bindParam(":idKrajina",$this->idKrajina);


        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }

}
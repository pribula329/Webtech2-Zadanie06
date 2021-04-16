<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
include_once "login.php";
$db = db();
$xml=simplexml_load_file("meniny.xml");
createIfNotExist("SK",$db);
createIfNotExist("SKd",$db);
createIfNotExist("CZ",$db);
createIfNotExist("HU",$db);
createIfNotExist("PL",$db);
createIfNotExist("AT",$db);
foreach($xml->children() as $child)
{
    // Parsovanie dní :
    $day = (int)substr($child->den, -2);
    $month = (int)substr($child->den, -4,2);
    $day_query = "SELECT * FROM dni WHERE den='$day' AND mesiac='$month' ";
    $result = mysqli_query($db, $day_query);
    $row_cnt = $result->num_rows;
    if($row_cnt == 0){
        $day_query = "INSERT INTO dni (den,mesiac) 
  			  VALUES('$day', '$month')";
        mysqli_query($db, $day_query);
    }
    $day_id = "SELECT * FROM dni WHERE den='$day' AND mesiac='$month'  LIMIT 1";
    $day_id = mysqli_query($db, $day_id);
    $day_id = mysqli_fetch_assoc($day_id)["id"];
    // Ostatné parsovanie :
    $names = explode ( "," ,  $child->SK );
    foreach ($names as $name){
        $country_id = giveCountryId("SK",$db);
        $name_query = "SELECT * FROM mena WHERE meno='$name' AND idKrajina='$country_id' AND idDen='$day_id' ";
        $result = mysqli_query($db, $name_query);
        $row_cnt = $result->num_rows;
        if($row_cnt == 0 && $name!=""){
            $name=trim($name);
            $name_query = "INSERT INTO mena (idDen,idKrajina,meno) 
  			  VALUES('$day_id', '$country_id','$name')";
            mysqli_query($db, $name_query);
        }
    }
    $memorable_days = explode ( "," ,  $child->SKdni );
    foreach ($memorable_days as $memorable_day){
        $country_id = giveCountryId("SK",$db);
        $memorable_day_query = "SELECT * FROM pamatneDni WHERE pamatnyden='$memorable_day' AND idKrajina='$country_id' AND idDen='$day_id' ";
        $result = mysqli_query($db, $memorable_day_query);
        $row_cnt = $result->num_rows;
        if($row_cnt == 0 && $memorable_day!=""){
            $memorable_day_query = "INSERT INTO pamatneDni (idDen,idKrajina,pamatnyDen) 
  			  VALUES('$day_id', '$country_id','$memorable_day')";
            mysqli_query($db, $memorable_day_query);
        }
    }
    $names = explode ( "," ,  $child->SKd );
    foreach ($names as $name){
        $country_id = giveCountryId("SKd",$db);
        $name_query = "SELECT * FROM mena WHERE meno='$name' AND idKrajina='$country_id' AND idDen='$day_id' ";
        $result = mysqli_query($db, $name_query);
        $row_cnt = $result->num_rows;
        if($row_cnt == 0 && $name!=""){
            $name=trim($name);
            $name_query = "INSERT INTO mena (idDen,idKrajina,meno) 
  			  VALUES('$day_id', '$country_id','$name')";
            mysqli_query($db, $name_query);
        }
    }
    $holidays = explode ( "," , $child->SKsviatky );
    foreach ($holidays as $holiday){
        $country_id = giveCountryId("SK",$db);
        $holiday_query = "SELECT * FROM sviatky WHERE nazovSviatku='$holiday' AND idKrajina='$country_id' AND idDen='$day_id' ";
        $result = mysqli_query($db, $holiday_query);
        $row_cnt = $result->num_rows;
        if($row_cnt == 0 && $holiday!=""){

            $holiday_query = "INSERT INTO sviatky (idDen,idKrajina,nazovSviatku) 
  			  VALUES('$day_id', '$country_id','$holiday')";
            mysqli_query($db, $holiday_query);
        }
    }
    $names = explode ( "," ,  $child->CZ );
    foreach ($names as $name){
        $country_id = giveCountryId("CZ",$db);
        $name_query = "SELECT * FROM mena WHERE meno='$name' AND idKrajina='$country_id' AND idDen='$day_id' ";
        $result = mysqli_query($db, $name_query);
        $row_cnt = $result->num_rows;
        if($row_cnt == 0 && $name!=""){
            $name=trim($name);
            $name_query = "INSERT INTO mena (idDen,idKrajina,meno) 
  			  VALUES('$day_id', '$country_id','$name')";
            mysqli_query($db, $name_query);
        }
    }
    $holidays = explode ( "," , $country = $child->CZsviatky );
    foreach ($holidays as $holiday){
        $country_id = giveCountryId("CZ",$db);
        $holiday_query = "SELECT * FROM sviatky WHERE nazovSviatku='$holiday' AND idKrajina='$country_id' AND idDen='$day_id' ";
        $result = mysqli_query($db, $holiday_query);
        $row_cnt = $result->num_rows;
        if($row_cnt == 0 && $holiday!=""){
            $holiday_query = "INSERT INTO sviatky (idDen,idKrajina,nazovSviatku) 
  			  VALUES('$day_id', '$country_id','$holiday')";
            mysqli_query($db, $holiday_query);
        }
    }
    $names = explode ( "," ,  $child->HU );
    foreach ($names as $name){
        $country_id = giveCountryId("HU",$db);
        $name_query = "SELECT * FROM mena WHERE meno='$name' AND idKrajina='$country_id' AND idDen='$day_id' ";
        $result = mysqli_query($db, $name_query);
        $row_cnt = $result->num_rows;
        if($row_cnt == 0 && $name!=""){
            $name=trim($name);
            $name_query = "INSERT INTO mena (idDen,idKrajina,meno) 
  			  VALUES('$day_id', '$country_id','$name')";
            mysqli_query($db, $name_query);
        }
    }
    $names = explode ( "," ,  $child->PL );
    foreach ($names as $name){
        $country_id = giveCountryId("PL",$db);
        $name_query = "SELECT * FROM mena WHERE meno='$name' AND idKrajina='$country_id' AND idDen='$day_id' ";
        $result = mysqli_query($db, $name_query);
        $row_cnt = $result->num_rows;
        if($row_cnt == 0 && $name!=""){
            $name=trim($name);
            $name_query = "INSERT INTO mena (idDen,idKrajina,meno) 
  			  VALUES('$day_id', '$country_id','$name')";
            mysqli_query($db, $name_query);
        }
    }
    $names = explode ( "," ,  $child->AT );
    foreach ($names as $name){
        $country_id = giveCountryId("AT",$db);
        $name_query = "SELECT * FROM mena WHERE meno='$name' AND idKrajina='$country_id' AND idDen='$day_id' ";
        $result = mysqli_query($db, $name_query);
        $row_cnt = $result->num_rows;
        if($row_cnt == 0 && $name!=""){
            $name=trim($name);
            $name_query = "INSERT INTO mena (idDen,idKrajina,meno) 
  			  VALUES('$day_id', '$country_id','$name')";
            mysqli_query($db, $name_query);
        }
    }

}
function giveCountryId($country,$db){
    $country_id = "SELECT * FROM krajiny WHERE nazov_krajiny='$country'  LIMIT 1";
    $country_id = mysqli_query($db, $country_id);
    $country_id = mysqli_fetch_assoc($country_id)["id"];
    return $country_id;
}
function createIfNotExist($countryName,$db){
    $country = "SELECT * FROM krajiny WHERE nazov_krajiny='$countryName'  LIMIT 1";
    $country = mysqli_query($db, $country);
    $row_cnt = $country->num_rows;
    if($row_cnt==0){

        $country_query = "INSERT INTO krajiny (nazov_krajiny)  VALUES('$countryName')";
        mysqli_query($db, $country_query);
    }
}
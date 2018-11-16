<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['property_id'])){
    $propertyid= trim(htmlspecialchars($_POST['property_id']));
    if(checkNum($propertyid)){
        require_once './database.php';
        require_once './property.php';
        $property->setDataBase($database);
        $property->setId($propertyid);
        if($property->checkExist()){
            require_once './session.php';
            $property->setInteresteduserId($session->getUserId());
            $property->setInterested();
        }
        else{
            echo "0";
        }
    }
    else{
        echo "0";
    }
    }
}

function checkNum($value) {
   $arr = str_split($value);
   for ($i = 0; $i < count($arr); $i++) {
        $as = ord($arr[$i]); #ord() Return the ASCII value of character
        if($as<48 || $as>57)return false;
    }
    return true;  
}
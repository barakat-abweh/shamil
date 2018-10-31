<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['country_id'])){
        $country_id= trim(htmlspecialchars($_POST['country_id']));
        if(is_numeric($country_id)&&strlen($country_id)<=11){
            require_once './database.php';
            $country_id=$database->escape($country_id);
            $query="SELECT `city_id`,`city_name` FROM `city` WHERE country_id=$country_id";
            $result=$database->query($query);
            if(gettext($result)==NULL){
                echo '0';
            }
            $finalResult="";
            while($res=$database->fetchArray($result)){
                $finalResult.="<option id='".$res['city_id']."'>".$res['city_name']."</option>";
            }
            echo $finalResult;
        }
        else {
            echo '0';
        }
    }
}
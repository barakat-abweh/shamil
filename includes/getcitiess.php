<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
            require_once './session.php';
            require_once './users.php';
            require_once './database.php';
            $user->setDataBase($database);
            $user->setId($session->getUserId());
            $country_id=$user->getCountryId();
            $query="SELECT `city_id`,`city_name` FROM `city` WHERE country_id=$country_id";
            $result=$database->query($query);
            $finalResult="";
            while($res=$database->fetchArray($result)){
                $finalResult.="<option id='".$res['city_id']."'>".$res['city_name']."</option>";
            }
            echo $finalResult;
}
else{
    echo "0";
}
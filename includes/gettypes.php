<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
            require_once './database.php';
            $query="SELECT `type_id`, `type_name` FROM `property_type`";
            $result=$database->query($query);
            $finalResult="";
            while($res=$database->fetchArray($result)){
                $finalResult.="<option id='".$res['type_id']."'>".$res['type_name']."</option>";
            }
            echo $finalResult;
}
else{
    echo "0";
}
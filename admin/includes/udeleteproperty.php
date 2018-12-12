<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['id'])){
        require_once '../../includes/database.php';
        $id=$database->escape(trim(htmlspecialchars($_POST['id'])));
       $query="UPDATE `property` SET `deleted`=0 WHERE `property_id`=$id";
       $database->query($query);
    }
}

?>
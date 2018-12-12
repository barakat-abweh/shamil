<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['id'])&&isset($_POST['action'])){
        require_once '../../includes/database.php';
        $id=$database->escape(trim(htmlspecialchars($_POST['id'])));
        $action=$database->escape(trim(htmlspecialchars($_POST['action'])));
        if($action=="1"){
            
        }
        else if($action=="2"){
            $database->query("UPDATE `users` SET `active`= 1 WHERE `user_id` = $id");
        }
        else if($action=="3"){
             $database->query("UPDATE `users` SET `deleted`= 1 WHERE `user_id` = $id");
        }
        else if($action=="4"){
             $database->query("UPDATE `users` SET `active`= 0 WHERE `user_id` = $id");
        }
        $finRes.="</tbody>";
        echo $finRes;
    }
}

?>
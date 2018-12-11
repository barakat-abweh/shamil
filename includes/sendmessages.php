<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor. barakat_abweh
 */
if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['id'])){
        require_once './database.php';
        require_once './session.php';
        $rec=$database->escape($_POST['id']);
        $sen=$database->escape($session->getUserId());
        $mes=$database->escape($_POST['mes']);
        if(strlen($mes)=="0"){
            return;
        }
        $query="INSERT INTO `messages`(`sender_id`, `receiver_id`, `message`) VALUES ($sen,$rec,'$mes')";
        $database->query($query);
    }
    }
?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './session.php';
if(!$session->isLoggedIn()){
    redirect();
}
$userid=$session->getUserId();
if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['interestid'])){
        require_once './database.php';
        $id=$database->escape(trim(htmlspecialchars($_POST['interestid'])));
        $query="SELECT `property_owner_id` FROM `interested` WHERE `interest_id` = $id";
        $res=$database->query($query);
        $res=$database->fetchArray($res);
        $owner=$res['property_owner_id'];
        if($owner==$session->getUserId()){
            $query="SELECT `interested_user_id` FROM `interested` WHERE `interest_id` = $id";
            $res=$database->query($query);
            $res=$database->fetchArray($res);
            $senderid=$session->getUserId();
            $receiverid=$res['interested_user_id'];
            $message="Thanks for your interest in my property, How can I help You :)";
            $query="INSERT INTO `messages`(`sender_id`, `receiver_id`, `message`) VALUES ('$senderid','$receiverid','$message')";
            $database->query($query);
        }
        else{
            redirect();
        }
}

    }
    function redirect(){
        header("Location:../public/index.php");
    }
?>
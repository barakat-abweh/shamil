<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['email'])){
        $email= trim(htmlspecialchars($_POST['email']));
        if(checkEmail($email)){
            require_once './database.php';
            $email=$database->escape($email);
            $query="SELECT `user_id` FROM `users` WHERE email='$email'";
            $result=$database->query($query);
           $result=$database->fetchArray($result);
           $result=$result['user_id'];
           if($result>=1){
               
           }
        }
    }
}

function checkEmail($email) {
    $min = 6;
    $max = 32;
    $length = strlen($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    if ($length < $min || $length > $max)
        return false;
    return true;
}
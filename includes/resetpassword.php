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
           $userid=$result['user_id'];
           if($result>=1){
            require_once './users.php';
            $token=md5(uniqid(rand(), true));
            $database->query("INSERT INTO `password_reset_request`(`user_id`, `token`, `creation_date`, `expiry_date`) VALUES ($userid,'$token',CURRENT_DATE,NOW() + INTERVAL 1 DAY)");
            $link="<a href='".$_SERVER['SERVER_NAME']."/baraa/public/resetpassword.php?token=".$token."'>Reset Password</a>";
            $to=$email;
            $subject="SHAMIL Password Reset";
            $from = 'info@shamil.com';
            $body='Hi, <br/> <br/>You have requested to reset your shamil\'s password,<br><br>Please, Click here to '.$link;
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to,$subject,$body,$headers);
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
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(htmlspecialchars($_GET['token'])){
    $token= trim(htmlspecialchars($_GET['token']));
    if(ValidMd5($token)){
        require_once '../includes/database.php';
        $token=$database->escape($token);
        $query="SELECT `request_id`, `user_id` FROM `password_reset_request` WHERE `token`='$token' AND (`expiry_date`-`creation_date`)>0";
        $result=$database->query($query);
        if($database->numRows($result)){
            ?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <label>password</label>
        <input type="password" id="pass" placeholder="passowrd"/>
        <label>password confirmation</label>
        <input type="password" id="passconf" placeholder="password confirmation"/>
    </body>
</html>
<?php
        }
        else{
            echo "The token is either wrong or has expired.<br/>You'll be redirected to the main index file in 5 seconds";
            ##echo script to redirect in java script
        }
    }
    else{redirect();}
}
else{redirect();}

function ValidMd5($md5)
{
    return preg_match('/^[a-f0-9]{32}$/', $md5);
}
function redirect(){
    header("Location: index.php");
}
?>
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
        $query="SELECT `request_id` FROM `password_reset_request` WHERE `token`='$token' AND `handled`=0 AND (`expiry_date`-`creation_date`)>0";
        echo $query;
        $result=$database->query($query);
        if($database->numRows($result)){
            ?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <form id="resetpassform" action="#" method="POST">
        <label>password</label>
        <input type="password" name="pass" id="pass" placeholder="passowrd"/>
        <label>password confirmation</label>
        <input type="password" name="passconf" id="passconf" placeholder="password confirmation"/>
        <input type="text" name="token" hidden="hidden" value="<?php echo $token;?>"/>
        </form>
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
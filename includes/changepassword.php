<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "1";
    require_once './database.php';
$pass = $database->escape(trim(htmlspecialchars($_POST['pass'])));
$confpass = $database->escape(trim(htmlspecialchars($_POST['passconf'])));
$token= $database->escape(trim(htmlspecialchars($_POST['token'])));
$query="SELECT `request_id`,`user_id` FROM `password_reset_request` WHERE `token`='$token'";
$result=$database->query($query);
if($database->numRows($result)>0){
    $result=$database->fetchArray($result);
    $userid=$result['user_id'];
    $requestid=$result['request_id'];
    if (!isEmpty($pass)) {
        if (checkPass($pass, $confpass)) {
        $pass = sha1(md5($pass));
     $query="update users set password='$pass' where user_id='$userid'";
     $database->query($query);
     $query="UPDATE `password_reset_request` SET `handled`=1 WHERE `request_id`=$requestid";
     $database->query($query);
     header("Location:../public/index.php");
        } 
        else{redirect ();}
    }
    else{
        redirect();
    }
}
else{
    redirect();
}
     }
 else {
         redirect();         
}   
    
function isEmpty($value) {
    if ($value == "")
        return true;
    else {
        $arr = str_split($value);
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] != " ") {
                return false;
            } #Considered  the spaces without any character empty field
        }
    }
    return true;
}
function checkPass($pass, $confpass) {
    if ($pass != $confpass)
        return false;
    $min = 5;
    $max = 64;
    $length = strlen($pass);
    if ($length < $min || $length > $max)
        return false;
    return true;
}
function redirect() { #redirect page
    header("Location: ../public/resetpassword.php?token=$token");
}



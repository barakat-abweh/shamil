<?php

$flag=false;
$newpass = mysql_real_escape_string($_POST['password1']);
$renewpass = mysql_real_escape_string($_POST['password2']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $pass = htmlspecialchars($newpass);
    $confpass = htmlspecialchars($renewpass);
    if (!isEmpty($pass)) {
        if (checkPass($pass, $confpass)) {
            $password = $pass;
            $flag = true;
        } else echo "passwords does not match";
    }
    
    if($flag){
       require_once('session.php');
        require_once('database.php');
        global $database;
         if($session->isLoggedIn()){
            $id=($session->getUserId());}
        $password = md5($password);
        $password = sha1($password);
     $query="update users set password='".$password."' where userid='".$id."'";   
     $database->query($query);
        echo "You have successfully changed your password."."<br> <a href='../public/MyProfile.php'>back to my profile</a>";
        
    }}
    
    
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
    header("Location: ../public/index.php");
}



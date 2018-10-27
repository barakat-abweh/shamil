<?php
$email = NULL;
$password = NULL;
$userid=NULL;
$flag1 = false;
$flag2 = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $field = htmlspecialchars($_POST['email']);
    if (!isEmtpy($field)) {
       $field=trim($field);
        if (checkEmail($field)) {    
            $email= strtolower($field);
            $flag1 = true;
        } else
            redirect();
    }

    $field = htmlspecialchars($_POST['password']);
    if (!isEmtpy($field)) {
        if (checkPass($field)) {
            $password = sha1(md5($field));
            $flag2 = true;
        } else
            redirect();
    }
}


if ($flag1 && $flag2) {
    checkIDS($email, $password);
}

function checkIDS($email,$password) {
    require_once 'users.php';
    $user->connectDatabase();
     global $userid;
     $user->setEmail($email);
     $userid=$user->getId();
     if(!isset($userid))redirect();
     $user->setId($userid);
     require_once 'session.php';
     //if user logged in again redirect to his page (home or MyProgile) 
     if($session->isLoggedIn()){redirectTo("../public/home.php");}
     $session->login($user);
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

function checkPass($pass) {
    $min = 5;
    $max = 64;
    $length = strlen($pass);
    if ($length < $min || $length > $max)
        return false;
    return true;
}

function checkNum($value) {
    $arr = str_split($value);
    for ($i = 0; $i < count($arr); $i++) {
        $as = ord($arr[$i]); #ord() Return the ASCII value of character
        if ($as < 48 || $as > 57)
            return false;
    }
    return true;
}

function isEmtpy($value) {
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

function redirect() { #redirect  page
    header("Location: ../public/index.php");
}

function redirectTo($page){#redirect  page
    header("Location: $page"); 
}

?>
<?php

require_once './session.php';
$userid;

if($session->isLoggedIn()){
    $userid=$session->getUserId();
}
else{
    redirect ();
}

if(htmlspecialchars($_SERVER['REQUEST_METHOD']=="POST")){
    require_once './database.php';
    require_once './users.php';
    $user->setDataBase($database);
    $user->setId($session->getUserId());
    $pass=$user->getPassword();
    $password= sha1(md5($_POST['password']));
    if($pass==$password){
        $user->setCountryId($user->getCountryId());
        $user->setFname(trim(htmlspecialchars($_POST['fname'])));
        $user->setLname(trim(htmlspecialchars($_POST['lname'])));
        $user->setUname(trim(htmlspecialchars($_POST['uname'])));
        $user->setEmail(trim(htmlspecialchars($_POST['email'])));
        $user->setPhone(trim(htmlspecialchars($_POST['phone1'])),trim(htmlspecialchars($_POST['phone2'])));
        $user->setCity(trim(htmlspecialchars($_POST['address'])));
        $user->editUser();
    }
    else{
        echo "0";
    }
}
function redirect(){
    header("Location:../public/property.php");
}
?>
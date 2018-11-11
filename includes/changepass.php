<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['currentpass'])&&isset($_POST['newpass'])&&isset($_POST['passconf'])){
        require_once './session.php';
        require_once './users.php';
        require_once './database.php';
        $user->setDataBase($database);
        $user->setId($session->getUserId());
        $currentpassword=$user->getPassword();
        $currentpass= sha1(md5(trim(htmlspecialchars($_POST['currentpass']))));
        if($currentpass==$currentpassword)
        {
            $pass= trim(htmlspecialchars($_POST['newpass']));
            $passconf= trim(htmlspecialchars($_POST['passconf']));
            if(checkPass($pass)&&$pass=$passconf){
                $user->setPassword($pass);
                $user->changePassword();
                $session->logout();
                redirect();
            }
            else{
                redirect();   
            }
        }
        else{
            redirect();
        }
    }
    else{
        redirect();
    }
}
else{
    redirect();
}
function redirect(){
    header("Location: ../public/profile.php");
}

function checkPass($pass) {
    $min = 5;
    $max = 64;
    $length = strlen($pass);
    if ($length < $min || $length > $max)
        return false;
    return true;
}
?>
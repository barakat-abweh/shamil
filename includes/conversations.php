<?php
require_once './session.php';
if(!$session->isLoggedIn()){
    redirect();
}
$userid=$session->getUserId();
if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['init'])){
        require_once './database.php';
        require_once './users.php';
        $user->setDataBase($database);
        $user->setId($userid);
        $init= trim(htmlspecialchars($_POST['init']));
        if($init=="0"){
         echo $user->getConversations();
        }
    else{
        redirect();
    }
        echo $result;
    }
}
function redirect(){
    header("Location:../public/index.php");
}
?>
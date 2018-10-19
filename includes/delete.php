<?php   

if ($_SERVER['REQUEST_METHOD']=='GET'){
    require_once 'good.php';
    require_once 'session.php';
 require_once 'good.php';
   $good->connectDatabase();
   if(isset($_GET['id']) && $session->isLoggedIn()){
$id=htmlspecialchars($_GET['id']);
   $good->setId($id);
if($good->getUserId()===$session->getUserId()){
   $good->deleteGood();
}
   
   }
}
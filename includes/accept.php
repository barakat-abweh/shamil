<?php
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['id']) && isset($_GET['r'])) {
        require_once 'database.php';
        require_once 'users.php';
        require_once 'good.php';
        require_once 'reservation.php';
        require_once 'session.php';
        $id=htmlspecialchars($_GET['id']);
        $r=htmlspecialchars($_GET['r']);
        $isAllowed=true;$userid=0;
       $reservation->setDatabase($database);
       $reservation->setId($id);
       
       if(!$session->isLoggedIn()){$isAllowed=false;}
       if($reservation->getImporterId2()!=$session->getUserId()){$isAllowed=false;}
       if($reservation->getAccepted()!=0){$isAllowed=false;}
       if($isAllowed){
       if($r==1)$reservation->setAccepted();
        if($r==-1)$reservation->setRefused();
       }


    }
    
    
}
<?php
require_once 'session.php';
require_once 'database.php';
require_once 'NotifMore.php';
if ($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['start']) && isset($_GET['end'])&& $session->isLoggedIn()){
      $id=$session->getUserId();
      $start=  htmlspecialchars($_GET['start']);
      $end= htmlspecialchars($_GET['end']);
      getNotific($start,$end,$id,$database);
        
    }




}
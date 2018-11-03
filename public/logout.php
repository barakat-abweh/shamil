<?php
require_once '../includes/session.php';
if(isset($session)){
$session->logout();
    header('Location: index.php');
}
else{
  header('Location: index.php');  
}
?>
<?php 
$property_id;
$name;
$type;
$price;
$city;
$description;
$area;
$flag1 = FALSE;
$flag2 = FALSE;
$flag3 = FALSE;
$flag4 = FALSE;
$flag5 = FALSE;
$flag6= FALSE;
$flag7 = FALSE;
$flag8 = FALSE;
require_once 'session.php';
$userid;
if($session->isLoggedIn()){$userid=$session->getUserId();
}
        else    redirect ();
if(htmlspecialchars($_SERVER['REQUEST_METHOD']=="POST")){
}
?>
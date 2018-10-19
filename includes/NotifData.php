
<?php
error_reporting(0);
#connect to database
require_once 'reservation.php';
require_once 'database.php';
require_once 'users.php';
require_once 'good.php';
require_once 'functions.php';
require_once 'session.php';
$id=htmlspecialchars($_GET['id']);
$isAllowed=true;$userid=0;
$reservation->setDatabase($database);
$user->setDatabase($database);
$good->setDatabase($database);
$reservation->setId($id);
$importerid=$reservation->getImporterId2();
if(!$session->isLoggedIn()){$isAllowed=false;}
else {$userid=$session->getUserId();}
if((!checkNum($id) ||  $importerid!==$userid)){$isAllowed=false;}


if($isAllowed){

#get information

$user->setId($reservation->getTraderId2());
$goodid=$reservation->getGoodId2();
$good->setId($goodid);
$goodName=$good->getName();
$trader=$user->getFname()." ".$user->getLname();
$traderid=$reservation->getTraderId2();
$quantity=$reservation->getQuantity();
$date=$reservation->getDealDate();
 $array=array("reserveid"=>$id,"goodid"=>$goodid,"traderid"=>$traderid,"trader"=>$trader,"importerid"=>$reservation->getImporterId2(),"good"=>$goodName,"quantity"=>$quantity,"date"=>$date);
echo json_encode($array);
}


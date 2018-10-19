<?php

/*
  send
if(newInfo())retur response
else wait

after wait return to condition

 */

 header("Cache-Control: no-cache, must-revalidate");
$lastProcess=htmlspecialchars($_GET['id']);
require_once 'reservation.php';
#flush();



require_once 'database.php';
require_once 'session.php';
if($session->isLoggedin()){
$id=$session->getUserId();
$reservation->setDatabase($database);
$reservation->setImporterId($id);
$reserveid=$reservation->getIdNotification();

if($lastProcess==0)echo json_encode($reserveid);
else{
    $c=0;
   # echo $lastProcess."<br>";echo $reserveid[0];
    while($lastProcess>=$reserveid[0]){
        if($c>=11)break;
    $reserveid=$reservation->getIdNotification();
     sleep(1);$c++;
     
    }
  if($reserveid[0]>$lastProcess)echo json_encode($reserveid);
else {
echo null;
}
//
}


}

<?php
 header("Cache-Control: no-cache, must-revalidate");
 
require_once 'reservation.php';
#flush();
usleep(300000);


require_once 'database.php';
require_once 'session.php';
if($session->isLoggedin()){
$id=$session->getUserId();
@$reservation->setDatabase($database);
@$reservation->setImporterId($id);
//echo json_encode($reservation->getIdNotification());
echo $reservation->getIdNotification2();
}

<?php 

require_once 'reservation.php';
require_once 'database.php';
$reservation->setDatabase($database);
$reservation->setImporterId(123456732);
echo json_encode($reservation->getIdNotification());


?>

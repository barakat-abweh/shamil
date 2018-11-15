<?php   

if (htmlspecialchars($_SERVER['REQUEST_METHOD'])=='POST'){
    require_once './property.php';
    require_once './database.php';
    require_once './session.php';
   $property->setDatabase($database);
   if(isset($_POST['property_id']) && $session->isLoggedIn()){
$property_id= trim(htmlspecialchars($_POST['property_id']));
   $property->setId($property_id);
   echo $property->getOwnerId()." : ".$session->getUserId();
if($property->getOwnerId()===$session->getUserId()){
    echo "6";
  $property->deleteProperty();
  echo "7";
}
   }
}
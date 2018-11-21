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
$flag6 = FALSE;
$flag7 = FALSE;
$flag8 = FALSE;

require_once './session.php';
$userid;

if($session->isLoggedIn()){
    $userid=$session->getUserId();
}
else{
    redirect ();
    
}
//type,area,price
if(htmlspecialchars($_SERVER['REQUEST_METHOD']=="POST")){
    require_once './database.php';
    require_once './property.php';
    $property->setDataBase($database);
    $property->setId(trim(htmlspecialchars($_POST['property_id'])));
    $ownerid=$property->getOwnerId();
    $owner=$session->getUserId();
    if($ownerid==$owner){
        $property->setName(trim(htmlspecialchars($_POST['name'])));
        $property->setDescription(trim(htmlspecialchars($_POST['description'])));
        $property->setCity(trim(htmlspecialchars($_POST['address'])));
        $property->setType(trim(htmlspecialchars($_POST['type'])));
        $property->setArea(trim(htmlspecialchars($_POST['area'])));
        $property->setPrice(trim(htmlspecialchars($_POST['price'])));
        $property->editProperty();
    }
    else{
        echo "0";
    }
}
function redirect(){
    header("Location:../public/property.php");
}
?>
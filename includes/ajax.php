<?php

if ($_SERVER['REQUEST_METHOD']=='GET'){
    require_once 'good.php';
    require_once 'session.php';
   $good->connectDatabase();
   if(isset($_GET['id']) && $session->isLoggedIn() && checkNum($_GET['id'])){
       $id=htmlspecialchars($_GET['id']);
   $good->setId($id);
   $good->setUserId($good->getUserId());
   $array=array("id"=>$good->getId(),"name"=>$good->getName(),"type"=>$good->getType(),"price"=>$good->getPrice(),"offer"=>$good->getOffers()
           ,"userid"=>$good->getUserId(),"date"=>$good->getC_date(),"more"=>$good->getMoreDelts(),"type"=>$good->getType(),"quantity"=>$good->getQuantity()
           ,"qrcode"=>$good->getQrcode(),"img1"=>$good->getImg(1),"img2"=>$good->getImg(2),"img3"=>$good->getImg(3),"img4"=>$good->getImg(4));
   $good->closeConnection();
  echo json_encode($array);
   }
     
 
}

function checkNum($value) {
    $arr = str_split($value);
    for ($i = 0; $i < count($arr); $i++) {
        $as = ord($arr[$i]); #ord() Return the ASCII value of character
        if ($as < 48 || $as > 57)
            return false;
    }
    return true;
}


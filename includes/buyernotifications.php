<?php
require_once './session.php';
if(!$session->isLoggedIn()){
    redirect();
}
$userid=$session->getUserId();
if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['lastinterestid'])){
        require_once './database.php';
        require_once './users.php';
        require_once './property.php';
        $user->setDataBase($database);
        $property->setDataBase($database);
        $user->setId($userid);
        $id=$database->escape(trim(htmlspecialchars($_POST['lastinterestid'])));
        if($id=="0"){
         $query="SELECT `property_owner_id`,`Date`, `property_id`, `accepted`, `canceled` FROM `interested` WHERE `interested_user_id`='$userid' AND interest_id >= $id ORDER BY `Date` DESC";
                $Result=$database->query($query);
                while($res=$database->fetchArray($Result)){
               $user->setId($res['property_owner_id']);
               $property->setId($res['property_id']);
               $canceled="Not Defined";
               $accorrej="Not Defined";
               if($res['canceled']=="1"){
                   $canceled="canceled";
               }else{
                   if($res['accepted']=="1"){
                       $accorrej="Accepted";
                   }
                   else if($res['accepted']=="2"){
                       $accorrej="Rejected";
                   }
               }
                $result.="<tr><td>".$property->getName()."</td><td>".$property->getType()."</td><td><a href='profile.php?user_id='".$res['interested_user_id']."'>".$user->getUname()."</a></td><td>".$res['Date']."</td><td>$accorrej</td><td>$canceled</td>"."</tr>";
                $query="UPDATE `interested` SET `seen1`= 1 WHERE `interest_id`=".$res['interest_id'];       
                $database->query($query);
                }
        }
    else if($id=="1"){
                 $query="SELECT `property_owner_id`,`Date`, `property_id`, `accepted`, `canceled` FROM `interested` WHERE `interested_user_id`='$userid' AND interest_id >= $id AND `seen1` = 0 ORDER BY `Date` DESC";
              $Result=$database->query($query);
while($res=$database->fetchArray($Result)){
               $user->setId($res['property_owner_id']);
               $property->setId($res['property_id']);
               $canceled="Not Defined";
               $accorrej="Not Defined";
               if($res['canceled']=="1"){
                   $canceled="canceled";
               }else{
                   if($res['accepted']=="1"){
                       $accorrej="Accepted";
                   }
                   else if($res['accepted']=="2"){
                       $accorrej="Rejected";
                   }
               }
                $result.="<tr><td>".$property->getName()."</td><td>".$property->getType()."</td><td><a href='profile.php?user_id='".$res['interested_user_id']."'>".$user->getUname()."</a></td><td>".$res['Date']."</td><td>$accorrej</td><td>$canceled</td>"."</tr>";
                $query="UPDATE `interested` SET `seen1`= 1 WHERE `interest_id`=".$res['interest_id'];       
                $database->query($query);
                }
    }else{
            redirect();
        }
        echo $result;
    }
}
function redirect(){
    header("Location:../public/index.php");
}
?>
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
               $user->setId($res['interested_user_id']);
               $property->setId($res['property_id']);
                $result.="<tr><td>".$property->getName()."</td><td>".$property->getType()."</td><td><a href='profile.php?user_id='".$res['interested_user_id']."'>".$user->getUname()."</a></td><td>".$res['Date']."</td><td><button id='accept' onclick=\"accept('".$res['interest_id']."');\">Accept!</button></td><td><button id='reject' onclick=\"reject('".$res['interest_id']."');\">Reject!</button></td><td><button id='init' onclick=\"inimessage('".$res['interest_id']."');\">Send Initial Message!</button></td>"."</tr>";
                $query="UPDATE `interested` SET `seen1`= 1 WHERE `interest_id`=".$res['interest_id'];       
                $database->query($query);
                }
        }
    else if($id=="1"){
        $query="SELECT `interest_id`, `interested_user_id`,`Date`, `property_id` FROM `interested` WHERE `property_owner_id`='$userid' AND `accepted` = 0 AND `canceled` = 0 AND interest_id >= $id AND `seen1` = 0 ORDER BY `Date` DESC";
                $Result=$database->query($query);
                while($res=$database->fetchArray($Result)){
               $user->setId($res['interested_user_id']);
               $property->setId($res['property_id']);
                $result.="<tr><td>".$property->getName()."</td><td>".$property->getType()."</td><td><a href='profile.php?user_id='".$res['interested_user_id']."'>".$user->getUname()."</a></td><td>".$res['Date']."</td><td><button id='accept' onclick=\"accept('".$res['interest_id']."');\">Accept!</button></td><td><button id='reject' onclick=\"reject('".$res['interest_id']."');\">Reject!</button></td><td><button id='init' onclick=\"inimessage('".$res['interest_id']."');\">Send Initial Message!</button></td>"."</tr>";
                $query="UPDATE `interested` SET `seen`= 1 WHERE `interest_id`=".$res['interest_id'];       
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
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
        $result="<thead><tr>";
        $id=$database->escape(trim(htmlspecialchars($_POST['lastinterestid'])));
        if($id=="0"){
            if($user->getType()=='0'){
                $result.="<th>Property Name</th>
                            <th>Property Type</th>
                            <th>Interested User</th>
                            <th>Date</th>
                            <th>Accept</th>
                            <th>Reject</th>
                            <th>Initial Message</th>
                          </tr>
                        </thead><tbody id='notificationbody'>";
                $query="SELECT `interest_id`, `interested_user_id`,`Date`, `property_id` FROM `interested` WHERE `property_owner_id`='$userid' AND `accepted` = 0 AND `canceled` = 0 AND interest_id >= $id ORDER BY `Date` DESC";
                $Result=$database->query($query);
            while($Result=$database->fetchArray($Result)){
                $user->setId($Result['interested_user_id']);
               $property->setId($Result['property_id']);
                $result.="<tr><td>".$property->getName()."</td><td>".$property->getType()."</td><td><a href='profile.php?user_id='".$Result['interested_user_id']."'>".$user->getUname()."</a></td>".$Result['Date']."<td><button id='accept' onclick=\"accept('".$Result['interest_id']."');\">Accept!</button></td><td><button id='reject' onclick=\"reject('".$Result['interest_id']."');\">Reject!</button></td>"."</tr>";
            }
            $result.="</tbody>";
            echo $result;
            }
            else{
               $result.="<th>Property Name</th>
                            <th>Property Type</th>
                            <th>Owner</th>
                            <th>Date</th>
                            <th>Accepted</th>
                            <th>Rejected</th>
                          </tr>
                        </thead>"; 
            }
        }
        else if($id>=1){
            
        }
        else{
            redirect();
        }
    }
}
function redirect(){
    header("Location:../public/location.php");
}
?>
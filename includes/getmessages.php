<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor. barakat_abweh
 */
if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['id'])){
        require_once './database.php';
        require_once './session.php';
        $id=$database->escape($_POST['id']);
        $myid=$database->escape($session->getUserId());
        $query="SELECT `message_id`, `sender_id`, `receiver_id`, `message_date`, `message` FROM `messages` WHERE (`sender_id` = $myid AND `receiver_id` = $id ) OR (`sender_id` = $id AND `receiver_id` = $myid)";
        $res=$database->query($query);
        while($result=$database->fetchArray($res)){
            if($result['sender_id']==$session->getUserId()){
               echo "<div class=\"outgoing_msg\">
              <div class=\"sent_msg\">
                <p>".$result['message']."</p>
                <span class=\"time_date\">".$result['message_date']."</span> </div>
            </div>";
            }
            else{
          echo "<div class=\"incoming_msg\">
              <div class=\"incoming_msg_img\"> <img src=\"../users/".$result['sender_id']."/images/profile/uploads/medium/profile.jpg\"> </div>
              <div class=\"received_msg\">
                <div class=\"received_withd_msg\">
                  <p>".$result['message']."</p>
                <span class=\"time_date\">".$result['message_date']."</span></div>
              </div>
            </div>";
            }
        }
    }
    }
?>
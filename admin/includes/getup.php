<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(htmlspecialchars($_SERVER['REQUEST_METHOD'])=="POST"){
    if(isset($_POST['id'])){
        require_once '../../includes/database.php';
        $id=$database->escape(trim(htmlspecialchars($_POST['id'])));
        if($id=="1"){
            $query="SELECT `user_id`,`uname` FROM `users` WHERE `active` = 0 AND `deleted` = 0";
            $result=$database->query($query);
            $finRes="<thead><tr>
            <th>User Name</th>
            <th class=\"text-center\" colspan=\"3\">Action</th>
        </tr>
    </thead>
    <tbody>";
            while($res=$database->fetchArray($result)){
                $finRes.="<tr>
                <td>".$res['uname']."</td>
                <td class=\"text-center\"><a class='btn btn-info btn-xs' target=\"_blank\" href=\"../../public/profile.php?user_id=".$res['user_id']."\">View Profile</a>
                <td class=\"text-center\"><a class='btn btn-danger btn-xs' onclick=\"accountDDAD('2','".$res['user_id']."')\">Deactivate Account</a>
                <td class=\"text-center\"><a class='btn btn-danger btn-xs' onclick=\"accountDDAD('3','".$res['user_id']."')\">Delete Account</a>
            </tr>";
            }
        }
        else if($id=="2"){
           $query="SELECT `property_id`,`property_name` FROM `property` WHERE `deleted` = 0";
           $result=$database->query($query);
           $finRes="<thead><tr>
            <th>Property Name</th>
            <th class=\"text-center\" colspan=\"2\">Action</th>
        </tr>
    </thead>
    <tbody>";
           while($res=$database->fetchArray($result)){
               $finRes.="<tr>
                <td>".$res['property_name']."</td>
                <td class=\"text-center\"><a class='btn btn-info btn-xs' target=\"_blank\" href=\"../../public/property.php?property_id=".$res['property_id']."\">View Property</a>
                <td class=\"text-center\"><a class='btn btn-warning btn-xs' target=\"_blank\" onclick=\"deleteProperty('".$res['property_id']."')\">Delete Property</a>
            </tr>";   
            }
        }
        else if($id=="3"){
           $query="SELECT `property_id`,`property_name` FROM `property` WHERE `deleted` = 1";
           $result=$database->query($query);
           $finRes="<thead><tr>
            <th>Property Name</th>
            <th class=\"text-center\" colspan=\"2\">Action</th>
        </tr>
    </thead>
    <tbody>";
           while($res=$database->fetchArray($result)){
               $finRes.="<tr>
                <td>".$res['property_name']."</td>
                <td class=\"text-center\"><a class='btn btn-info btn-xs' target=\"_blank\" href=\"../../public/property.php?property_id=".$res['property_id']."\">View Property</a>
                <td class=\"text-center\"><a class='btn btn-warning btn-xs' target=\"_blank\" onclick=\"udeleteProperty('".$res['property_id']."')\">Return Deleted Property</a>
            </tr>";   
            }
        }
        if($id=="4"){
            $query="SELECT `user_id`,`uname` FROM `users` WHERE `active` = 1 AND `deleted` = 0";
            $result=$database->query($query);
            $finRes="<thead><tr>
            <th>User Name</th>
            <th class=\"text-center\" colspan=\"4\">Action</th>
        </tr>
    </thead>
    <tbody>";
            while($res=$database->fetchArray($result)){
                $finRes.="<tr>
                <td>".$res['uname']."</td>
                <td class=\"text-center\"><a class='btn btn-info btn-xs' target=\"_blank\" href=\"../../public/profile.php?user_id=".$res['user_id']."\">View Profile</a>
                <td class=\"text-center\"><a class='btn btn-danger btn-xs' onclick=\"accountDDAD('4','".$res['user_id']."')\">Reactivate Account</a>
            </tr>";
            }
        }
        if($id=="5"){
            $query="SELECT `user_id`,`uname` FROM `users` WHERE `deleted` = 1";
            $result=$database->query($query);
            $finRes="<thead><tr>
            <th>User Name</th>
            <th class=\"text-center\">Action</th>
        </tr>
    </thead>
    <tbody>";
            while($res=$database->fetchArray($result)){
                $finRes.="<tr>
                <td>".$res['uname']."</td>
                <td class=\"text-center\"><a class='btn btn-info btn-xs' target=\"_blank\" href=\"../../public/profile.php?user_id=".$res['user_id']."\">View Profile</a></td>
            </tr>";
            }
        }
        $finRes.="</tbody>";
        echo $finRes;
    }
}

?>
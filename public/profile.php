<html>
<head>
    
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="../styles/bootstrap.css">
    <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../styles/bootstrap.min.css.map">
    <link rel="stylesheet" href="../styles/bootstrap-grid.css">
    <link rel="stylesheet" href="../styles/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../styles/profilepayerpage.css">
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="../styles/profilesellerpage.css">
    <link rel="stylesheet" href="../styles/homenavbar.css"/>
    
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<?php
$ownprofile=true;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 require_once '../includes/users.php';
        require_once '../includes/database.php';
        global $database;
        $user->setDataBase($database);
        require_once '../includes/session.php';
        if ($session->isLoggedIn()) {
            ?>
    <div class="cover">
    <?php
            require_once './homenavbar.php';
            ?>
    </div>
        <?php
 $id = $session->getUserId();
            $user->setId($id);
    if(isset($_GET['user_id'])){
        $user_id=htmlspecialchars($_GET['user_id']);
        if(is_numeric($user_id)&&strlen($user_id)>=1&&strlen($user_id)<=11){
            if($user_id==$session->getUserId())
            {
                redirect();
                
            }
            require_once '../includes/database.php';
            require_once '../includes/users.php';
            $user->setDataBase($database);
            $user->setId($user_id);
            if(gettype($user->getUserId())=="NULL"){
                redirect();
            }
            $ownprofile=false;
            require_once './sellerprofile.php';
        }
        else{
        redirect();
    }
} else{
            require_once 'sellerprofile.php';
//            if ($user->getType() == "0") {
                
//            } else {
//                require_once './sellerprofile.php';
//        }
            }
//        } else
//        {
//            redirect();
        }
        else{
            redirect();
        }
        function redirect(){
            header("Location: index.php");
        }
        ?>
    
    <!-- Popper js -->
 
    
     <script src="../scripts/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../scripts/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../scripts/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="../scripts/plugins.js"></script>
    <script src="../scripts/classy-nav.min.js"></script>
    <script src="../scripts/jquery-ui.min.js"></script>
    <!-- Active js -->

    </body>
    
    
</html>       
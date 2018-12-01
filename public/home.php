<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home page</title>
    <link rel="icon" href="images/core-img/favicon.ico">
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/homepage.css">
    <link rel="stylesheet" href="../styles/homenavbar.css"/>
    <link rel="stylesheet" href="../styles/Logo.css"/>
    <link rel="stylesheet" href="../styles/style_login.css">
    <link rel="stylesheet" type="text/css" href="../styles/sweetalert.css"/>
    <link rel="stylesheet" href="../styles/profilesallerpage.css">
    <link rel="stylesheet" href="../styles/animate.css">
    <link rel="stylesheet" href="../styles/themify-icons.css">
    <link rel="stylesheet" href="../styles/classy-nav.min.css">
    <link rel="stylesheet" href="../styles/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/owl.carousel.css">
    <link rel="stylesheet" href="../styles/magnific-popup.css">
    <link rel="stylesheet" href="../styles/sweetalert.css">
    
    

</head>

<body>
    
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        require_once '../includes/users.php';
        require_once '../includes/database.php';
        require_once '../includes/property.php';
        $property->setDataBase($database);
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
            if ($user->getType() == "0") {
                require_once 'sellerhome.php';
            } else {
                require_once 'buyerhome.php';
            }
        } else
        {
        require_once './loginnavbar.php';
        require_once './cover.php';
        require_once 'buyerhome.php';}
            ?>
    
 <!-- jQuery (Necessary for All JavaScript Plugins) -->
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
    <script src="../scripts/active.js"></script>
    <script src="../scripts/sweetalert.min.js"></script>
    <script src="../scripts/profilesallerpage.js"></script>
    <script src="../scripts/signin.js"></script>
    <script src="../scripts/sweetalert.min.js"></script>
    <script src="../scripts/addproperty.js"></script>
</body>

</html>
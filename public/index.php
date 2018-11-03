
<?php
        define('title', "SHAMIL");
     
        require_once '../includes/session.php';
        if ($session->isLoggedIn()) {
            redirectTo("home.php");
        }
        function redirectTo($page) {#redirect  page
        error_reporting(E_ALL);
            header("Location: $page");
        }
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css"/>
    <link rel="stylesheet" href="../styles/style_login.css">
    <link rel="stylesheet" type="text/css" href="../styles/sweetalert.css"/>
</head>

<body>
    <div id="wrapper">
   <?php
require_once './loginnavbar.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <!-- ##### Header Area Start ##### -->
    
<!-- ********************************************** FOOTER ******************************************************** -->                  
    </div>    
    <!-- ##### Hero Area End ##### -->   
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
    <script src="../scripts/signin.js"></script>
</body>

</html>
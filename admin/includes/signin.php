<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['uname']);
    $password = htmlspecialchars($_POST['pass']);
        require_once '../../includes/database.php';
        require_once 'admin.php';
        require_once 'sessions.php';
        if ($adminSession->isLoggedin()) {
            header("LOCATION:../public/index2.php");
        } else {
            $admin->setDatabase($database);
            $admin->setUserName($name);
            $admin->setPassword($password);
            $id = $admin->getAdminid();
            if (isset($id)) {
                $adminSession->login($admin);
            } else {
                 header("LOCATION:../public/index.php");
            }
        }
}
?>
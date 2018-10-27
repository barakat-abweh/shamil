<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 require_once '../includes/users.php';
        require_once '../includes/good.php';
        require_once '../includes/database.php';
        global $database;
        $user->setDataBase($database);
        $good->setDataBase($database);
        require_once '../includes/session.php';
        if ($session->isLoggedIn()) {
            $id = $session->getUserId();
            $user->setId($id);
            if ($user->getType() == "0") {

                require_once 'sellerhome.php';
            } else {
                require_once 'buyerhome.php';
            }
        } else
            die("<h1>No Profile</h1>");
        ?>
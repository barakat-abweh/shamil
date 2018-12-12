<?php

require_once '../includes/sessions.php';

if (true) {
    $adminSession->logout();
    header("LOCATION:../public/index.php");
}
?>

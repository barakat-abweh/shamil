<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once("../includes/help.php");
    require_once("../includes/database.php");
    if (isset($_POST['Question']) && !isEmpty($_POST['Question'])) {
        $Question = htmlspecialchars($_POST['Question']);
        $help->setDatabase($database);
        $help->setQuestion($Question);
        $help->storeQuestion($Question);
        header("LOCATION:../public/index.php");
    } else
    if (isset($_POST['answer']) && !isEmpty($_POST['answer'])) {
        $answer = htmlspecialchars($_POST['answer']);
        $help->setDatabase($database);
        $help->setId(htmlspecialchars($_POST['quesid']));
        $help->setAnswer($answer);
        $help->storeAnswer();
        header("LOCATION:../admin/control/questions.php?id=1");
    } else {
        header("LOCATION:../public/help.php");
    }
} else {
    header("LOCATION:../public/help.php");
}

function isEmpty($value) {
    if ($value == "")
        return true;
    else {
        $arr = str_split($value);
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] != " ") {
                return false;
            } #Considered  the spaces without any character empty field
        }
    }
    return true;
}
?>


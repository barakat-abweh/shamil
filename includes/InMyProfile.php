<?php



/*if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset(($_GET['id'])))
        die("No Profile");
    $field = htmlspecialchars($_GET['id']);
    if (!isEmtpy($field)) {
        if (checkId($field)) {
            $ID = $field;
            $user->setId($ID);
            $userId = $user->checkID();
            if ($userId != $ID)
                die("<h1>No Profile</h1>");
            if ($user->getType() !== "Importer")
                die("<h1>No Profile</h1>");
        } else
            die("<h1>No Profile</h1>");
    }
}*/
//require 'session.php';


function printLines($data) {
    $data_line_arr = array();
    $data_line_arr = explode("\n", $data); #convert data to array of lines
    for ($i = 0; $i < count($data_line_arr); $i++) {
        if ($data_line_arr[$i] != " ") {
            echo "<li>" . $data_line_arr[$i] . "</li>";
        }
    }
}

function checkId($id) {
    $min = 3;
    $max = 11;
    $length = strlen($id);
    if ($length < $min || $length > $max)
        return false;
    if (checkNum($id))
        return true;
    return false;
}

function isEmtpy($value) {
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

function checkNum($value) {
    $arr = str_split($value);
    for ($i = 0; $i < count($arr); $i++) {
        $as = ord($arr[$i]); #ord() Return the ASCII value of character
        if ($as < 48 || $as > 57)
            return false;
    }
    return true;
}

function redirect() { #redirect page
    header("Location: " . $_SERVER['PHP_SELF']);
}

?>
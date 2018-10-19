<?php

$flag1 = false;
$flag2 = false;
$flag3 = false;
$flag4 = false;
$flag5 = false;
$flag6 = false;
$flag7 = false;
if ($_SERVER["REQUEST_METHOD"] == "GET") { #check type request 
    if (isset($_GET['goodid'])) {
        $field = htmlspecialchars($_GET['goodid']);
        if (!isEmtpy($field)) {
            if (checkId($field)) {

                $productid = $field;
                $flag1 = true;
            } else
                redirect();
        }

        $field = htmlspecialchars($_GET['type']);
        if (!isEmtpy($field)) {

            if (checkPtype($field)) {

                $p_type = $field;
                $flag2 = true;
            } else
                redirect();
        }
        $field = htmlspecialchars($_GET['price']);
        if (!isEmtpy($field)) {

            if (checkPprice($field)) {

                $p_price = $field;
                $flag3 = true;
            } else
                redirect();
        }
        $field = htmlspecialchars($_GET['offer']);
        if (!isEmtpy($field)) {

            if (checkPoffer($field)) {

                $p_offer = $field;
                $flag4 = true;
            } else
                redirect();
        }
        $field = htmlspecialchars($_GET['quantity']);
        if (!isEmtpy($field)) {

            if (checkP_Q($field)) {

                $p_quantitiy = $field;
                $flag5 = true;
            } else
                redirect();
        }
        $field = htmlspecialchars($_GET['moredetails']);
        if (!isEmtpy($field)) {

            if (checkMoreinfo($field)) {

                $p_info = $field;
                $flag6 = true;
            } else
                redirect();
        }
        $field = htmlspecialchars($_GET['goodname']);
        if (!isEmtpy($field)) {
            if (checkPname($field)) {
                $p_name = $field;
                $flag7 = true;
            } else
                redirect();
        }
    }
    if ($flag1 && $flag2 && $flag3 && $flag4 && $flag5 && $flag6 && $flag7) {
        require_once './good.php';
        require_once './database.php';
        $good->setDataBase($database);
        $good->setName($p_name);
        $good->setId($productid);
        $good->setType($p_type);
        $good->setPrice($p_price);
        $good->setOffers($p_offer);
        $good->setMoreDelts($p_info);
        $good->setQuantity($p_quantitiy);
        $good->updateProduct();
        
    }
}

function checkPname($pname) {
    $min = 3;
    $max = 20;
    $length = strlen($pname);
    if ($length < $min || $length > $max)
        return false;
    if (checkNum_Char($pname))
        return true;
    return false;
}

function checkId($id) {
    $min = 1;
    $max = 11;
    $length = strlen($id);
    if ($length < $min || $length > $max)
        return false;
    if (checkNum_Char($id))
        return true;
    return false;
}

function checkPtype($Ptype) {
    $min = 2;
    $max = 25;
    $length = strlen($Ptype);
    if ($length < $min || $length > $max)
        return false;
    if (checkNum_Char($Ptype))
        return true;
    return false;
}

function checkPprice($price) {
    $min = 1;
    $max = 10;
    $length = strlen($price);
    if ($length < $min || $length > $max)
        return false;
    if (checkNum($price))
        return true;
    return false;
}

function checkPoffer($offer) {
    $min = 0;
    $max = 100;
    if ($offer < $min || $offer > $max)
        return false;
    if (checkNum($offer))
        return true;
    return false;
}

function checkP_Q($quantity) {
    $min = 1;
    $max = 10;
    $length = strlen($quantity);
    if ($length < $min || $length > $max)
        return false;
    if (checkNum($quantity))
        return true;
    return false;
}

function checkMoreinfo($checkMoreinfo) {
    $min = 0;
    $max = 500;
    $length = strlen($checkMoreinfo);
    if ($length > $max)
        return false;
    return true;
}

# functions to Check the status of letters;

function redirect() { #redirect page
    header("Location: ../public/MyProfile.php");
}

function checkChar($value) {
    $arr = str_split($value);
    for ($i = 0; $i < count($arr); $i++) {
        $as = ord($arr[$i]); #Return the ASCII value of character
        if ($as == 32)
            continue;#if value = space
        else if (($as >= 65 && $as <= 90) || ($as >= 97 && $as <= 122))
            continue;
        else
            return false;
    }
    return true;
}

function checkNum_Char($value) {
    $arr = str_split($value);
    for ($i = 0; $i < count($arr); $i++) {
        $as = ord($arr[$i]); #Return the ASCII value of character
        if ($as == 32)
            continue;
        else if (($as >= 65 && $as <= 90) || ($as >= 97 && $as <= 122) || ($as >= 48 && $as <= 57))
            continue;
        else
            return false;
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

?>

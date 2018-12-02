<?php
$fname;
$lname;
$uname;
$email;
$phone1;
$phone2;
$type;
$country;
$city;
$pass;
$conpass;
$flag = false;
$flag1 = false;
$flag2 = false;
$flag3 = false;
$flag4 = false;
$flag5 = false;
$flag6 = false;
$flag7 = false;
$DB;
$USER;
require_once ('./database.php');
if(isset($database)){
    $DB=$database;
require_once ('./users.php');
if(isset($user)){
    $USER=$user;
$USER->setDataBase($DB);
}
}
if (htmlspecialchars($_SERVER["REQUEST_METHOD"]) == "POST") { #check type request 
    $field = htmlspecialchars($_POST['fname']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkName($field)) {
            $uname = strtolower($field);
            $flag = true;
        } else
            redirectValues();
    }
    $field = htmlspecialchars($_POST['lname']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkName($field)) {
            $uname = strtolower($field);
            $flag1 = true;
        } else
           redirectValues();
    }
    $field = htmlspecialchars($_POST['uname']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkName($field)) {
            $uname = strtolower($field);
            $flag2 = true;
        } else
            redirectValues();
    }
    $pass = htmlspecialchars($_POST['password']);
    $confpass = htmlspecialchars($_POST['confpassword']);
    if (!isEmpty($pass)&&!isEmpty($confpass)) {
        if (checkPass($pass, $confpass)) {
            $password = $pass;
            $flag3 = true;
        } else
            redirectValues();
    }

    $field = htmlspecialchars($_POST['email']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkEmail($field)) {
            $email = strtolower($field);
            $flag4 = true;
        } else
            redirectValues();
    }
    $field = htmlspecialchars($_POST['type']);
    if(!isEmpty($field)){
        $field=trim($field);
    if (checkType($field)) {
        if($field === "Seller"){
        $type = 0;
        }
        else{
           $type = 1;
        }
        $flag5 = true;
    } else
        redirectValues();
    }
    $field = htmlspecialchars($_POST['country']);
    $field1= htmlspecialchars($_POST['city']);
     if(!isEmpty($field)&&!isEmpty($field1)){
    $field=trim($field);
    $field1= trim($field1);
    if (checkCountry($field,$field1,$DB)) {
        $country = $field;
        $city=$field1;
        $flag6 = true;
    } else
        redirectValues();
     }
     $field = htmlspecialchars($_POST['phone1']);
    $field1= htmlspecialchars($_POST['phone2']);
     if(!isEmpty($field)){
    $field=trim($field);
    $field1= trim($field1);
    if (checkPhone($field)&&(strlen($field1)==0||checkPhone($field1))) {
        $phone1 = $field;
        $phone2=$field1;
        $flag7 = true;
    } else
        redirect();
     }
     
if ($flag && $flag1 && $flag2&& $flag3 && $flag4 && $flag5 && $flag6 && $flag7) {
            $USER->setFname($fname);
            $USER->setLname($lname);
            $USER->setUname($uname);
            $USER->setPhone($phone1,$phone2);
            $USER->setEmail($email);
            $USER->setPassword($password);
            $USER->setType($type);
            $USER->setCountry($country);
            $USER->setCity($city);
           if(!$USER->signUp())redirectValues();
           else{
             $uid=$USER->getID();
            if(!file_exists("../users/$uid"))mkdir("../users/$uid");
             if(!file_exists("../users/$uid/images"))mkdir("../users/$uid/images");
             if(!file_exists("../users/$uid/images/properties"))mkdir("../users/$uid/images/properties");
             if(!file_exists("../users/$uid/images/profile"))mkdir("../users/$uid/images/profile");
             if(!file_exists("../users/$uid/images/profile/uploads"))mkdir("../users/$uid/images/profile/uploads");
             if(!file_exists("../users/$uid/images/profile/uploads/small"))mkdir("../users/$uid/images/profile/uploads/small");
             if(!file_exists("../users/$uid/images/profile/uploads/medium"))mkdir("../users/$uid/images/profile/uploads/medium");    
            require_once 'session.php';
            $session->signup($USER);
            }
    }
    
}
function checkName($Name) {
    $min = 2;
    $max = 20;
    $length = strlen($Name);
    if ($length < $min || $length > $max)
        return false;
    if (checkChar($Name))
        return true;
    return false;
}

function checkPass($pass, $confpass) {
    if ($pass != $confpass)
        return false;
    $min = 5;
    $max = 64;
    $length = strlen($pass);
    if ($length < $min || $length > $max)
        return false;
    return true;
}

function checkEmail($email) {
    $min = 6;
    $max = 30;
    $length = strlen($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    if ($length < $min || $length > $max)
        return false;
    return true;
}

function checkType($type) {
    if ($type == "Seller" || $type == "Buyer") {
        return true;
    }
    return false;
}
function checkCountry($country,$city,$DB) {
    $country=$DB->escape($country);
    $city=$DB->escape($city);
    $query="SELECT `country_id` FROM `country` WHERE country_name='$country'";
    $res=$DB->query($query);
    $country_id=$DB->fetchArray($res)['country_id'];
       if($country_id>=1) {
       $query="SELECT `city_id` FROM `city` WHERE `country_id`='$country_id' and `city_name`='$city'";
       $res=$DB->query($query);
       $city_id=$DB->fetchArray($res)['city_id'];
       if($city_id>=1){
           return true;
       }
       }
        return false;
    //return false;
}

#************************************************************************************************************************************************

function redirectValues() { #redirect page
    global $fname;global $lname;global $ID;global $type;global $email;
    header("Location: ../public/signup.php?fname=$fname&lname=$lname&id=$ID&type=$type&email=$email");
}

function redirect() { #redirect page
    header("Location: ../public/index.php");
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
function checkNum($value) {
    $arr = str_split($value);
    for ($i = 0; $i < count($arr); $i++) {
        $as = ord($arr[$i]); #ord() Return the ASCII value of character
        if ($as < 48 || $as > 57)
            return false;
    }
    return true;
}
function checkPhone($phone) {
    $min = 3;
    $max = 15;
    $length = strlen($phone);
    if ($length < $min || $length > $max)
        return false;
    if (checkNum($phone))
        return true;
    return false;
}
?>

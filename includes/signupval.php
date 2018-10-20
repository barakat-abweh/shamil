<?php

$fname;
$lname;
$ID;
$password;
$type;
$email;
$flag = false;
$flag1 = false;
$flag2 = false;
$flag3 = false;
$flag4 = false;
$flag5 = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") { #check type request 
    $field = htmlspecialchars($_POST['fname']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkName($field)) {
            $fname = $field;
            $flag = true;
        } else
            redirect();
    }
    $field = htmlspecialchars($_POST['lname']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkName($field)) {
            $lname = $field;
            $flag1 = true;
        } else
            redirect();
    }
    $field = htmlspecialchars($_POST['ID']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkId($field)) {
            $ID = $field;
            $flag2 = true;
        } else
            redirect();
    }

    $pass = htmlspecialchars($_POST['password']);
    $confpass = htmlspecialchars($_POST['confpassword']);
    if (!isEmpty($pass)) {
        if (checkPass($pass, $confpass)) {
            $password = $pass;
            $flag3 = true;
        } else
            redirect();
    }

    $field = htmlspecialchars($_POST['email']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkEmail($field)) {
            $email = strtolower($field);
            $flag4 = true;
        } else
            redirect();
    }
    $field = htmlspecialchars($_POST['type']);
    if (checkType($field)) {
        $type = $field;
        $flag5 = true;
    } else
        redirect();

    if ($flag && $flag1 && $flag2 && $flag3 && $flag4 && $flag5) {
        require_once ('users.php');
        $user->connectDatabase();
        if (isset($user)) { 
            $user->setFname($fname);
            $user->setLname($lname);
            $user->setID($ID);
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setType($type);
             if(!$user->signUp())redirectValues();
           else{
               require_once 'session.php';
               $session->signup($user);
             if(!file_exists("../users/user$ID"))mkdir("../users/user$ID");
             if(!file_exists("../users/user$ID/Images"))mkdir("../users/user$ID/Images");
             if(!file_exists("../users/user$ID/Images/Products"))mkdir("../users/user$ID/Images/Products");
             if(!file_exists("../users/user$ID/Images/Profile"))mkdir("../users/user$ID/Images/Profile");
             if(!file_exists("../users/user$ID/Images/Profile/uploads"))mkdir("../users/user$ID/Images/Profile/uploads");
             if(!file_exists("../users/user$ID/Images/Profile/uploads/small"))mkdir("../users/user$ID/Images/Profile/uploads/small");
             if(!file_exists("../users/user$ID/Images/Profile/uploads/medium"))mkdir("../users/user$ID/Images/Profile/uploads/medium");      
            //header("Location: ../public/more.php");
            }
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
    if ($type == "seller" || $type == "buyer")
        return true;
    return false;
}

#************************************************************************************************************************************************

function redirectValues() { #redirect page
    global $fname;global $lname;global $ID;global $type;global $email;
    header("Location: ../public/signup.php?fname=$fname&lname=$lname&id=$ID&type=$type&email=$email");
}

function redirect() { #redirect page
    header("Location: ../public/signup.php");
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

?>

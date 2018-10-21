
<?php


require_once '../includes/users.php';
 $user->connectDatabase();
         require_once '../includes/session.php';
        if($session->isLoggedIn()){$user->setId($session->getUserId());$id=$session->getUserId();}
       else die("<h1>No Profile</h1>"); 
        header("Location: ../public/more.php");


$username;
$address;
$companyName;
$companyType;
$phone;
$moreDetails;
$flag = FALSE;
$flag1 = FALSE;
$flag2 = FALSE;
$flag3 = FALSE;
$flag4 = FALSE;
$flag5 = FALSE;
if ($_SERVER["REQUEST_METHOD"] == "POST") { #check type request 
    $field = htmlspecialchars($_POST['Username']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkUsername($field)) {
            $username =  strtolower($field);
            $flag = TRUE;
        } else
            redirect();
    }
    $field = htmlspecialchars($_POST['Address']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkAddress($field)) {
            $address = $field;
            $flag1 = TRUE;
        } else
            redirect();
    }
    $field = htmlspecialchars($_POST['Companyname']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkCompanyname($field)) {
            $companyName = $field;
            $flag2 = TRUE;
        } else
            redirect();
    }
    $field = htmlspecialchars($_POST['Companytype']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkCompanytype($field)) {
            $companyType = $field;
            $flag3 = TRUE;
        } else
            redirect();
    }
    $field = htmlspecialchars($_POST['Phone']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkPhone($field)) {
            $phone = $field;
            $flag4 = TRUE;
        } else
            redirect();
    }
    $field = htmlspecialchars($_POST['Moredetails']);
    if (!isEmpty($field)) {
        $field=trim($field);
        if (checkMoredetails($field)) {
            $moreDetails = $field;
            $flag5 = TRUE;
        } else
            redirect();
    }
    if ($flag || $flag1 || $flag2 || $flag3 || $flag4 || $flag5) {
        require_once ('users.php');
        if (isset($user)) {
            $user->setID($id);
            $user->setUserName($username);
            $user->setAddress($address);
            $user->setPhone($phone);
            $user->setCompanyName($companyName);
            $user->setCompanyType($companyType);
            $user->setDetails($moreDetails);
            $user->storeMoreDetails();
            header("Location: ../public/home.php");
        }
    }
}

function redirect() { #redirect page
    header("Location: ../public/more.php");
}

function checkUsername($username) {
    $min = 3;
    $max = 20;
    $length = strlen($username);
    if ($length < $min || $length > $max)
        return false;
    if (checkNum_Char($username))
        return true;
    return false;
}

function checkAddress($address) {
    $min = 3;
    $max = 25;
    $length = strlen($address);
    if ($length < $min || $length > $max)
        return false;
    if (checkNum_Char($address))
        return true;
    return false;
}

function checkCompanyname($companyName) {
    $min = 3;
    $max = 25;
    $length = strlen($companyName);
    if ($length < $min || $length > $max)
        return false;
    if (checkNum_Char($companyName))
        return true;
    return false;
}

function checkCompanytype($companyType) {
    $min = 3;
    $max = 25;
    $length = strlen($companyType);
    if ($length < $min || $length > $max)
        return false;
    if (checkChar($companyType))
        return true;
    return false;
}

function checkPhone($phone) {
    $min = 10;
    $max = 10;
    $length = strlen($phone);
    if ($length < $min || $length > $max)
        return false;
    if (checkNum($phone))
        return true;
    return false;
}

function checkMoredetails($moreDetails) {
    $min = 6;
    $max = 250;
    $length = strlen($moreDetails);
    if ($length < $min || $length > $max)
        return false;
    return true;
}

# functions to Check the status of letters;

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

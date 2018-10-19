<?php

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
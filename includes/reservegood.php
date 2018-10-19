<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])&&isset($_GET['resQuantity'])) {
        $goodid = htmlspecialchars($_GET['id']);
        $reserved = htmlspecialchars($_GET['resQuantity']);
        if (checkNum($goodid) && checkNum($reserved)) {
            require_once 'database.php';
            require_once 'reservation.php';
            require_once 'session.php';
            require_once 'good.php';
            $good->setDataBase($database);
            $good->setId($goodid);
            if ($reserved <= $good->getQuantity()) {
                $reservation->setDatabase($database);
                $reservation->setGoodId($goodid);
                $reservation->setImporterId($good->getUserId());
                $traderid = $session->getUserId();
                $reservation->setTraderId($traderid);
                $reservation->setQuantity($reserved);
                $reservation->storeReservation();
            } else {
                echo "the quantity you asked for is not available";
            }
        } else {
            echo "Something went wrong";
        }
    } else {
        echo "Something went wrong";
    }
} else {
    echo "Something went wrong";
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

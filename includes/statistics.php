<?php

class statistics {

    private $userid, $database;

    public function __construct() {
        
    }

    public function connectDatabase() {
        require_once 'database.php';
        global $database;
        $this->database = $database;
    }

    public function getLatestReserved() {
        $result = $this->database->query("SELECT * FROM `reservations` WHERE accepted=0 AND traderid=$this->userid ORDER BY 'date desc' LIMIT 3");
        return $result;
    }
 public function getLatestPurchased() {
        $result = $this->database->query("SELECT * FROM `reservations` WHERE accepted=1 AND traderid=$this->userid ORDER BY 'date desc' LIMIT 3");
        return $result;
    }
    public function setDatabase($database) {
        $this->database = $database;
    }

    public function setUserId($userid) {
        $this->userid = $this->database->escape($userid);
    }

    public function getReservedStat() {
        $result = $this->database->query("SELECT COUNT(*) FROM `reservations` WHERE traderid='$this->userid' AND accepted=0");
        $result = $this->database->fetchArray($result);
        return $result['COUNT(*)'];
    }

    public function getAllReserved() {
        $result = $this->database->query("SELECT COUNT(*) FROM `reservations` WHERE accepted=0");
        $result = $this->database->fetchArray($result);
        return $result['COUNT(*)'];
    }

    public function getAllRefusedReserved() {
        $result = $this->database->query("SELECT COUNT(*) FROM `reservations` WHERE accepted=-1");
        $result = $this->database->fetchArray($result);
        return $result['COUNT(*)'];
    }

    public function getAllUserGoods() {
        $result = $this->database->query("SELECT COUNT(*) FROM `goods` where userid=$this->userid");
        $result = $this->database->fetchArray($result);
        return $result['COUNT(*)'];
    }

    public function getAllPurchased() {
        $result = $this->database->query("SELECT COUNT(*) FROM `reservations` WHERE accepted=1");
        $result = $this->database->fetchArray($result);
        return $result['COUNT(*)'];
    }

    public function getPurchasedStat() {
        $result = $this->database->query("SELECT COUNT(*) FROM `reservations` WHERE traderid='$this->userid' AND accepted=1");
        $result = $this->database->fetchArray($result);
        return $result['COUNT(*)'];
    }

    public function getAllProduct() {
        $result = $this->database->query("SELECT COUNT(*) FROM `reservations`");
        $result = $this->database->fetchArray($result);
        return $result['COUNT(*)'];
    }

    public function getAllUsers() {
        $result = $this->database->query("SELECT COUNT(*) FROM `users`");
        $result = $this->database->fetchArray($result);
        return $result['COUNT(*)'];
    }

    public function getPurchasedId() {
        $result = $this->database->query("SELECT * FROM `reservations` WHERE traderid='$this->userid' AND accepted=1 LIMIT 5");
        return $result;
    }

    public function getReservedId() {
        $result = $this->database->query("SELECT * FROM `reservations` WHERE traderid='$this->userid' AND accepted=0 LIMIT 5");
        return $result;
    }

}

$statistic = new statistics();
?>

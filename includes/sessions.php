<?php

class sessions {

    private static $loggedin = false;
    private $adminid;
    private $startedSession = false;

    function __construct() {

        $this->startSession();
        if ($this->startedSession) {
            $this->checkLogIn();
        }
    }

    private function checkLogIn() {
        if (isset($_SESSION['adminid'])) {
            $this->adminid = $_SESSION['adminid'];
            self::$loggedin = true;
        } else {
            unset($this->adminid);
            self::$loggedin = false;
        }
        return self::$loggedin;
    }

    public function startSession() {
        if (!$this->startedSession) {
            session_start();
            $this->startedSession = true;
        }
    }

    public function isLoggedIn() {
        return self::$loggedin;
    }

    public function login($admin) {
        if (isset($admin) && !self::$loggedin) {
            $this->adminid = $_SESSION['adminid'] = $admin->getAdminid();
            self::$loggedin = true;
            header("LOCATION:control/index.php");
        } else {
            header("LOCATION:alin.php");
        }
    }

    public function getAdminId() {
        return $this->adminid;
    }

    public function logout() {
        if (isset($_SESSION['adminid'])) {
            unset($_SESSION['adminid']);
            unset($this->adminid);
            self::$loggedin = false;
        }
    }

}

$adminSession = new sessions();
?>


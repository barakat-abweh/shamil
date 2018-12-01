<?php

class session {

    private static $loggedin = false;
    private $userid;
    private $startedSession = false;
    private $cookie;
    
    function __construct() {    
        require_once '../includes/cookies.php';
        $this->cookie=$cookie;
        $this->startSession();
        if ($this->startedSession) {
            $this->checkLogIn();
        }
    }

    private function checkLogIn() {
        if (isset($_SESSION['userid']) && $this->cookie->checkLogIn("userid",md5($_SESSION['userid']))){
            $this->userid = $_SESSION['userid'];
           self::$loggedin = true;
        } else {
            unset($this->userid);
            $this->cookie->unsetCookie("userid");
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

    
    public function login($user) {
        if (isset($user) && !self::$loggedin) {
            $userEmail = $user->getEmail();
            $userUname=$user->getUname();
            global $email;
            global $password;
            if ($userEmail === $email || $email===$userUname) {
                $userpass = $user->getPassword();
                if ($userpass === $password) {
                    $this->cookie->setCookie("userid",md5($user->getID()),time() + (86400 * 30),"/",null,false,true);
                    self::$loggedin = true;
                    $this->userid = $_SESSION['userid'] = $user->getID();
                   header("LOCATION:../public/home.php");
                } else
                    redirect();
            } else
                redirect();
        }
    }
    
    public function signup($user){
     if (isset($user) && !self::$loggedin) {
          $this->userid = $_SESSION['userid'] = $user->getID();
          $this->cookie->setCookie("userid",md5($this->userid),time() + (86400 * 30),"/",null,false,true);
          self::$loggedin = true;
           header("Location: ../public/index.php");
     }   
     else {
               header("Location: ../public/index.php");
          }  
    }

    public function getUserId() {
        return $this->userid;
    }

    public function logout() {
        if (isset($_SESSION['userid'])) {
            unset($_SESSION['userid']);
            unset($this->userid);
           $this->cookie->setCookie("userid","",0,"/",null,false,true);
           $this->cookie->unsetCookie("userid");
            self::$loggedin = false;
        }
  
    }

}

$session = new session();



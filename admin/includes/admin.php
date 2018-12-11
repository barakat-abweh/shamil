<?php

class admin {

    private $database, $adminid, $username, $password;

    public function __construct() {
        
    }

    public function connectDatabase() {
        require_once '../../includes/database.php';
        global $database;
        if (isset($database)) {
            $this->database = $database;
        }
    }

    public function setDatabase($database) {
        $this->database = $database;
    }

    public function setPassword($password) {

        $this->password = sha1(md5($password));
    }

    public function getPassword() {

        $query = "SELECT password FROM admin WHERE uname=$this->username";
        $result = $this->database->fetchArray($this->database->query($query));
        return $result['password'];
    }

    public function setAdminid($id) {
        $this->adminid = $this->database->escape($id);
    }

    public function setUsername($username) {
        $this->username = $this->database->escape($username);
    }

    public function getAdminid() {
        $query = "SELECT admin_id FROM admin WHERE uname='$this->username' AND password='$this->password'";
        $result = $this->database->fetchArray($this->database->query($query));
        return $result['admin_id'];
    }

    public function getUsername() {
        $query = "SELECT uname FROM admin WHERE admin_id='$this->adminid'";
        $result = $this->database->fetchArray($this->database->query($query));
        return $result['uname'];
    }
}

$admin = new admin();
?>
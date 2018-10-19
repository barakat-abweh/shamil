<?php

/*
  defining database functions
 */
//require_once('config.php'); //getting DB constants
include("config.php");

class DB {

    private $connect;

    function __construct() {
             $this->connect =$this->openConnection();
    }

    public function openConnection() {
        if(!isset( $this->connect )){
           
        $this->connect = @mysqli_connect(DB_server, DB_admin, DB_password, DB_dbname);
        if (mysqli_connect_error()) {
            die("Something went wrong,We'll fix it as soon as possible");
        }
        
       return $this->connect;
        }
   
    }

    public function query($query) {
        $result = @mysqli_query($this->connect, $query);
        $this->confirm_query($result);
         if (!$result){return false;}
        return $result;
    }

    private function confirm_query($result) {
        if (!$result) {
            return false;
            die('DataBase query failed');
        }
    }

    public function escape($string) {
        $escaped_string = @mysqli_real_escape_string($this->connect, $string);
        return $escaped_string;
    }

    public function numRows($result) {
        return mysqli_num_rows($result);
    }

    public function insertId() {
        return mysqli_insert_id($this->connect);
    }

    public function affectedRows() {
        return mysqli_affected_rows($this->connect);
    }

    public function fetchArray($result) {
        return mysqli_fetch_array($result);
    }

    public function closeConnection() {
        @mysqli_close($this->connect);
    }

}

$database = new DB();
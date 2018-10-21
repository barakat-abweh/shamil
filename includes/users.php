<?php

class user {

    private $dataBase;
    private $fname;
    private $lname;
    private $uname;
    private $phone1;
    private $phone2;
    private $email;
    private $password;
    private $type;
    private $country;
    private $city;
            
    function __construct() {    
        
    }
    
    function connectDatabase(){
        require_once ('database.php');
        if (isset($database)) {
            $this->dataBase = $database;
        } 
        
    }
    
        function setDataBase($dataBase){
            $this->dataBase=$dataBase;
                
        }

    public function setFname($fname) {
        $this->fname = $this->dataBase->escape($fname);
    }

    public function setLname($lname) {
        $this->lname = $this->dataBase->escape($lname);
    }

    public function setUname($uname) {
        $this->uname = $this->dataBase->escape($uname);
    }
   public function setPhone($phone1,$phone2) {
        $this->phone1 = $this->dataBase->escape($phone1);
        $this->phone2 = $this->dataBase->escape($phone2);
    }
    public function setEmail($email) {
        $this->email = $this->dataBase->escape($email);
    }

    public function setPassword($password) {
        $this->password = $this->dataBase->escape($password);
        $this->password = md5($password);
        $this->password = sha1($this->password);
    }

    public function setType($type) {
        $this->type = $this->dataBase->escape($type);
    }
    public function setCountry($country) {
        $country=$this->dataBase->escape($country);
        $query="SELECT `country_id` FROM `country` WHERE country_name='$country'";
        $res= $this->dataBase->query($query);
        $this->country= $this->dataBase->fetchArray($res)['country_id'];
    }
    public function setCity($city) {
        $city = $this->dataBase->escape($city);
        $query="SELECT `city_id` FROM `city` WHERE `country_id`='$this->country' and `city_name`='$city'";
        $res= $this->dataBase->query($query);
       $this->city= $this->dataBase->fetchArray($res)['city_id'];
    } 

    public function getFname(){  
        $query = "select fname from users where userid=$this->ID";
         $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result); 
        return $result['fname'];
    }

    public function getLname() {
        $query = "select lname from users where userid=$this->ID";
        $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['lname'];
    }

    public function getEmail() {
        $query = "select email from users where userid=$this->ID";
       $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['email'];
    }

    public function getPassword() {
        $query = "select password from users where userid=$this->ID";
       $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['password'];
    }

    public function getType() {
        $query = "select usertype from users where userid=$this->ID";
       $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['usertype'];
    }

    public function getAddress() {
        $query = "select address from users where userid=$this->ID";
       $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['address'];
    }

    public function getDetails() {
        $query = "select biography from users where userid=$this->ID";
      $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['biography'];
    }

    public function getUserName() {
        $query = "select username from users where userid=$this->ID";
        $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['username'];
    }

    public function getPhone() {
        $query = "select phone from users where userid=$this->ID";
      $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['phone'];
    }


    public function getDataBase() {
        return $this->dataBase;
    }

    public function getID(){     
        $query = "select userid from users where email='$this->email'";
        $result= $this->dataBase->query($query);
        $result=mysqli_fetch_assoc($result);
        return $result['userid'];
    }
    public function signUp() {
        $query = "INSERT INTO users (`fname`, `lname`,`uname`, `email`, `password`,`type`,`country_id`,`city_id`) VALUES ('$this->fname','$this->lname','$this->uname', '$this->email','$this->password','$this->type','$this->country','$this->city');";
        $s=$this->getDataBase()->query($query);
         $this->getDataBase()->closeConnection();
        if(!$s)return false;
        return true;
    }
}
$user = new user();

?>
<?php

class user {
    private $id;
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
public function setId($id){
    $this->id=$id;
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
        $query = "select fname from users where user_id=$this->id";
         $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result); 
        return $result['fname'];
    }

    public function getLname() {
        $query = "select lname from users where user_id=$this->id";
        $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);    
        return $result['lname'];
    }
    public function getUname() {
        $query = "select uname from users where user_id=$this->id";
        $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);    
        return $result['uname'];
    }
    public function getEmail() {
        $query = "select email from users where user_id=$this->id";
       $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);    
        return $result['email'];
    }

    public function getPassword() {
        $query = "select password from users where user_id=$this->id";
       $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);    
        return $result['password'];
    }

    public function getType() {
        $query = "select type from users where user_id=$this->id";
       $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);
        return $result['type'];
    }

    public function getAddress() {
        $query = "select country_id,city_id from users where user_id=$this->id";
       $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);   
         $country_id=$result['country_id'];
         $city_id=$result['city_id'];
         $query="SELECT  `country_name` FROM `country` WHERE country_id=$country_id";
         $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);
         $country_name=$result['country_name'];
         $query="SELECT  `city_name` FROM `city` WHERE city_id=$city_id";
         $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);
         $city_name=$result['city_name'];
         return $country_name."-".$city_name;
         
    }

    public function getDetails() {
        $query = "select biography from users where user_id=$this->id";
      $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);    
        return $result['biography'];
    }

    public function getUserName() {
        $query = "select username from users where userid=$this->id";
        $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);    
        return $result['username'];
    }

    public function getPhone() {
        $query = "select phone1,phone2 from users where user_id=$this->id";
      $result= $this->dataBase->query($query);
         $result= $this->dataBase->fetchArray($result);    
        return $result['phone1']."/".$result['phone2'];
    }


    public function getDataBase() {
        return $this->dataBase;
    }
    public function getUserId(){
        $query = "select user_id from users where user_id='$this->id'";
        $result= $this->dataBase->query($query);
        $result= $this->dataBase->fetchArray($result);
        return $result['user_id'];
    }

    public function getID(){
        $query = "select `user_id` from users where `email`='$this->email'";
        $result=$this->dataBase->query($query);
        $result=$this->dataBase->fetchArray($result);
        return $result['user_id'];
    }
    public function signUp() {
        $query = "INSERT INTO users (`fname`, `lname`,`uname`, `email`, `password`,`type`,`country_id`,`city_id`,`phone1`, `phone2`) VALUES ('$this->fname','$this->lname','$this->uname', '$this->email','$this->password','$this->type','$this->country','$this->city','$this->phone1','$this->phone2');";
        $s=$this->getDataBase()->query($query);
        if(!$s)return false;
        return true;
    }
    public function getUserCities(){
            $query="SELECT `city_id`,`city_name` FROM `city` WHERE country_id=".$this->getCountryId();
            $result= $this->dataBase->query($query);
            $finalResult="";
            while($res= $this->dataBase->fetchArray($result)){
                $finalResult.="<option id='".$res['city_id']."'>".$res['city_name']."</option>";
            }
            return $finalResult;  
    }
    public function getCountryId(){
        $query="SELECT `country_id` FROM `users` WHERE `user_id`=$this->id";
        $result= $this->dataBase->query($query);
        $result= $this->dataBase->fetchArray($result);
        return $result['country_id'];
    }
    public function getOwnedProperties(){
        $query = "SELECT `property_id`,`owner_id`, `property_name`,`city_id`, `description`, `price` FROM `property` where deleted != '1' AND `owner_id`=".$this->id." ORDER BY creation_date DESC ";
        $result=$this->dataBase->query($query);
        return $result;
    }
}
$user = new user();

?>
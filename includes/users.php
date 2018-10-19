<?php

class user {

    private $dataBase;
    private $ID;
    private $type;
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $userName = NULL;
    private $companyName = NULL;
    private $companyType = NULL;
    private $address = NULL;
    private $phone = NULL;
    private $details = NULL;
   
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

    public function setEmail($email) {
        $this->email = $this->dataBase->escape($email);
    }

    public function setPassword($password) {
        $this->password = $this->dataBase->escape($password);
        $this->password = md5($password);
        $this->password = sha1($this->password);
    }

    public function setID($ID) {
        $this->ID = $this->dataBase->escape($ID);
       
    }

    public function setAddress($address) {
        $this->address = $this->dataBase->escape($address);
    }

    public function setDetails($details) {
        $this->details = $this->dataBase->escape($details);
    }

    public function setUserName($username) {
        $this->userName = $this->dataBase->escape($username);
    }

    public function setPhone($phone) {
        $this->phone = $this->dataBase->escape($phone);
    }

    public function setCompanyName($companyName) {
        $this->companyName = $this->dataBase->escape($companyName);
    }

    public function setCompanyType($companyType) {
        $this->companyType = $this->dataBase->escape($companyType);
    }

    public function setType($type) {
        $this->type = $this->dataBase->escape($type);
    }
    
    public function getImgProfile(){
       $imgProfile="../users/user".$this->checkID()."/Images/Profile/uploads/medium/profile.jpg";
       if(file_exists($imgProfile));else $imgProfile="../images/profile.png";
          return $imgProfile;
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

    public function getCompanyName() {
        $query = "select companyname from users where userid=$this->ID";
       $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['companyname'];
    }

    public function getCompanyType() {
        $query = "select companytype from users where userid=$this->ID";
        $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['companytype'];
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
    
   
 
     public function checkID() {
        $query = "select userid from users where userid='$this->ID'";
        $result=$this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);
        return $result['userid'];
    }
    
    
    

    public function signUp() {
        $query = "INSERT INTO users (userid, fname, lname, email, password,usertype) VALUES ('$this->ID','$this->fname','$this->lname', '$this->email','$this->password','$this->type');";
        $s=$this->getDataBase()->query($query);
         $this->getDataBase()->closeConnection();
        if(!$s)return false;
        return true;
    }

    public function storeMoreDetails(){
        $query = "UPDATE users SET `username` = '$this->userName', `companyname` = '$this->companyName', phone = '$this->phone' , address = '$this->address', `biography` = '$this->details', `companytype` = '$this->companyType' WHERE `users`.`userid` = '$this->ID';";
        $this->getDataBase()->query($query);
        $this->getDataBase()->closeConnection();
   
    }
    


}
$user = new user();

?>
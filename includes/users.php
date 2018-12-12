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
    $this->id= $this->dataBase->escape($id);
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
    public function setCountryId($country) {
        $this->country=$this->dataBase->escape($country);
        
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
        $query = "select city_id from users where user_id=$this->id";
       $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);
         $city_id=$result['city_id'];
         $query="SELECT  `city_name` FROM `city` WHERE city_id=$city_id";
         $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);
         $city_name=$result['city_name'];
         return $city_name;
         
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
        $query = "select `user_id` from users where `email`='$this->email' OR `uname`='$this->email'";
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
    public function getProfilePicture(){
        return "../users/$this->id/images/profile/uploads/medium/profile.jpg";
    }
    public function changePassword(){
        $query="UPDATE `users` SET `password`='$this->password' WHERE `user_id`=$this->id";
        $this->dataBase->query($query);
    }
    public function isInterested($property_id) {
        $query="SELECT `interest_id` FROM `interested` WHERE `property_id`=$property_id AND `interested_user_id`=$this->id AND `canceled` = 0";
        $result= $this->dataBase->query($query);
       if($this->dataBase->numRows($result)>0){
           return true;
       }
       return false;
    }
    public function editUser(){
        $query="UPDATE `users` SET `fname`='$this->fname',`lname`='$this->lname',`uname`='$this->uname',`email`='$this->email',`phone1`='$this->phone1',`phone2`='$this->phone2',`city_id`='$this->city' WHERE `user_id`=$this->id";
        echo $query;
        $this->dataBase->query($query);
    }
    public function getCountryCities(){
        $ceties=array();
        $query="SELECT `city_id` FROM `city` WHERE `country_id`='".$this->getCountryId()."'";
        $result= $this->dataBase->query($query);
        while($r= $this->dataBase->fetchArray($result)){
            array_push($ceties, $r['city_id']);
        }
        return $ceties;
    }
    public function getConversations(){
        $res="";
        if($this->getType()=='0'){
        $query="SELECT DISTINCT `receiver_id` FROM `messages` WHERE `sender_id`=$this->id ORDER BY `message_date` DESC";
        $result=$this->dataBase->query($query);
        while($Result= $this->dataBase->fetchArray($result)){
            $uid;
                $uid=$Result['receiver_id'];
            $query="SELECT `fname`, `lname` FROM `users` WHERE `user_id` =$uid";
            $Result1=$this->dataBase->query($query);
            $Result1= $this->dataBase->fetchArray($Result1);
            $res.="
            <div class=\"chat_list\" onclick=\"getMessages(".$Result['receiver_id'].")\");>
              <div class=\"chat_people\">
                <div class=\"chat_img\"> <img src=\"../users/$uid/images/profile/uploads/medium/profile.jpg\"> </div>
                <div class=\"chat_ib\">
                  <h5>".$Result1['fname']." ".$Result1['lname']."<span class=\"chat_date\">".$Result['message_date']."</span></h5>
                </div>
              </div>
          </div>";
        }
        }
        else{
            $query="SELECT DISTINCT `sender_id` FROM `messages` WHERE `receiver_id`=$this->id ORDER BY `message_date` DESC";
        $result=$this->dataBase->query($query);
        while($Result= $this->dataBase->fetchArray($result)){
            $uid;
                $uid=$Result['sender_id'];
            $query="SELECT `fname`, `lname` FROM `users` WHERE `user_id` =$uid";
            $Result1=$this->dataBase->query($query);
            $Result1= $this->dataBase->fetchArray($Result1);
            $res.="
            <div class=\"chat_list\" onclick=\"getMessages(".$Result['sender_id'].")\");>
              <div class=\"chat_people\">
                <div class=\"chat_img\"> <img src=\"../users/$uid/images/profile/uploads/medium/profile.jpg\"> </div>
                <div class=\"chat_ib\">
                  <h5>".$Result1['fname']." ".$Result1['lname']."<span class=\"chat_date\">".$Result['message_date']."</span></h5>
                </div>
              </div>
          </div>";
        }
        }
        return $res;
    }
    public function getDeletedOrDeactivated(){
        $result= $this->dataBase->query("SELECT `active`, `deleted` FROM `users` WHERE `user_id` =$this->id");
        $result= $this->dataBase->fetchArray($result);
        if($result['active']=="1"||$result['deleted']=="1"){
            return "1";
        }
        return "0";
    }
    
}
$user = new user();

?>
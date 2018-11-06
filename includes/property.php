<?php
class property {
    private $dataBase;
    private $id;
    private $name;
    private $ownerid;
    private $area;
    private $cityid;
    private $description;
    private $price;
    private $type;
    private $c_date; #created date
    private $img1;
    private $img2;
    private $img3;
    private $img4;
    
    
 
    function __construct() {
        
    }
    
    public function connectDatabase(){
        require_once ('database.php');  
        if (isset($database)) {
            $this->dataBase = $database;
        } 
    }
    
     function setDataBase($dataBase){
            $this->dataBase=$dataBase;
                
        }
    public function getId() {
         $query = "select property_id  from property where property_id=$this->id";
         $result= $this->dataBase->query($query);
         $result= $this->dataBase->fetchArray($result);    
        return $result['property_id'];

    }
    
    public function setId($id) {
       $this->id = $this->dataBase->escape($id);
       
    }
    public function setDescription($description)
    {
        $this->description=$this->dataBase->escape($description);
    }
    public function setArea($area){
        $this->area=$this->dataBase->escape($area);
    }

    public function getLatestId(){
        $r="SELECT MAX(`property_id`) from `property`";
        $r=$this->dataBase->query($r);
         $r = $this->getDataBase()->fetchArray($r);
        $highest_id = $r['MAX(`property_id`)'];
       return  $highest_id;
    }
    
    
    
     public function getOwnerId() {
         $query = "select owner_id from property where property_id=$this->id";
         $result= $this->dataBase->query($query);
         $result= $this->dataBase->fetchArray($result);    
        return $result['owner_id'];

    }
    
    public function setOwnerId($ownerid) {
        $this->ownerid = $this->dataBase->escape($ownerid);
    }
    
    public function getName() {
     $query = "select property_name from property where property_id=$this->id";
         $result= $this->dataBase->query($query);
         $result= $this->dataBase->fetchArray($result);   
        return $result['property_name'];
    }
    
    
    public function setName($name) {
        $this->name = $this->dataBase->escape($name);
    }
    
    public function getType() {
        $query = "select type from property where property_id=$this->id";
         $result= $this->dataBase->query($query);
         $result= $this->dataBase->fetchArray($result);
        $type_id=$result['type'];
        $query="SELECT `type_name` FROM `property_type` WHERE `type_id`='$type_id'";
        $result= $this->dataBase->query($query);
         $result=$this->dataBase->fetchArray($result);
         return $result['type_name'];
    }
    
     public function getTypes() {
         $query="SELECT `type_id`, `type_name` FROM `property_type`";
         $result= $this->dataBase->query($query);
         $finalResult="";
            while($res= $this->dataBase->fetchArray($result)){
                $finalResult.="<option id='".$res['type_id']."'>".$res['type_name']."</option>";
            }
            return $finalResult;  
     }
    public function setType($type) {
        $this->type = $this->dataBase->escape($type);
        $query="SELECT `type_id` FROM `property_type` WHERE `type_name`='$this->type'";
        $result= $this->dataBase->query($query);
        $result=$this->dataBase->fetchArray($result);
        $this->setTypeId($result['type_id']);
    }
    public function setTypeId($typeid) {
        $this->type=$this->dataBase->escape($typeid);
    }
    public function getPrice() {
   $query = "select price from property where property_id=$this->id";
         $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['price'];
    }
    public function setPrice($price) {
        $this->price = $this->dataBase->escape($price);
    }
    public function setCity($cityname) {
        $cityname= $this->dataBase->escape($cityname);
      $query="SELECT `city_id` FROM `city` WHERE `city_name`='$cityname'";
      $result=$this->dataBase->query($query);
      $result= $this->dataBase->fetchArray($result);
      $this->setCityId($result['city_id']);
    }
    public function setCityId($cityid) {
        $this->cityid= $this->dataBase->escape($cityid);
    }
    public function getCity(){
 $query = "select  quantity from goods where goodid=$this->id";
         $result= $this->dataBase->query($query);
         $result= $this->dataBase->fetchArray($result);    
        return $result['quantity'];
    }    

    public function getQrcode(){
         return "../users/user".$this->getUserId()."/Images/Products/$this->id/Qrcode.png"; 
    }
    
    
    public function getImg($name){
         return "../users/user".$this->getUserId()."/Images/Products/$this->id/$name.png"; 
    }
    
    
    
    public function deleteGood(){
        $query="UPDATE goods SET deleted=1 where goodid=$this->id;";
         $result= $this->dataBase->query($query); 
    }
     
    
    public function setOffers($offers){
        $this->offers = $this->dataBase->escape($offers);
    }
    
     public function getOffers(){
$query = "select offers from goods where goodid=$this->id";
         $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['offers'];
     }
    
     public function setMoreDelts($moreDetls){
        $this->moreDetls = $this->dataBase->escape($moreDetls);
    }
    
    public function query($start,$end){    
        #range between start row and end row
        $start=$start-1; 
        $end=($end-$start)-1;
    $query = "select goodid,goodname,moredetails,deleted from goods where userid='$this->userid'  and deleted != '1' order by additiondate DESC  limit $start,$end ";
        $result= $this->dataBase->query($query); 
         $num_rows = $this->dataBase->numRows($result);
       //  $Thumbs=array();
        if ( $num_rows> 0) {
     // output data of each row  
        while($row = $result->fetch_assoc()) {
                $text='<div class="col-sm-6 col-md-3">';
                $text.='<div class="thumbnail">';
                $text.='<div class="pic" style="background-image:url('."../users/user$this->userid/Images/Products/".$row['goodid']."/1.png".')"></div>';
                $text.=' <div class="caption">';
                $text.='<h3 class="">'.$row['goodname'].'</h3>';
                $text.='<p>'.substr($row["moredetails"],0,160).'..</p>';
                $text.='<div class="btn-toolbar text-center">';
                $text.='<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#mywindow" onclick="showDetails('.$row['goodid'].')" >Details</button>';
                $text.='</div>';
                $text.='</div>';
                $text.='</div>';
                $text.='</div>';
                echo $text;
            
                }
}

    }



  public function Slider() {
        $query = "select goodid,goodname,moredetails,deleted from goods where userid='$this->userid'  and deleted != '1' ORDER BY RAND() limit 10";
        $result = $this->dataBase->query($query);
        $num_rows = $this->dataBase->numRows($result);
        if ($num_rows > 0) {
            while ($row = $result->fetch_assoc()) {     
                $text ='<article>';
                $text.= '<a href="#" class="image featured"><div class="imgslide" style="background-image:url(' . "../users/user$this->userid/Images/Products/" . $row['goodid'] . "/1.png" . ')"></div></a>';
                $text.='<header>';
                $text.=' <h3><a href="Product.php?goodid='.$row['goodid'].'">'.$row['goodname'].'</a></h3>';
                $text.='</header>';
                $text.='<p>' . substr($row["moredetails"], 0, 34) . '..</p>';
                $text.='</article>';
                echo $text;

            }
        }
        
        $r=5-$num_rows;
        while($r>0){
            $text ='<article>';
                $text.= '<a href="#" class="image featured"><div class="imgslide"></div></a>';#style="background-image:url(' . "../users/user$this->userid/Images/Products/" . $row['goodid'] . "/1.png" . ')"></div></a>';
                $text.='<header>';
                $text.=' <h3><a href="#">No Product Now</a></h3>';
                $text.='</header>';
                $text.='<p>add products to show it in slider</p>';
                $text.='</article>';
            echo $text;
            $r--;
        }
    }
    public function getRandomProperties(){
        $query = "SELECT `property_id`, `property_name`,`city_id`, `description`, `price` FROM `property` where deleted != '1' ORDER BY RAND() LIMIT 9 "; # 
        $result=$this->dataBase->query($query);
        return $result;
    }
    public function getCityName($city_id){
        $city_id= $this->dataBase->escape($city_id);
        $query="SELECT `city_name` FROM `city` WHERE `city_id`=$city_id";
        $result= $this->dataBase->query($query);
        $result= $this->dataBase->fetchArray($result);
        return $result['city_name'];
    }
public function getDescription(){
        $query="SELECT `description` FROM `property` WHERE `property_id`=$this->id";
        $result= $this->dataBase->query($query);
        $result= $this->dataBase->fetchArray($result);
        return $result['description'];
    }
    public function getArea(){
        $query="SELECT `area` FROM `property` WHERE `property_id`=$this->id";
        $result= $this->dataBase->query($query);
        $result= $this->dataBase->fetchArray($result);
        return $result['area'];
    }
    public function getOwner(){
        $query="SELECT `owner_id` FROM `property` WHERE `property_id`=$this->id";
        $result= $this->dataBase->query($query);
        $result= $this->dataBase->fetchArray($result);
        $this->ownerid=$result['owner_id'];
        $query="SELECT `user_id`,`fname`, `lname` FROM `users` WHERE `user_id`=$this->ownerid";
        $result= $this->dataBase->query($query);
        $result= $this->dataBase->fetchArray($result);
        return "<a href='profile.php?user_id=".$result['user_id']."'>".$result['fname']." ".$result['lname']."</a>";
    }
    public function getAddress(){
        $query="SELECT `city_id` FROM `property` WHERE `property_id`=$this->id";
        $result= $this->dataBase->query($query);
        $result= $this->dataBase->fetchArray($result);
        $city_id=$result['city_id'];
        $query="SELECT `country_id`, `city_name` FROM `city` WHERE `city_id`=$city_id";
        $result= $this->dataBase->query($query);
        $result= $this->dataBase->fetchArray($result);
        $country_id=$result['country_id'];
        $city_name=$result['city_name'];
        $query="SELECT `country_name` FROM `country` WHERE `country_id`=$country_id";
        $result= $this->dataBase->query($query);
        $result= $this->dataBase->fetchArray($result);
        $country_name=$result['country_name'];
        return $country_name." - ".$city_name;
    }

    public function getC_date(){
$query = "select additiondate from goods where goodid=$this->id";
         $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result); 
         $result =explode(" ",$result['additiondate']);
        return $result[0];
     }
     public function getDataBase() {
        return $this->dataBase;
    } 
     
    public function isDeleted(){
       $query = "select deleted from goods where goodid=$this->id";
         $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);
         if($result['deleted']==1)return true;
        return false;
    }
    
    public function storeproperty(){  
        $query = "INSERT INTO `property`(`property_id`, `property_name`, `owner_id`, `area`, `city_id`, `description`, `price`, `type`, `deleted`)";
        $query.="VALUES('$this->id','$this->name',$this->ownerid,$this->area,$this->cityid,'$this->description',$this->price,$this->type,'0')";
        $result=  $this->getDataBase()->query($query);
    }
    public function setInterested(){
        $query="INSERT INTO `interested`(`property_owner_id`, `interested_user_id`, `property_id`) VALUES ()";
    }

    public function closeConnection(){
           $this->getDataBase()->closeConnection();
       }
       }
        
 $property = new property();
        
      
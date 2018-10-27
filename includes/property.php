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
    private $offers;
    private $type;
    private $quantity;
    private $moreDetls;
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
    
    public function getLatestId(){
        $r="SELECT MAX(`goodid`) from `goods`";
        $r=$this->getDataBase()->query($r);  
         $r = mysqli_fetch_row($r);
        $highest_id = $r[0];
       return  $highest_id;
    }
    
    
    
     public function getUserId() {
         $query = "select userid from goods where goodid=$this->id";
         $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
        return $result['userid'];

    }
    
    public function setUserId($userid) {
        $this->userid = $this->dataBase->escape($userid);
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
    
    
    public function setType($type) {
        $this->type = $this->dataBase->escape($type);
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
    
   
     public function setQuantity($quantity){
        $this->quantity = $this->dataBase->escape($quantity);
    }
    
    
    public function getQuantity(){
 $query = "select  quantity from goods where goodid=$this->id";
         $result= $this->dataBase->query($query);
         $result=mysqli_fetch_assoc($result);    
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
    
    public function getOwner(){
        $query="SELECT `owner_id` FROM `property` WHERE `property_id`=$this->id";
        $result= $this->dataBase->query($query);
        $result= $this->dataBase->fetchArray($result);
        $this->ownerid=$result['owner_id'];
        $query="SELECT `fname`, `lname` FROM `users` WHERE `user_id`=$this->ownerid";
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
    
    public function storeGood(){  
        $query = "INSERT INTO `goods`(`goodname`,`goodtype`, `goodprice`, `userid`, `offers`, `moredetails`, `quantity` ,`deleted`)";
        $query.="VALUES('$this->name','$this->type',$this->price,'$this->userid',$this->offers,'$this->moreDetls',$this->quantity,'0')";
        $result=  $this->getDataBase()->query($query);
        $this->getDataBase()->closeConnection();
    }  
    
    
    public function updateProduct() {
        $query = "UPDATE `goods` SET `goodname`='$this->name',`goodtype`='$this->type',`goodprice`='$this->price',`offers`='$this->offers',`moredetails`='$this->moreDetls',`quantity`='$this->quantity' WHERE goodid='$this->id'";
        $this->dataBase->query($query);
    }
    
       public function closeConnection(){
           $this->getDataBase()->closeConnection();
       }
       
        function NOgood() {
        $sql = "select * from goods where userid='$this->userid' ";
        $result = $this->dataBase->query($sql);
        $numgoods = $this->dataBase->numRows($result);
        return $numgoods;
    }

   
       
        }
        
 $property = new property();
        
      
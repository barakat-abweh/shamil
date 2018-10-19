<?php

class rerservation {

    private $traderId, $importerId, $database, $goodId, $quantity, $dealdate, $accepted , $reserveid;

    function __construct() {
        
    }
    
    
    function NOtrader() {
        $sql = "select DISTINCT traderid from reservations where importerid='$this->importerId' AND accepted='1' ";
        $result = $this->database->query($sql);
        $numtrader = $this->database->numRows($result);
        return $numtrader;
    }

    public function getAllUserPurchased() {
        $query = "SELECT *  FROM reservations WHERE ACCEPTED=1 AND TRADERID=$this->traderId ORDER BY DEALDATE DESC";
        $result = $this->database->query($query);
        return $result;
    }

     public function getAllUserReserved() {
        $query = "SELECT *  FROM reservations WHERE ACCEPTED=1 AND TRADERID=$this->traderId ORDER BY DEALDATE DESC";
        $result = $this->database->query($query);
        return $result;
    }
    
    public function getAllImporterBills() {
        $sql = "select * from reservations where importerid='$this->importerId'";
        $result = $this->database->query($sql);
        return $result;
    }
    
    function NONres() {
        $sql = "select * from reservations where importerid='$this->importerId' AND accepted='-1' ";
        $result = $this->database->query($sql);
        $numNres = $this->database->numRows($result);
        return $numNres;
    }

    function NOAres() {
        $sql = "select * from reservations where importerid='$this->importerId' AND accepted='1' ";
        $result = $this->database->query($sql);
        $numres = $this->database->numRows($result);
        return $numres;
    }

    function maxgood() {
        $sql = "select goodsid,traderid, count(goodsid) c from reservations where importerid='$this->importerId' AND accepted='1' group by goodsid order by c desc limit 3  ";
        $result = $this->database->query($sql);
        return $result;
    }

    public function setTraderId($traderId) {
        $this->traderId = $this->database->escape($traderId);
    }

    public function setQuantity($quantity) {
        $this->quantity = $this->database->escape($quantity);
    }

    public function setImporterId($importerId) {
        $this->importerId = $this->database->escape($importerId);
    }

    public function setGoodId($goodId) {
        $this->goodId = $this->database->escape($goodId);
    }

    public function setDatabase($database) {
        $this->database = $database;
    }

    public function connectDatabase() {
        require_once 'database.php';
        global $database;
        $this->database = $database;
    }

    public function setDealDate($dealDate) {
        $this->dealdate = $this->database->escape($dealDate);
    }

    public function setAccepted() {
        $this->database->query("UPDATE `reservations` SET `accepted`=1 WHERE reserveid=$this->reserveId;"); 
    }
    
     public function setRefused() {
        $this->database->query("UPDATE `reservations` SET `accepted`=-1 WHERE reserveid=$this->reserveId;");
        $reservedquantity = $this->database->query("SELECT * FROM reservations WHERE reserveid=$this->reserveId");
        $reservedquantity = $this->database->fetchArray($reservedquantity);
        $quantity = $reservedquantity['quantity'];
        $goodid = $reservedquantity['goodsid'];
        $this->database->query("UPDATE goods SET quantity=quantity+$quantity WHERE goodid=$goodid");
    }

    public function getTraderId() {
        $result = $this->database->query("SELECT traderid FROM `reservations` WHERE importerrid='$this->importerId' AND goodsid='$this->goodId' AND accepted='$this->accepted'&&quantity='$this->quantity';");
        $result = $this->database->fetchArray($result);
        return $result['traderid'];
    }
      public function getTraderId2(){
        $result = $this->database->query("SELECT traderid FROM `reservations` WHERE reserveid=$this->reserveId;"); 
        $result = $this->database->fetchArray($result);
        return $result['traderid'];
    }

    public function getImporterId() {
        $result = $this->database->query("SELECT importerid FROM `reservations` WHERE traderid='$this->traderId' AND goodsid='$this->goodId' AND accepted='$this->accepted'&&quantity='$this->quantity';");
        $result = $this->database->fetchArray($result);
        return $result['importerid'];
    }
    
     public function getImporterId2() {
        $result = $this->database->query("SELECT importerid FROM `reservations` WHERE reserveid=$this->reserveId;");
        $result = $this->database->fetchArray($result);
        return $result['importerid'];
    }

    public function getGoodId() {
        $result = $this->database->query("SELECT goodsid FROM `reservations` WHERE traderid='$this->traderId' AND importerid='$this->importerId' AND accepted='$this->accepted'&&quantity='$this->quantity';");
        $result = $this->database->fetchArray($result);
        return $result['goodid'];
    }

    
    public function getGoodId2() {
        $result = $this->database->query("SELECT goodsid FROM `reservations` WHERE reserveid=$this->reserveId;");
        $result = $this->database->fetchArray($result);
        return $result['goodsid'];
    }
    public function getDealDate() {
        $result = $this->database->query("SELECT dealdate From `reservations` WHERE reserveid=$this->reserveId");
        $result = $this->database->fetchArray($result);
        return $result['dealdate'];
    }
    
    public function getId(){
     $result = $this->database->query("SELECT reserveid From `reservations` where importerid =$this->importerId AND traderid =$this->traderId AND goodsid =$this->goodId");
     $result = $this->database->fetchArray($result);
        return $result['reserveid'];
    }
    
    public function setId($reserveid){
   $this->reserveId=$this->database->escape($reserveid);
    }

    

    public function getAccepted() {
        $result = $this->database->query("SELECT accepted FROM `reservations` WHERE reserveid=$this->reserveId");
        $result = $this->database->fetchArray($result);
        return $result['accepted'];
    }

    public function getQuantity() {
        $result = $this->database->query("SELECT * FROM `reservations` WHERE reserveid=$this->reserveId");
        $result = $this->database->fetchArray($result);
        return $result['quantity'];
    }

    public function storeReservation() {
        $this->database->query("INSERT INTO `reservations` (`importerid`,`traderid`,`goodsid`,`quantity`) VALUES('$this->importerId','$this->traderId','$this->goodId','$this->quantity');");
        $this->database->query("UPDATE goods SET quantity=quantity-$this->quantity WHERE goodid=$this->goodId");
    }

    
          public function getIdNotification(){
               $query="select reserveid from reservations where importerid=$this->importerId and accepted=0 order  by reserveid DESC";
              // echo $query;
               $result=$this->database->query($query);
        $num_rows = $this->database->numRows($result);  
        $reserveid=array();
         if ( $num_rows> 0) {
              while($row = $result->fetch_assoc()) {
                  $reserveid[]=$row['reserveid'];
              }
              return $reserveid;
         }
          }
          
           public function getIdNotification2(){
              $query="select reserveid from reservations where dealdate=(SELECT Max(dealdate) from reservations where accepted=0 and importerid='$this->importerId')";
               $result = $this->database->query($query);
               $result=$this->database->fetchArray($result);
               return $result['reserveid'];
           }
          
          
    
 public function getNotification1($id){
  $query="select traderid,goodsid,quantity,dealdate from reservations where reserveid=$id order  by reserveid DESC";   
  $result=$this->database->query($query);
   $num_rows = $this->database->numRows($result);  
    if ( $num_rows> 0) {
        while($row = $result->fetch_assoc()) {
            echo "traderid=".$row['traderid']; 
        }
        
    }
  
     
 }
 
  public function getNotifications($start,$end){ 
      /* 
      SELECT goodid,goodname,traderid,importerid,lname,fname,dealdate,R.quantity
      FROM users AS U , goods AS G , reservations AS R 
      WHERE G.userid=R.importerid AND R.importerid='11422430' 
      AND R.traderid=U.userid AND R.goodsid=G.goodid
      AND accepted=0
     range between start row and end row*/
      $start=$start-1; 
      $end=($end-$start)-1;
      $query = "select importerid,traderid,goodsid,dealdate,quantity from goods where reserveid=$this->reserveid   order by importerid=$this->importerId DESC  limit $start,$end ";
      $result= $this->dataBase->query($query); 
      $num_rows = $this->dataBase->numRows($result);
      
         if ( $num_rows> 0) {
     // output data of each row  
        while($row = $result->fetch_assoc()) {
                $text='<li class="list-group-item list-group-item-danger">Trader ';
                $text.='<a href="Profile.php?id="'.$row['traderid'].'" id="TraderName" >'.$row[''].'</a> ';
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

}

$reservation = new rerservation();
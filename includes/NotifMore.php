 <?php
 
    function getNotific($start,$end,$id,$database){
        #range between start row and end row
        $start=$start-1; 
        $end=($end-$start)-1;
    $query = "SELECT goodid,goodname,traderid,importerid,lname,fname,dealdate,R.quantity,reserveid
     FROM users AS U , goods AS G , reservations AS R 
     WHERE G.userid=R.importerid AND R.importerid='$id ' 
     AND R.traderid=U.userid AND R.goodsid=G.goodid
     AND accepted=0 ORDER BY dealdate DESC limit $start,$end";
    
     $result= $database->query($query); 
     $num_rows = $database->numRows($result);
         if ($num_rows>0) {                          
         while($row = $result->fetch_assoc()) {
             $text='<li class="list-group-item list-group-item-danger">Trader ';
             $text.='<a href="Profile.php?id='.$row['traderid'].'" id="TraderName" >'.$row["fname"].' '.$row["lname"].'</a> ';
             $text.=' order quantity of '.$row["quantity"];
             $text.=' good <a href="Product.php?goodid='.$row['goodid'].'" id="GoodName"> '.$row["goodname"].'</a>';
             $text.='<br /><br />';
             $text.='<button type="button" class="btn btn-primary btn-sm" onclick="accept('.$row["reserveid"].',1,event)">Accept</button>&nbsp;&nbsp;&nbsp';
             $text.='<button type=x"button" class="btn btn-warning btn-sm" onclick="accept('.$row["reserveid"].',-1,event)">Refusal</button><br />';
             $text.='<small id="dealDate">'.$row['dealdate'].'</small>';
             $text.='</li></br>';    
             echo $text;                                                              
              }        
         }                           
    }
               
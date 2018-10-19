<?php
if ($_SERVER['REQUEST_METHOD']=='GET'){
  require_once 'good.php';
  require_once 'session.php';
   $good->connectDatabase();
   if(isset($_GET['start']) && isset($_GET['end']) &&checkNum($_GET['start'])&& checkNum($_GET['end']) && $session->isLoggedIn()){
   if(isset($_GET['id'])&&checkNum($_GET['id']))
       $good->setUserId(htmlspecialchars($_GET['id']));
   else {$good->setUserId($session->getUserId());}
   $start=htmlspecialchars($_GET['start']);
    $end =htmlspecialchars($_GET['end']);  
   $result= $good->query($start, $end);
  echo $result;
                
}

   }
   
   function checkNum($value) {
    $arr = str_split($value);
    for ($i = 0; $i < count($arr); $i++) {
        $as = ord($arr[$i]); #ord() Return the ASCII value of character
        if ($as < 48 || $as > 57)
            return false;
    }
    return true;
}
<?php 

class search { 

    private $in; private $res; private $Database;
    function __construct(){
        
        
}
public function setDatabase($database){
    $this->Database=$database;
}
    public function getDatabase(){
        return $this->Database;
    }
    public function set_in($in){
    $this->in=$this->Database->escape($in);
    $this->in=ltrim($this->in);
    $this->in=rtrim($this->in);
        return $this->in;
    }
        
   public function search(){
       if(strlen($this->in) < 3){
           $query="SELECT userid,Address,fname,lname FROM users
        WHERE fname LIKE('$this->in%') OR lname LIKE('$this->in%')";
           $this->res=$this->Database->query($query);
           return $this->get_res();
       }
       
       $ex_in=explode(' ',$this->in); #explode input to fname and lname
        $fname=@$ex_in[0];
        $lname=@$ex_in[1];


       $query="SELECT userid,Address,fname,lname FROM users
        WHERE fname ='$fname' OR lname='$lname' OR fname='$lname' OR  lname='$fname' ";
       $this->res=$this->Database->query($query); #exact matching
       
       if($this->Database->numRows($this->res)>0){
               return $this->get_res();
       }
       else if(strlen($fname)>2){#inaccurate search
          
            $fname_del_first=substr($fname, 1); #fname without first char
            $fname_del_last=substr($fname,0, -1); #fname without last char 
            if($lname!=""){
            $lname_del_first=substr($lname, 1); #lname without first char
            $lname_del_last=substr($lname,0,-1);#lname withlout last char  
            }
          $query="SELECT userid,Address,fname,lname FROM users ";
          $query.="WHERE fname LIKE('%$fname_del_first%')OR fname LIKE('%$fname_del_last%') ";
          $query.="OR lname LIKE('%$fname_del_first%')OR lname LIKE('%$fname_del_last%') ";
           if($lname!="" && strlen($lname)>2){$query.="OR fname LIKE('%$lname_del_first%')OR fname LIKE('%$lname_del_last%') ";
           $query.="OR lname LIKE('%$lname_del_first%')OR lname LIKE('%$lname_del_last%') ";}
            $this->res=$this->Database->query($query);
            if($this->Database->numRows($this->res)>0){
               
       }
       
            
       }
       else { $query="SELECT userid,Address,fname,lname FROM users"
            
               ;}
       
       return $this->get_res();
   }
    public function good_search(){
        $goodname=$this->Database->escape($_POST['adv_in']);
        $goodtype=$this->Database->escape($_POST['good_type']);
        $goodprice_min=$this->Database->escape($_POST['min_price']);
        $goodprice_max=$this->Database->escape($_POST['max_price']);
        
        
        $flag=false;
        $query="SELECT goodid , userid, goodname , goodtype , goodprice FROM goods WHERE Deleted=0";
         if(!empty($goodname)){$query.=" AND goodname=('$goodname')";$flag=true;}
        if(!empty($goodtype)){$query.=" AND goodtype =('$goodtype') ";$flag=true;}
        if(!empty($goodprice_min)){$query.=" AND goodprice >= $goodprice_min ";$flag=true;}
        if(!empty($goodprice_max)){$query.=" AND goodprice <= $goodprice_max ";$flag=true;}
        if(!$flag){$query.=" AND false";}
        $this->res=$this->Database->query($query);
          return $this->get_res();  
        
        }
       
    public function importer_search(){
        $username=$this->Database->escape($_POST['adv_in']);
        $Address=$this->Database->escape($_POST['Address']);
        $companyname=$this->Database->escape($_POST['companyname']);
        $companytype=$this->Database->escape($_POST['companytype']);
        $phone=$this->Database->escape($_POST['phone']);
        $ex_in=explode(' ',$username);
        $fname=@$ex_in[0];
        $lname=@$ex_in[1];
            
        $query="SELECT userid,username,Address,fname,lname FROM users 
        WHERE true ";
        $flag=false;
        if (!empty($fname)){$query.=" AND fname='$fname' ";$flag=true;}
        if (!empty($Address)){$query.=" AND address='$Address' ";$flag=true;}
        if (!empty($companyname)){$query.=" AND companyname='$companyname' ";$flag=true;}
        if (!empty($companytype)){$query.=" AND companytype='$companytype' ";$flag=true;}
        if (!empty($phone)){$query.=" AND phone=$phone ";$flag=true;}
         if(!$flag)$query.=" AND false";
        $this->res=$this->Database->query($query);
        return $this->get_res();
    
    }
    
    public function get_res(){
    return $this->res;
    }
    
     public function getImgProfile($id){
       $imgProfile="../users/user".$id."/Images/Profile/uploads/medium/profile.jpg";
       if(file_exists($imgProfile));
else $imgProfile="../images/profile.png";
          return $imgProfile;
    }
}

$search=new search();
?>
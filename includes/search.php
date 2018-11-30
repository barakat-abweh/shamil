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
    public function property_search(){
        $query="SELECT `property_id`, `property_name`, `area`, `city_id`, `description`, `price`, `type`, `creation_date` FROM `property` WHERE `deleted`=0 AND (`property_name` LIKE '%$this->in%' OR `description` LIKE '%$this->in%')";
        $this->res=$this->Database->query($query);
          return $this->get_res();  
        
        }
    
    public function get_res(){
    return $this->res;
    }
}

$search=new search();
?>
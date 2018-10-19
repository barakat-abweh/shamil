<?php

class cookies{

    public function setCookie($name,$value=null,$expire=null,$path=null,$domain=null,$secure=null,$httponly=null){
      
        $set=setcookie($name,$value,$expire,$path,$domain,$secure,$httponly);
        return $set;
        //@return string|boolean false for failure
    }
    public function getcookie($name){ 
        if(isset($_COOKIE) && is_array($_COOKIE) && array_key_exists($name,$_COOKIE)){
            return $_COOKIE[$name];
        }
        return false;
    }
    
    /**
     * Unset a cookie by name
     * @param string $name
     * @return boolean
     */
    
    public function unsetCookie ($name){
        if($this->getCookie($name)!=false){
            unset($_COOKIE[$name]);
            setcookie($name,"",time()-3600);
            return true;
        }
        return false;
    }
    
    public function checkLogIn($name,$value){
        if(isset($_COOKIE[$name]) && $_COOKIE[$name]==$value)return true;
        else return false;
        
    }

}

$cookie=new cookies();


?>
<?php

class User_class{
    private $prefix = "ADAPRIME_";
    
    public function stick($var){
        return $prefix.$var;
    }
    
  	public function authenticity($username, $password){
  		// Unimplemented
     
  		return true;
  	}
    
    public function isLoggedin(){
        if(isset($_SESSION[$this->prefix.'PASS']) && isset($_COOKIE[$this->prefix.'NAME'])){
            if($this->authenticity($_SESSION[$this->prefix.'PASS'], $_COOKIE[$this->prefix.'NAME']))
                return true;
        }
        return false;
    }
    
    public function _login($username, $password){
        setcookie($this->prefix.'NAME', $username, time() + (2000), "/");
        $_SESSION[$this->prefix.'PASS'] = $password;
    }
    
    public function login($username, $password){
        $this->_login($username, $password);
        
    }
    
    public function logout(){
        setcookie($this->prefix.'NAME', "", time() - (3600), "/");
        $_SESSION[$this->prefix.'PASS'] = "";
    }
    
    public function getUsername(){
        if($this->isLoggedin())
            return $_COOKIE[$this->prefix.'NAME'];
        return '';
    }
    
    // add function for getting gender
    
    public function getPassword(){
        if($this->isLoggedin())
            return $_SESSION[$this->prefix.'PASS'];
        return '';
    }
    
    public function refresh(){
        if($this->isLoggedin()){
            $this->_login($this->getUsername(), $this->getPassword());
        }
    }
    
    public function checkRedirectLogin($var){
        if(!$this->isLoggedin()){
            header('location: '.$var);
        }
    }
}


session_start();
$User = new User_class();

//echo 'hello';

if(isset($_REQUEST['logout'])){
    $User->logout();
    
}
else if($User->isLoggedin()){
    $User->refresh();
}



?>
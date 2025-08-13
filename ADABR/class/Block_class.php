<?php

class Block_class{
    private $db;
    
    public function __construct($host, $username, $password, $db){
        $this->db = mysqli_connect($host, $username, $password, $db);
        
        if(!$this->db)
            echo "Database failure";
    }
	
	public function block_UpdateTable($username){
		$sql="INSERT INTO adabr_user_status (`username`) VALUES ('".$username."')";
  
		$result = mysqli_query($this->db, $sql);
	  //echo $sql;
  }
  
  public function CheckBlock($username){
    $sql="SELECT COUNT(*) `count` from adabr_user_status WHERE `username` = '".$username."'";
    $result = mysqli_query($this->db, $sql);
    $row = mysqli_fetch_array($result);
    if($row['count'] == 1)
            return true;
        return false;
  
}
  public function UnBlockUser($username){
    $sql="DELETE FROM adabr_user_status WHERE `username`= '".$username."'";
    $result = mysqli_query($this->db, $sql);

}
}  
$Block=new Block_class('localhost', 'root', 'pritam@123', 'gourav1');   
?>
<?php

class Update_class{
    private $db;
    
    public function __construct($host, $username, $password, $database){
        $this->db = mysqli_connect($host, $username, $password, $database);
        
        if($this->db == NULL){
            echo "Database Error in Updates";
        }
    }
    
    public function getTextList($len = 10){
        $sql = "SELECT * FROM `common_updates` ORDER BY `priority` asc, `time` desc";
        //echo $sql;
        
        $output = [];
        $c = 0;
        
        $result = mysqli_query($this->db, $sql);
        while($row = mysqli_fetch_array($result)){
            $output[] = $row['text'];
            $c++;
        }
        
        for(; $c < $len; $c++){
            $output[] = "";
        }
        
        return $output;
    }
}

$Update = new Update_class("localhost", "root", "pritam@123", "gourav1");

?>
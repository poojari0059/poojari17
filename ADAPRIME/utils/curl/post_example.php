<?php
//$curl = curl_init('http://www.techflirt.com');
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//$result = curl_exec($curl);
//$info = curl_getinfo($curl);
//print_r($info);
//curl_close($curl);


class Value_util{
    public $user_fullname;
    
    public function __construct($user_id, $user_fullname){
        //$this->user_id = $user_id;
        $this->user_fullname = $user_fullname;
    }
}

class Value{
    public $status_code;
    public $message;
    
    public function __construct( $val, $val1, $val2 ){
        $this->status_code = $val;
        $this->message = new Value_util($val1, $val2);
    }
}

$val = new Value( 200, 1234, "Abhinav");

$result = json_encode( $val );

//$result = str_replace("\"", " ", $result); 



//$result = "OUTPUT";

echo $result;

?>


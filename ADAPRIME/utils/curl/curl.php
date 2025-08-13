<?php


/*
$input = array(
	'fname' => urlencode("Hello")
);
*/

include "curl_function.php";

function makeRequest($user_email, $user_pass, $event_id, $event_secret, $use_orig_link = false, $debug = false){
    //echo "Make Request Started - ".$user_email." ".$user_pass." ".$event_id." ".$event_secret."<br/>";
    
    $fields = array(
	      'user_email' => urlencode($user_email),
        'user_pass' => urlencode($user_pass),
        'event_id' => urlencode($event_id),
        'event_secret' => urlencode($event_secret)
    );
    
    if( !$use_orig_link ){
        $url = 'localhost/curl/post_example.php';
    }
    else{
        $url = 'https://api.pragyan.org/event/login';
        //$url = 'localhost/curl/post_example.php';
    }
    
    $fields_string = "";
    foreach($fields as $key=>$value) { 
        $fields_string .= $key.'='.$value.'&'; 
    }
    
    rtrim($fields_string, '&');
    
    $ch = curl_init();
    
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    
    $ret = curl_exec($ch);
    
    if (empty($ret)) {
        // some kind of an error happened
        die(curl_error($ch));
        curl_close($ch); // close cURL handler
    } else {
        $info = curl_getinfo($ch);
        curl_close($ch); // close cURL handler
    
        if (empty($info['http_code'])) {
                //die("No HTTP code was returned");
                return array("", "", ""); 
        } else {
            // load the HTTP codes
            $http_codes = parse_ini_file("codes.txt");
            
            // echo results
            //echo "The server responded: <br />";
            //echo $info['http_code'] . " " . $http_codes[$info['http_code']];
            //echo "<br/>";
            //echo "<br/>";
            //print_r($ret);
            
            if($debug){
                $ret = '{
                    "status_code" : 200,
                    "message" : {
                        "user_fullname" : "John"
                    }
                }';
                
                if($user_email == "cppxaxa@gmail.com"){
                    $ret = '{
                        "status_code" : 400,
                        "message" : {
                        }
                    }';
                }
            }
            
            
            //$ret = curl_function($ret);
            
            //echo $ret;
            
            $ret = json_decode( $ret );
            
            //echo "<br/>";
            //echo $ret->status_code;
            
            $return = [];
            $return[] = $ret->status_code;
            $return[] = '';
            $return[] = '';
            
            //$return[0] = $info['http_code'];
            if($return[0] == 200){
                //$return[1] = $ret->message->user_id;
                $return[2] = $ret->message->user_fullname;
            }
            
            return $return;
        }
    }    
}

//print_r ( makeRequest("jabhinav11@gmail.com", "password", "4", "jdbsfhdsvkhvkqhj2h13474367&^&%#TGHdbsnvdh23432")  );

?>


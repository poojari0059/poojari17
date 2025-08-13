<?php

include 'class/Question_class.php';
include 'utils/utils.php';
include 'class/User_class.php';

$User->checkRedirectLogin('login.php');

include 'class/final_arrangement.php';

if($User->isLoggedIn()){
    
    //echo $User->getUsername()." ".$User->getPassword();
    if($Database_P->authenticate( $User->getUsername(), $User->getPassword() )){
      
        echo "Proper credential, refresh time<br/>";
        //echo '<a href="_login.php?logout" target="blank">Logout</a>';
        //$User->login( $User->getUsername(), $User->getPassword() );
        //$User->refresh();
        header("location: get_started.php");
    }
    else{
        header("location: login.php?logout");
        //echo "do Logout<br/>";
        //echo '<a href="_login.php?logout" target="blank">Logout</a><br/>';
        //echo '<a href="_login.php">Refresh</a><br/>';
    }
 //   echo '<script> alert("Hello") </script> ';
}
else{
    header("location: login.php");
}


?>

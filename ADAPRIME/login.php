
<?php

include 'class/Question_class.php';
include 'class/User_class.php';
include 'class/Database_class.php';

$debug_no_redirect = false;

if($User->isLoggedIn()){
    header("location: get_started.php");
}
else{
    header("location: ../login.php");
}

?>
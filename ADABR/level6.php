<?php

include 'class/Database_class.php';
include 'class/User_class.php';
include 'utils/utils.php';

$level = $Database->getLevel( $User->getUsername() );

header('location: login.php');

$User->checkRedirectLogin('login.php');

include 'class/final_arrangement.php';


?>

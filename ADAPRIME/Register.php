<?php  
  include 'class/Database_class.php';
  include '../ADABR/class/Database_BR_class.php';
  
  
  $any_error = false;
  
  
  //include 'C:\wamp\www\mixnmatch\Database_class2.php' ;
		$fullname="";
	      $username="";
	      $email="";
	      $number="";
	      $gender="";
          $passwd="";
	      $fullnameerr="";
	      $usernameerr="";
	      $emailerr="";
	      $numbererr="";
		  $gendererr="";
		  $passwderr="";	
		  $exist="";
		  $invalid="";
if (isset($_REQUEST['submit'] ) )  {
		  $fullname="";
	      $username="";
	      $email="";
	      $number="";
	      $gender="";
          $passwd="";
	      $fullnameerr="";
	      $usernameerr="";
	      $emailerr="";
	      $numbererr="";
		  $gendererr="";
		  $passwderr="";	
	      if(empty($_POST["fname"]))
			   $fullnameerr="This Field Is Empty";
		  else if(!preg_match("^[a-zA-Z\s\.]+$^",$_POST["fname"]))
			   $fullnameerr = "Name is not valid";
		  else
			   $fullname=$_POST["fname"];
		 

		 if($Database->checkusername($_POST["username"]))
			  $usernameerr="Username already exist";
		  else if(empty($_POST["username"]))
			    $usernameerr="This Field Is Empty";
		  else if(strlen($_POST["username"])<4 && strlen($_POST["username"])>30)
				 $usernameerr="Username Length 4 - 30" ;
		  else
				 $username=$_POST["username"];
			 
		  if(empty($_POST["password"]))
			  $passwderr="This Field Is Empty";
		  else if(strlen($_POST["password"])<5 && strlen($_POST["password"])>30)
			    $passwderr="Password Length 5 - 30";
		  else 
			  $passwd=$_POST["password"];
		  
		  if(empty($_POST["gender"]))
			   $gendererr="This Field Is Empty";
          else
                $gender=$_POST["gender"];
			
		  if(empty($_POST["email"]))
			   $emailerr="This Field Is Empty";
		  else if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
			   $emailerr = "Not a valid email address";
		  else
			   $email=$_POST["email"];
		   
		  if(empty($_POST["mnumber"]))
			   $numbererr="This Field Is Empty";
          else if (!preg_match('^(\+?)(?:\d(?:-)?){9,13}$^', $_POST["mnumber"])) {
                 $numbererr="Invalid Number";
				 } 
		  else $mobile =($_POST["mnumber"]);
		  
		  if($numbererr==""&&$emailerr==""&&$gendererr==""&&$passwderr==""&&$usernameerr==""&&$fullnameerr=="")
		  {
			  if(!$Database->alreadyexist($email))
			  {
			   //code api
			  $check=true;
			  if($check)
			  {
				  if($Database->register($fullname,$username,$passwd,$gender,$email,$mobile))
				  {
             $Database_BR->updateUser($username, $passwd);
					  echo '<script> alert("Succesfully Registered") </script>';
					  
					  //header('Location: http://localhost/login.php');
				  }
			  }
			  else{
    				//Invalid credentials  
				$invalid="Invalid Credentials";
				echo '<script> alert("Invalid Credentials") </script>';
			    }
			 }
            else{
				   // echo user already exist
				   $exist="User already exist!";
				   echo '<script> alert("User Already Exist") </script>';
			    }				
		  }
      else{
          $any_error = true;
      }
		//header('Location: http://localhost/regform.php?emailerr='.$emailerr);  
	   }
	   
?>
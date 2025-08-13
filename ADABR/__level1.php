<?php

include 'class/Database_class.php';
include 'class/User_class.php';
include '../ADAPRIME/class/Phpmailer_class.php';


$level = $Database->getLevel( $User->getUsername() );

if( $level != 1){
    //header('location: level'.$level.'.php');
    header('location: get_started.php');
}

$User->checkRedirectLogin('login.php');

function calcPassword($username){
    $password = "1234567890";
    $username = strtolower( $username);
    
    for($i = 0; $i < strlen($password); $i++){
        if($i % 2 == 0){
            $password[$i] = chr( ord($username[$i]) + 5 + ord($password[$i]));
            //echo $username[$i];
            //$password[$i] = chr( (ord($username[$i]) + 5 + ord($password[$i])) );
            
            //if(ord($password[$i]) > ord("z"))
                //$password[$i] = chr('a');
            if(ord($password[$i]) > ord("z"))
                $password[$i] = chr(ord("a"));
                
            //echo (($password[$i]));
                
            //echo $password[$i]." ".($password[$i])."<br/>";
        }
        else{
            $password[$i] = chr( ord($username[$i]) + 1);
            //echo ($password[$i]);
            //echo $username[$i];
            /*$password[$i] = chr( (ord($username[$i]) + ord($password[$i])) );
            if(ord($password[$i]) > ord('z'))
                $password[$i] = 'a';
                 * */
            if(ord($password[$i]) > ord("z"))
                $password[$i] = chr(ord("a"));
                
            //echo (($password[$i]));
        }
    }
    
    //echo $password;
    
    return $password;
}

if(isset($_REQUEST['password']) && isset($_REQUEST['username']) && $_REQUEST['username'] != "cppxaxa@gmail.com"){
    $password = calcPassword($_REQUEST['username'], $_REQUEST['password']);
    
    //echo $_REQUEST['password']." == ".$password;
    
    if($_REQUEST['password'] == $password)
        header('location: process1.php?password='.$password.'&username='.$_REQUEST['username']);
}

include 'class/final_arrangement.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Adaventure'17</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/pure-min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="icon" type="image/png" href="images/ada1.png">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

  </head>
  <body>
      
      
      
    <div class="cover"></div>
           
    <div class="container">
      <div class="sky">
        <div class="stars"></div>
        <div class="stars1"></div>
        <div class="stars2"></div>
        <div class="shooting-stars"></div>
      </div>
    </div>
      
      
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php include 'modules/titlebar.php'; ?>
            </div>
        </div>
        
        <?php include 'modules/adabrleader.php'; ?>
        
        <?php include 'modules/adaprimeleader.php'; ?>
        
        
        <div class="row">
            <div class="col-md-12">
                <!--  notification  -->
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    
<textarea readonly style="padding: 20px; outline: none; border: none; border-radius:10px; width: 100%; height: 110px; resize: none;">Instructions
You have to hack your way through the username and password.
Hint 1 : Backend is powered by a primitive SQL!</textarea>
                    
                    
                    <div class="col-md-9" style="background:white; top:50px; height:400px; border-radius:10px;">
                        
						
                        <div class="bg-info" style="padding: 10px; margin-bottom: 10px;"><h3>LEVEL 1</h3></div>
                        
                        <?php
                            if(! isset($_REQUEST['forgotpassword'])){
                        ?>
                        
                        <form class="form-horizontal" method="POST">
                        <fieldset>

                        <!-- Form Name -->
                        <legend>Access Terminal</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="username">Username</label>  
                          <div class="col-md-5">
                          <input id="username" name="username" type="email" placeholder="Username" class="form-control input-md" required="" value="">
                            
                          </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="password">Password</label>
                          <div class="col-md-5">
                            <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" value="">
                            
                          </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="login"></label>
                          <div class="col-md-4">
                            <button id="login" type="submit" name="login" class="btn btn-primary" value="login">LOGIN</button>
                          </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="forgetpassword"></label>
                          <div class="col-md-4">
                            <button id="forgotpassword" type="submit" name="forgotpassword" class="btn btn-default" value="forgotpassword">FORGOT PASSWORD ?</button>
                          </div>
                        </div>

                        </fieldset>
                        </form>
                        
                        <?php
                            }
                            else if(isset($_REQUEST['checkanswer'])){
                        ?>
                        
                        
                        <form class="form-horizontal" method="POST">
                        <?php
                        
                        $flag = true;
                        $count = 0;
                        
                        $string = $_REQUEST['answer'];
                        
                        for($i = 0; $i < strlen($string); $i++){
                            if($string[$i] == '='){
                                $count++;
                            }
                            else if(!ctype_digit($string[$i]))
                                $flag = false;
                        }
                        
                        
                        
                        $q = 0;
                        
                        if(trim($string) == "' OR '1'='1")
                            $q = 1; 
                            
                        if(trim($string) == '" OR "1"="1')
                            $q = 1; 
                        
                        if(trim($string) == "' OR '1'=='1")
                            $q = 1; 
                        
                        if(trim($string) == '" OR "1"=="1')
                            $q = 1; 

                        if(trim($string) == "' OR '1'='1' --")
                            $q = 1; 
                        if(trim($string) == "' OR '1'='1' ({")
                            $q = 1; 
                        if(trim($string) == "' OR '1'='1' /*")
                            $q = 1; 
                        
                        
                        //if($string[0] == "'")
                            //echo "True";
                        //else
                            //echo "False";
                        $string = str_replace("'", "", $string);
                        $string = str_replace('"', "", $string);
                        $string = str_replace(" ", "", $string);
                        $string = str_replace("or", "", $string);
                        $string = str_replace("OR", "", $string);
                        $string = str_replace("=", "==", $string);
                        $j = eval('return (int)('.$string.');');
                        //echo "J : ".$j;
                        //echo "String : ".$string;
                        
                        
                        
                        
                        if($j == 1 || $q == 1 || ($flag && $count > 0)){
                            $p = eval('return (int)('.$string.');');
                            
                            
                            if($j == 1 || $q == 1 || $p == 1){
                                $phpmail->sendmail($_REQUEST['username'],'ADABR LEVEL1 INFO','Hello from team <b>Adaventure</b>. You requested to reset your password. Your new password is '.calcPassword($_REQUEST['username']));
                                echo "Thank you ! You have successfully reset your password. Please check your mail.";
                            }
                            else
                                echo 'Please try again !';
                        }
                        else{
                            echo 'Please try again !';
                        }
                        
                        ?>
                        <fieldset>
                        <input type="hidden" name="username" value="<?php echo $_REQUEST['username']; ?>" >
                        <input type="hidden" name="password" value="<?php echo $_REQUEST['password']; ?>" >
                        <input type="hidden" name="forgotpassword" value="<?php echo $_REQUEST['forgotpassword']; ?>" >

                        <!-- Form Name -->
                        <legend>Forgot Password</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="answer">What is your dog's name ?</label>  
                          <div class="col-md-5">
                          <input id="answer" name="answer" type="text" placeholder="Answer" class="form-control input-md" required="" value="">
                            
                          </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="checkanswer"></label>
                          <div class="col-md-4">
                            <button id="checkanswer" name="checkanswer" class="btn btn-primary" type="submit">SUBMIT</button>
                          </div>
                        </div>

                        </fieldset>
                        </form>
                        
                            
                        <?php
                            }
                            else{
                        ?>
                        
                        <form class="form-horizontal" method="POST">
                        <fieldset>
                        <input type="hidden" name="username" value="<?php echo $_REQUEST['username']; ?>" >
                        <input type="hidden" name="password" value="<?php echo $_REQUEST['password']; ?>" >
                        <input type="hidden" name="forgotpassword" value="<?php echo $_REQUEST['forgotpassword']; ?>" >

                        <!-- Form Name -->
                        <legend>Forgot Password</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="answer">What is your dog's name ?</label>  
                          <div class="col-md-5">
                          <input id="answer" name="answer" type="text" placeholder="Answer" class="form-control input-md" required="" value="">
                            
                          </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="checkanswer"></label>
                          <div class="col-md-4">
                            <button id="checkanswer" name="checkanswer" class="btn btn-primary" type="submit">SUBMIT</button>
                          </div>
                        </div>

                        </fieldset>
                        </form>

                        <?php
                            }
                        ?>
                        
                    </div>
                    <div class="col-md-1">
                    </div>
            
                </div>
                
                
            </div>
            <div class="col-md-2">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <!--section>
                  <ul class='services'>
                    <li>
                      <div class='facebook' onclick="window.open('http://www.facebook.com/adaventure','mywindow');">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </div>
                    </li>
                  </ul>
                </section-->
            </div>
        </div>
    </div>
    
    <script>
    function blink(){
      	$("#forgotpassword").animate({opacity:0},200,"linear",function(){
        		$(this).animate({opacity:1},200);
      	});
      }
      setInterval(blink, 1000);
      </script>
      
    
    <!-- Only sql injection is required for solving level1, some are very much secure and some are very weak. The basic sql injection can work. Just imagine how the query will look like after adding concatenating your code and google is your friend for extreme basics. -->
  </body>
</html>
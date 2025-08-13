<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script>
$(document).ready(function(){
    $("#up").hover(function(){
        $("#di").delay(300).slideDown();
    }, function(){
		$("#di").hide();
	});
});
</script>
<?php

include 'class/Question_class.php';
include 'class/User_class.php';
include 'utils/curl/curl.php';
include 'class/Database_class.php';
$login_error = false;
$login_pass = false;

$debug_no_redirect = false;

if(isset($_REQUEST['login'])){
    if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
        $_SESSION["ADAPRIME_user_id"] = $_REQUEST['username'];
        $status_code = makeRequest($_REQUEST['username'],$_REQUEST['password'],4,"9be885d7168f3f993608f7cabbe8dd14",true, false);
        //print_r($status_code);
        if($status_code[0]==200){
            $_SESSION["ADAPRIME_full_name"] = $status_code[2];
            //echo '<script> alert("CHECKPOINT");</script>';
            if($Database->checkexist($_SESSION["ADAPRIME_user_id"])) {
                //Unimplemented - put password
                
                $token = substr(md5(rand()), 0, 10);
                $Database->upd_token($_SESSION["ADAPRIME_user_id"] ,$token);
                $User->login($_SESSION["ADAPRIME_user_id"], $token);
                
                header('location: get_started.php');
            }
            else {
                $login_pass = true;
                $login_error = false;
                
            }
            
        }
        else{
          if($status_code[0]==400){
            echo '<script> alert("Error occurred.<br>Please try again!");</script>';
            $login_error = true;
          }
          else if($status_code[0]==403){
            echo '<script> alert("Error occurred.<br>Please try again!");</script>';
            $login_error = true;
          }
          else if($status_code[0]==412){
            echo '<script> alert("Register for Pragyan.");</script>';
            header('location: https://www.pragyan.org/17/home/events/code_it/adaventure/+login&subaction=register');
            $login_error = true;
          }
          else if($status_code[0]==401){
            echo '<script> alert("Invalid credential.");</script>';
            $login_error = true;
          }
          else if($status_code[0]==406){
            echo '<script> alert("Register for Adaventure.");</script>';
            header('location: https://www.pragyan.org/17/home/events/code_it/adaventure/+login&subaction=register');
            $login_error = true;
          }
          $login_error = true;
            // SHOW ERROR
        }
    }
}

if(isset($_REQUEST['flogin']) && isset($_REQUEST["gender"])){
        // INSERT IN DATABASE
        if(isset($_SESSION["ADAPRIME_user_id"]) && isset($_SESSION["ADAPRIME_full_name"]) && $_SESSION["ADAPRIME_user_id"] != "" && $_SESSION["ADAPRIME_full_name"] != "" ){      
            //echo '<script> alert("entered flogin"); </script>';
            if($Database->register($_SESSION["ADAPRIME_user_id"],$_SESSION["ADAPRIME_full_name"],$_REQUEST["gender"])){
                
                
                // 2nd table don't have entry
                $token = substr(md5(rand()), 0, 10);
                $Database->ins_token( $_SESSION["ADAPRIME_user_id"], $token );
                $User->login( $_SESSION["ADAPRIME_user_id"], $token );
                
                //echo 'xaxa19';
                $login_pass = false;
                // Unimplemented - put password
                
                //$User->login($_SESSION["ADAPRIME_user_id"], "");
                
                if(!$debug_no_redirect)
                    header('location: ../');
            }
            else {
                //ERROR
                echo '<script> alert("Try Again!!\nIf problem persists, contact administrator."); </script>' ;
                $login_pass = false;
            }
             
        }
    else{
        echo $_SESSION["ADAPRIME_user_id"].$_SESSION["ADAPRIME_full_name"];
    }
}

if($User->isLoggedin()){
    //header('location: get_started.php'.'?'.$User->getUsername());
}

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

  </head>
  <body>
      
      
      
    <div class="cover"></div>
           
    <?php include 'modules/starbackground.php'; ?>
      
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-inverse">
                  <div class="container-fluid mytnav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <!--a class="navbar-brand" href="#">Adaventure</a-->
                        <a href="#"><img src="images/ada.png" id="adaimage"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                          <!--li class="active"><a href="#" class="navmenu">Home</a></li-->
                          <li><a href="https://www.pragyan.org/17/home/" class="navmenu"><b>PRAGYAN'17</b></a></li>
                          <li data-toggle="modal" data-target="#prmodal"><a href="#" class="navmenu">Adaventure Prime</a></li> 
                          <li data-toggle="modal" data-target="#myModal"><a href="#" class="navmenu">Break-n Ride</a></li> 
                           
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
                          <li id="btnRegister"><a href="https://www.pragyan.org/17/home/events/code_it/adaventure/+login&subaction=register" class="navmenu">
                              <span class="glyphicon glyphicon-user"></span>&nbsp; Register</a></li>
                          <li><a href="#"  data-toggle="modal" data-target="#login-modal" id="btnLogin" class="navmenu">
                              <span class="glyphicon glyphicon-log-in"></span>&nbsp; Login</a></li>
                        </ul>
                    </div>
                  </div>
                </nav>
                
            </div>
        </div>
                <img style=" width:250px; max-width:33%; right:30px; position:absolute;" src="images/sponsorlogo.png" >
        
        <div class="row">
            <div class="col-md-12">
                <div id="modalLogin" style="background: linear-gradient(to left, #00d2ff , #3a7bd5);">
                    <form class="pure-form" method="GET">
                        <input required='' id="username" name="username" type="email" placeholder="Enter Your Username">
                        <input required='' id="password" name="password" type="password" placeholder="Enter Your Password">

                        <button id="login" type="submit" name="login" class="pure-button pure-input-1 pure-button-primary" style="height: 38px; font-family: cursive;"> Login </button>
                        <a href="https://www.pragyan.org/17/home/events/code_it/adaventure/+login&subaction=resetPasswd" style="color:white;"> Forgot Password?</a>
                    </form>
                </div>
                <?php
                if($login_pass){
                ?>
                <div id="modalLogin1" style="background: linear-gradient(to left, #00d2ff , #3a7bd5);">
                    <form class="pure-form" style="padding:20px;" method="GET">
                        <input type="radio" style="margin-left:100px; margin-top:10px;" id="gender" name="gender" value="m" checked>&nbsp;<label for="gender" style="font-size:15px;"> Male </label><br>
                        <input type="radio" style="margin-left:100px;" name="gender" value="f">&nbsp;<label for="gender" style="font-size:15px;"> Female </label><br>
                        <button id="flogin" style="margin-top:20px;" type="submit" name="flogin" class="pure-button pure-input-1 pure-button-primary" style="height: 38px; font-family: cursive;"> Login </button>
                        
                    </form>
                </div>
                
                <?php
                    }
                ?>
                
            </div>
        </div>
        
        
        
        <?php include 'modules/__adaprimeleader.php'; ?>
        
        <?php include 'modules/adabrleader.php'; ?>
        
        <ul class="navss1" >
          <li class="els1" data-toggle="modal" data-target="#prmodal">Ada Prime Leader</li>
          <li class="els1" data-toggle="modal" data-target="#myModal">Break-n Ride Leader</li>
          <li class="els1"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; About Us</li>
          <li class="els1"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp; Contact Us</li>
        </ul>
        
        <?php include 'class/Update_class.php'; ?>
            <div class="update1" id="up" style="font-family: arial;">ADAVENTURE UPDATES    
                    <div style=" color: white; font-family:arial; text-color:blue; font-size:18px; display: none;" id="di" >
                    <?php
                        $len = 10;
                        $list = $Update->getTextList( $len );
                        echo '<div style="margin-top: 50px; background-color:rgba(0, 0, 0, 0.4); margin:3px; height: 2px; margin-bottom: 20px; "></div>';

                        for($i = 0; $i < $len; $i++){
                            if($list[$i] != "")
                                echo '<div style="margin-top: 50px; font-size: 16px; background-color:rgba(255,255,255,0.1);  margin:8px; padding:3px; ">'.$list[$i]."</div>";
                        }
                    ?>
                </div>
            </div>
        

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!--
        <img class="fbsocial" src="images/fbsocial.png" onclick="window.open('http://www.facebook.com/adaventure','mywindow');">
        -->
    </div>
    
    <?php
        if($login_error) {
    ?>
          <script>
              function setModalLoginVisibleFalse(){
                  modalLoginVisible1 = true;
                  //alert(modalLoginVisible1);
                  $("#modalLogin").slideDown(500);
                  $(".cover").fadeIn(500);
              }
              $(document).ready(function(){
                  setTimeout(setModalLoginVisibleFalse, 100);
              });
              
              
          </script>
    <?php
        }
        if($login_pass) {
    ?>
          <script>
              function setModalLoginVisibleFalse(){
                  modalLoginVisible1 = true;
                  //alert(modalLoginVisible1);
                  $("#modalLogin").slideUp(500);
                  $("#modalLogin1").slideDown(500);
                  $(".cover").fadeIn(500);
              }
              $(document).ready(function(){
                  setTimeout(setModalLoginVisibleFalse, 100);
              });
              
              
          </script>
    <?php
        }
    ?>                    
    
    <script>
    
    $(document).ready(function(){
        $("#cover").click(function(e){
            $("#modalLogin").slideUp();
        });
    });
    
    </script>
    
  </body>
</html>
<?php

include 'class/Database_class.php';
include 'class/User_class.php';

$level = $Database->getLevel( $User->getUsername() );

if( $level != 3){
    header('location: level'.$level.'.php');
}

$User->checkRedirectLogin('login.php');

include 'class/final_arrangement.php';



$flag = false;

if(isset($_REQUEST['password']) && isset($_REQUEST['module']) && isset($_REQUEST['username'])){
    //echo $_REQUEST['password']." == ".$password;
    
    if($_REQUEST['password'] == "AI_rocks!" && $_REQUEST['module'] == "/ai/x0" && $_REQUEST['username'] == "root"){
        //header('location: process1.php?password='.$password.'&username='.$_REQUEST['username']);
        $Database->updateScore($User->getUsername(), 3);
        $Database->setLevel($User->getUsername(), 4);
        
        $flag = true;
        //echo "Done";
    }
    else
        header('location: level3.php');
}
else
    header('location: level3.php');


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
                <nav class="navbar navbar-inverse">
                  <div class="container-fluid" style="padding-top:5px; padding-bottom:5px;">
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
                          <li><a href="#" class="navmenu"><b>PRAGYAN'17</b></a></li>
                          <li><a href="#" class="navmenu">Adaventure Prime</a></li> 
                          <li><a href="#" class="navmenu">Break-n Ride</a></li> 
                          <!--li><a href="#" class="navmenu">Mix-n-Match</a></li--> 
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="#" class="navmenu"><span class="glyphicon glyphicon-user"></span>&nbsp; Register</a></li>
                          <li><a href="#"  data-toggle="modal" data-target="#login-modal" id="btnLogin" class="navmenu">
                              <span class="glyphicon glyphicon-log-in"></span>&nbsp; Login</a></li>
                        </ul>
                    </div>
                  </div>
                </nav>
                <div id="modalLogin" style="background: linear-gradient(to left, #00d2ff , #3a7bd5);">
                    <form class="pure-form">
                        <input required='' type='text' placeholder="Enter Your Username">
                        <input required='' type='password' placeholder="Enter Your Password">

                        <!--fieldset class="pure-group">
                            <input type="text" class="pure-input-1" placeholder="Username" />
                            <input type="password" class="pure-input-1" placeholder="Password" />
                        </fieldset-->

                        <button type="submit" class="pure-button pure-input-1 pure-button-primary" style="height: 38px; font-family: cursive;">
                            <!--span class="glyphicon glyphicon-log-in"></span--> Login
                        </button>
                        <a href="#" style="color:white;"> Forgot Password?</a>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <!--  notification  -->
            </div>
        </div>
        
        <!-- /modal -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myLargeModalLabel">Mixer Board</h4>
                </div>
                <div class="modal-body">
                <img src="http://i.imgur.com/YZ7AGyF.jpg.jpg" class="img-responsive img-rounded center-block" alt="">
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <!--ul class="navss" >
          <li class="els">Adaventure Prime</li>
          <li class="els">Break-n Ride</li>
          <li class="els"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; About Us</li>
          <li class="els"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp; Contact Us</li>
        </ul-->
        
        <div class="update">
            Adaventure Updates
        </div>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6" style="background:white; top:150px; height:200px; border-radius:10px;">
                        
						
                        
                    <?php
                    
                    if($flag){
                    
                    ?>
    
						<div style="padding: 20px;">
                            <i class="fa fa-info" style="background: black; color: aqua; width: 30px; height: 30px; padding:8px; border-radius: 100px;"></i>
                            Congrats, you have solved Level 3

						</div>
                        <a href="get_started.php" style="margin-left: 70px;"><button class="btn bt-primary">GO</button></a>
                    
                    <?php
                    
                    }
                    else{
                    
                    ?>
                    
                    <a href="get_started.php" style="margin-left: 0px;"><button class="btn bt-primary">GO BACK</button></a>
                    
                    
                    <?php
                    
                    }
                    
                    ?>
                    </div>
                    <div class="col-md-3">
                    </div>
            
                </div>
                
                
            </div>
            <div class="col-md-2">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <section>
                  <ul class='services'>
                    <li>
                      <!--div class='facebook' onclick="location.href='http://www.facebook.com/adaventure'; target='_new';"-->
                      <div class='facebook' onclick="window.open('http://www.facebook.com/adaventure','mywindow');">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </div>
                    </li>
                  </ul>
                </section>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
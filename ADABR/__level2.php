<?php

include 'class/Database_class.php';
include 'class/User_class.php';

$level = $Database->getLevel( $User->getUsername() );

if( $level != 2){
    //header('location: level'.$level.'.php');
    header('location: get_started.php');
}

$User->checkRedirectLogin('login.php');

/*
if(isset($_COOKIE['EGOERA']) && isset($_REQUEST['username']) && $_REQUEST['username'] == 'admin'){
    if( $_COOKIE['EGOERA'] == "ECqUOuOPPQv8nfl9J3e7SBCEc4mZDaeqBeSkwsFpdc8=")
        header("location: process2.php?username=".$_REQUEST['username']."&password=".$_REQUEST['password']."&egoera=".$_COOKIE['EGOERA']);
}
*/

if(isset($_COOKIE['EGOERA'])){
    if( $_COOKIE['EGOERA'] == "ECqUOuOPPQv8nfl9J3e7SBCEc4mZDaeqBeSkwsFpdc8=")
        header("location: process2.php?username=admin&password=".$_REQUEST['password']."&egoera=".$_COOKIE['EGOERA']);
}
else{
//echo "Hello";
//echo $_COOKIE['EGOERA'];

    setcookie("EGOERA", "slyMlZpG2Cj6KFDZel18BPcZtJIOvD/+BVRwOsmIoDE=", time() + (200), "/");
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
        
        
        
        <!--ul class="navss" >
          <li class="els">Adaventure Prime</li>
          <li class="els">Break-n Ride</li>
          <li class="els"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; About Us</li>
          <li class="els"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp; Contact Us</li>
        </ul-->
        
        <!--div class="update">
            Adaventure Updates
        </div-->

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    
<textarea readonly style="padding: 20px; outline: none; border: none; border-radius:10px; width: 100%; height: auto; resize: none;">Instructions
You have to hack your way through the username and password.</textarea>
                    
                    
                    <div class="col-md-9" style="background:white; top:50px; height:300px; border-radius:10px;">
                        
                        <div class="bg-info" style="padding: 10px; margin-bottom: 10px;"><h3>LEVEL 2</h3></div>
                        
                        <div id="btnAdmin" style="margin-bottom: 20px; width: 150px; height:70px; color: white; background: #00F; padding: 10px; margin-right: 10px; float: left;" onMouseOver="this.style.background='#0F0'; this.style.color='#000'" onMouseOut="this.style.background='#00F';  this.style.color='#FFF'" >
                            <div style="font-size: 20px;">admin</div>
                            <div style="padding-left: 30px; background: rgba(0, 255, 0, 0.3);">online</div>
                        </div>
                        
                        <div id="btnGuest" style="margin-bottom: 20px; width: 150px; height:70px; color: white; background: #00F; padding: 10px; margin-right: 10px; float: left;" onMouseOver="this.style.background='#0F0'; this.style.color='#000'" onMouseOut="this.style.background='#00F';  this.style.color='#FFF'" >
                            <div style="font-size: 20px;">guest</div>
                            <div style="padding-left: 30px; background: rgba(0, 255, 0, 0.3);">online</div>
                        </div>
                        
						
                        </br>
                        
                        <form class="" style="clear: both; margin-top: 50px;" method="POST">
                        <fieldset>
                        
                        <!-- Password input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="password">Password</label>
                          <div class="col-md-5">
                            <input id="username" name="username" type="hidden" value="admin">
                            <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <script>
                        $(document).ready(function(){
                            $key = "FOOLPROOF";
                            
                            $("#btnAdmin").click(function(){
                                $("#username").val("admin");
                            });
                            $("#btnGuest").click(function(){
                                $("#username").val("guest");
                            });
                        });
                        </script>
                        
                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="submit"></label>
                          <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                          </div>
                        </div>
                        
                        </fieldset>
                        </form>
						
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
  </body>
</html>

<!--
Chat Log:

The best googler can find its favorite food
Can't you talk in normal english or else I need to transalate
Sweet baked biscuits are in help
We make cough bake better.

I think hiding "boolean" value will work
That's nice. But we don't have such expertise. Can't we move to some other community online ?
Yeah sure! lets discuss over there for the best... max voted answer can help us sure
.... ( after some time )
There are some unsafe characters for URLs ... what can we do ?
Encode those special ASCII unsafe characters as standard https://www.w3schools.com/tags/ref_urlencode.asp e.g. %2F for '/', %2B for '+', %3D for '='
Then I think my server program will work now, I noticed maximum time our encoded text results with a suffix "=".
Yes its working. Try clicking the account to enter. Page refresh may load new configuration.
Now its working fine. Thanks for your support for making this site secure.
Your welcome.

Talk among hackers
-------------------
Well, the security seems too low
Yes, we can easily fool the server
status of being logged in is saved in client's computer for multiuser interactions
Thats a cool move for processing but its compromising security!
You are right, having a boolean value will not help that much!!
Anyone can pinpoint the algorithm if someone is searching their client's post in public forum
Did they really applied the best??
The client may have used as public best choice on best technical forum 


Note : There is a single concept solution.
-->
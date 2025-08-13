<?php

include 'class/Database_class.php';
include 'class/User_class.php';
include '../ADAPRIME/class/Phpmailer_class.php';


$level = $Database->getLevel( $User->getUsername() );

if( $level != 3){
    //header('location: level'.$level.'.php');
    header('location: get_started.php');
}

$User->checkRedirectLogin('login.php');


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
                    
<!--textarea readonly style="padding: 20px; outline: none; border: none; border-radius:10px; width: 100%; height: 110px; resize: none;">Adaventure Break-N-Ride PHASE I is over. You can join the <span style="color: green">PHASE II</span> by submitting any ID-CARD pictures to "adaventure@pragyan.org to play. You will be awarded score 7500 + existing scores to play."</textarea-->
                    
                    
                    <div class="col-md-12" style="background:white; top:50px; height:100px; border-radius:10px; padding: 20px;">
                        
						Adaventure Break-N-Ride PHASE I is over. You can <strong>join the <span style="color: green">PHASE II</span></strong> by submitting <strong>any ID-CARD</strong> pictures of yours to "adaventure@pragyan.org to play. You will be awarded score 7500 + existing scores to play.
                        
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
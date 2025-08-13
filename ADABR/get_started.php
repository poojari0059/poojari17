<?php

include 'class/Database_class.php';
include 'class/User_class.php';

$User->checkRedirectLogin('login.php');


$level = $Database->getLevel( $User->getUsername() );

if($level != -1)
    header('location: level'.$level.'.php');

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
                <?php include 'modules/titlebar.php'; ?>
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
        
        <ul class="navss" >
          <li class="els">Adaventure Prime</li>
          <li class="els">Break-n Ride</li>
          <!--li class="els">Mix-n-Match</li-->
          <li class="els"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; About Us</li>
          <li class="els"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp; Contact Us</li>
        </ul>
        
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
                        //echo $Database->getLevel('cppxaxa');
                        ?>
                        
                        <a href="level1.php">Get Started</a>
						
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
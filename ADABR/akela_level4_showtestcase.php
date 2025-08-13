<?php

include 'class/Database_class.php';
include 'class/User_class.php';
//include 'utils/utils.php';

$level = $Database->getLevel( $User->getUsername() );

if( $level == 5 ){
    
}
else{
    //header('location: level'.$level.'.php');
    header('location: get_started.php');
}
$User->checkRedirectLogin('login.php');

//echo "User ".$User->getUsername();
$cracked = $Database->did_you_ever_cracked_akela( $User->getUsername() );



//echo "USER : ".$User->getUsername();



/*
if($val)
    echo "True";
else
    echo "False";
*/

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
        
        <!--div class="update">
            Adaventure Updates
        </div-->

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                
                <div class="row">
                    <!div class="col-md-9" style="background:white; top:50px; height:300px; border-radius:10px;">
                        <!--a href="level5.php" style="margin-left: 0px;"><button class="btn bt-primary">GO BACK</button></a><br/><br/-->
                        <textarea readonly style="padding: 20px; outline: none; border: 10px solid white; border-radius:10px; width: 100%; height: 500px; resize: none;"><?php
                        
                        //echo "Cracked ".$cracked;
                        if(!$cracked){
                            $val = $Database->adabr_level4_showtestcase_akela();
                            
                            echo "Following is the testcase to be generated\n\n";
                            
                            for($i = 1; $i <= 300; $i++){
                                echo $val[$i - 1]."\n";
                            }
                        }
                        else{
                            echo "You have already cracked akelazzz80@gmail.com code";
                        }
                        
                        ?></textarea>
						
                    <!/div>
                    
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
  </body>
</html>
<?php

//include 'class/Database_class.php';
//include 'class/User_class.php';
include 'utils/utils.php';



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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    
    <style>

        
        h1 {
          height: 100px;
        }

        h1 span {
          position: relative;
          top: 20px;
          display: inline-block;
          animation: bounce .3s ease infinite alternate;
          font-family: 'Titan One', cursive;
          font-size: 80px;
          color: #FFF;
          text-shadow: 0 1px 0 #CCC,
                       0 2px 0 #CCC,
                       0 3px 0 #CCC,
                       0 4px 0 #CCC,
                       0 5px 0 #CCC,
                       0 6px 0 transparent,
                       0 7px 0 transparent,
                       0 8px 0 transparent,
                       0 9px 0 transparent,
                       0 10px 10px rgba(0, 0, 0, .4);
        }

        h1 span:nth-child(2) { animation-delay: .1s; }
        h1 span:nth-child(3) { animation-delay: .2s; }
        h1 span:nth-child(4) { animation-delay: .3s; }
        h1 span:nth-child(5) { animation-delay: .4s; }
        h1 span:nth-child(6) { animation-delay: .5s; }
        h1 span:nth-child(7) { animation-delay: .6s; }
        h1 span:nth-child(8) { animation-delay: .7s; }
        h1 span:nth-child(9) { animation-delay: .8s; }
        h1 span:nth-child(10) { animation-delay: .9s; }
        h1 span:nth-child(11) { animation-delay: .10s; }
        h1 span:nth-child(12) { animation-delay: .11s; }
        h1 span:nth-child(13) { animation-delay: .12s; }
        h1 span:nth-child(14) { animation-delay: .13s; }
        h1 span:nth-child(15) { animation-delay: .14s; }

        @keyframes bounce {
          100% {
            top: -20px;
            text-shadow: 0 1px 0 #CCC,
                         0 2px 0 #CCC,
                         0 3px 0 #CCC,
                         0 4px 0 #CCC,
                         0 5px 0 #CCC,
                         0 6px 0 #CCC,
                         0 7px 0 #CCC,
                         0 8px 0 #CCC,
                         0 9px 0 #CCC,
                         0 50px 25px rgba(0, 0, 0, .2);
          }
        }

    </style>
  </head>
  <body>
           
    <?php include 'modules/starbackground.php'; ?>
      
      
    
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
                    <div class="col-md-1">
                    </div>
                    
                    <div class="col-md-9" style="background:#76b852; top:50px; height:300px; border-radius:10px;">
                        
                        <a href="login.php" class="btn btn-primary" style="position: relative;">CHECK STATUS</a>
                        
                        <!--i class="fa fa-unlink" style="position: relative; left: 0%; top: 25%; font-size: 370%; height: auto; color: #33AA77"> &nbsp;Break-n-Ride will start on 22-Feb-2017</i-->
                        <h1 style="z-index=200; position: relative; left: 9%;">
                          <span>A</span>
                          <span>D</span>
                          <span>A</span>
                          <span>-</span>
                          <span>P</span>
                          <span>R</span>
                          <span>I</span>
                          <span>M</span>
                          <span>E</span>
                        </h1>
                        </br>
						<i class="fa fa-unlink" style="position: relative; font-size: 370%; color: #FFF; left: 13%;"></i><span style="font-family: Arial; position: relative; left: 16%; top: 25%; font-size: 250%; height: auto; color: #FFF">will start on 21-Feb-2017</span>
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
  </body>
</html>
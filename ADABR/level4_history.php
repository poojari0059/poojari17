<?php

include 'utils/utils.php';
include 'class/User_class.php';
include 'class/Database_class.php';


$level = $Database->getLevel( $User->getUsername() );

if($Database->ifScorePresent( $User->getUsername() , 4)){
    
}
else{
    //header('location: level'.$level.'.php');
    header('location: get_started.php');
}

$User->checkRedirectLogin('login.php');


include 'class/final_arrangement.php';


$offset = 0;
$len = 10;

if(isset($_REQUEST['from']) && $_REQUEST['from'] > 1){
    $offset = $_REQUEST['from'] - 1;
}

if(isset($_REQUEST['len']) && $_REQUEST['len'] > 0){
    $len = $_REQUEST['len'];
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
                    <div class="col-md-3">
                    </div>
                    
                    <div class="col-md-12" style="background:white; top:50px; height:auto; border-radius:10px;">
                        <a href="level5.php" style="margin-right: 0px; float: right;"><button class="btn bt-primary">GO BACK</button></a>
                        <div style="padding: 20px; font-weight: bold; margin: 0 auto; width: 100%;">
                            <div style="font-size: 20px;">PASSBOOK ( Current Score :  <?php 
                                $val = $Database->getScore( $User->getUsername() );
                                echo $val['totalscore'];
                                ?> )   </div>
                                
                            <form method="POST">
                            
                              <div class="col-md-4" style="position: relative; float: right; margin: 5px;">
                                <button id="submit" name="submit" class="btn btn-primary" style="height: 44px;" >SHOW TRANSACTIONS</button>
                              </div>


                              <div style="position: relative; float: right; width: 250px; margin: 5px;">
                                <div class="input-group">
                                  <span class="input-group-addon">Number of Transactions</span>
                                  <input id="len" name="len" class="form-control" value="<?php if(isset($_REQUEST['len']) && $_REQUEST['len'] > 0) echo $_REQUEST['len']; else echo 10; ?>" type="text">
                                </div>
                              </div>
                              
                              <div style="position: relative; float: right; width: 250px; margin: 5px;">
                                <div class="input-group">
                                  <span class="input-group-addon">Starting Line Number</span>
                                  <input id="from" name="from" class="form-control" value="<?php if(isset($_REQUEST['from']) && $_REQUEST['from'] > 0) echo $_REQUEST['from']; else echo 1; ?>" type="text">
                                </div>
                              </div>

                           </form>
                            
                            
                            
                            
                            
                            
                            

                            
                                <div style="position: relative; float: right; width: 20px; height: 20px;"></div> 
                        </div>
                        
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>From</th>
                                <th>To</th>
                                <th>Amount</th>
                                <th style="width: 200px;">Time</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    $value = $Database->getTransaction($User->getUsername(), $offset, $len);
                                    
                                    for($i = 0; $i < $len; $i++){
                                ?>
                                <tr>
                                    <td><?php echo $value[$i]['from']; ?></td>
                                    <td><?php echo $value[$i]['to']; ?></td>
                                    <td><?php echo $value[$i]['amount']; ?></td>
                                    <td><?php echo $value[$i]['timestamp']; ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                              
                            </tbody>
                          </table>

						
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
<?php

include 'class/Database_class.php';
include 'class/User_class.php';
include 'utils/utils.php';

$level = $Database->getLevel( $User->getUsername() );

if( $level == 5 ){
    
}
else{
    //header('location: level'.$level.'.php');
    header('location: get_started.php');
}

$User->checkRedirectLogin('login.php');


include 'class/final_arrangement.php';


$offset = 0;
$len = 10;
$username_keyword = "%";

if(isset($_REQUEST['from']) && $_REQUEST['from'] > 1){
    $offset = $_REQUEST['from'] - 1;
}

if(isset($_REQUEST['len']) && $_REQUEST['len'] > 0){
    $len = $_REQUEST['len'];
}

if(isset($_REQUEST['username_keyword']) && $_REQUEST['username_keyword'] != ''){
    $username_keyword = $_REQUEST['username_keyword'];
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
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-12" style="background:white; top:50px; height:auto; border-radius:10px;">
                        
                        <?php
                            //codeTextarea_border(1);
                            //codeTextarea();
                            
                            
                            //If not submitted program
                                // ask to submit
                                    //must give output 300 lines
                                    // width of program is 50 characters
                                    // height of program is 50 lines
                                    
                                    // check initial output consistency in 2 run
                            //else
                                //Show table of all submitted programs
                                    // Choose testcase
                                    // Submit program
                                    //Check satisfying output
                                        // cut other person's marks and add to yours
                            
                                //Option to resubmit of program
                        ?>
                        <div style="padding: 20px; font-weight: bold; margin: 0 auto; width: 100%;">
                            <div style="font-size: 20px;">STEAL TREASURE ( Current Score : <?php 
                                $val = $Database->getScore( $User->getUsername() );
                                echo $val['totalscore'];
                                
                                $userscore = $val['totalscore'];
                                
                                ?> )</div>
                            
                            
                            
                            
                           
                           
                           
                            
                            <a style="position: relative; float: right;" href="level4_showtestcase.php?id=<?php echo $User->getUsername(); ?>"><button class="btn btn-primary">SHOW MY TESTCASE</button></a>
                                <div style="position: relative; float: right; width: 20px; height: 20px;"></div> 
                            <a style="position: relative; float: right;" href="level4_codeground.php"><button class="btn btn-primary">CHANGE YOUR SUBMISSION</button></a>
                                <div style="position: relative; float: right; width: 20px; height: 20px;"></div> 
                            <a style="position: relative; float: right;" href="level4_history.php"><button class="btn btn-primary">SHOW PASSBOOK</button></a>
                            
                            <div style="position: relative; float: right; width: 100%;"></div>
                            
                            
                            <form method="POST">
                            
                              


                              <div style="position: relative; float: right; width: 45%; margin: 5px;">
                                <div class="input-group">
                                  <span class="input-group-addon">Number of Users</span>
                                  <input id="len" name="len" class="form-control" value="<?php if(isset($_REQUEST['len']) && $_REQUEST['len'] > 0) echo $_REQUEST['len']; else echo 10; ?>" type="text">
                                </div>
                              </div>
                              
                              <div style="position: relative; float: left; width: 45%; margin: 5px;">
                                <div class="input-group">
                                  <span class="input-group-addon">Starting Line Number</span>
                                  <input id="from" name="from" class="form-control" value="<?php if(isset($_REQUEST['from']) && $_REQUEST['from'] > 0) echo $_REQUEST['from']; else echo 1; ?>" type="text">
                                </div>
                              </div>
                              
                              <div style="position: relative; float: right; width: 100%;"></div>
                              
                              <div class="" style="position: relative; float: right; margin: 5px;">
                                <button id="submit" name="submit" class="btn btn-warning" style="height: 44px; outline: none;" type="submit">QUERY</button>
                              </div>
                              
                              <div style="position: relative; float: left; width: 45%; margin: 5px;">
                                <div class="input-group">
                                  <span class="input-group-addon">Search Username</span>
                                  <input id="username_keyword" name="username_keyword" class="form-control" value="<?php if(isset($_REQUEST['username_keyword']) && $_REQUEST['username_keyword'] != '') echo $_REQUEST['username_keyword']; else echo ''; ?>" type="text" placeholder="keywords">
                                </div>
                              </div>
                              
                              

                           </form>
                           
                           
                            <div class="" style="position: relative; float: right; margin: 5px;">
                                <a href="level5.php"><button id="clear" name="clear" class="btn btn-danger" style="height: 44px; outline: none;">CLEAR</button></a>
                            </div>
                            
                        </div>
                        
						<table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Treasure</th>
                              <th>Testcase</th>
                              <th>Username</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                                //echo "Hello ".$username_keyword." ".$offset." ".$len;
                                //$record = $Database->adabr_level4_board_except( $User->getUsername(), $username_keyword, $offset, $len );
                                $attack = $Database->adabr_level4_getLastAttack($User->getUsername())['to'];
                                $record = $Database->adabr_level4_board_except_scoreless( $User->getUsername(), $username_keyword, $userscore, $offset, $len, $attack );
                                while($row = mysqli_fetch_array($record)){
                                    $testcase = json_decode($row['testcase']);
                            ?>
                                <tr>
                                  <th scope="row"><?php echo $row['award']; ?></th>
                                  <td><?php echo $testcase[0].", ".$testcase[1].", ".$testcase[2].", ".$testcase[3]; ?>...</td>
                                  <td>@<?php echo $row['username']; ?></td>
                                  <td style="position: relative; width: 300px;">
                                    <a href="level4_showtestcase.php?id=<?php echo $row['username']; ?>">
                                        <button class="btn btn-primary">SHOW TESTCASE</button>
                                    </a>
                                    <a href="level4_solve_codeground.php?username=<?php echo $row['username']; ?>">
                                        <button class="btn btn-primary">STEAL IT</button>
                                    </a>
                                  </td>
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
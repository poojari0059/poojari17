<script src="ADAPRIME/js/jquery.min.js"></script>
<script src="ADAPRIME/js/bootstrap.min.js"></script>
<script src="ADAPRIME/js/scripts.js"></script>

<?php

include 'ADAPRIME/class/Question_class.php';
include 'ADAPRIME/class/User_class.php';
include 'ADAPRIME/utils/curl/curl.php';
include 'ADAPRIME/class/Database_class.php';
include 'ADABR/class/Database_BR_class.php';
include 'ADAPRIME/class/Phpmailer_class.php';

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

    <link href="ADAPRIME/css/bootstrap.min.css" rel="stylesheet">
    <link href="ADAPRIME/css/style.css" rel="stylesheet">
    <link href="ADAPRIME/css/pure-min.css" rel="stylesheet">
    <link rel="stylesheet" href="ADAPRIME/css/font-awesome.min.css" />
    <link rel="icon" type="image/png" href="ADAPRIME/images/ada1.png">

  </head>
  <body>
      
      
     <?php include 'ADAPRIME/modules/starbackground.php'; ?>
      
    
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
                          <li><a href="#" class="navmenu"><b>PRAGYAN17</b></a></li>
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
                
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    
					
					
					<div class="col-md-12" style="background:white; top:100px; height:auto; border-radius:10px;">
                        
						
                        <table class="table">
						<caption><h3 align="center"> ADAVENTURE PRIME<BR>LEADERBOARD</h3></caption>
								  <thead>
									<tr>
									  <th>Rank</th>
									  <th>Username</th>
									  <th>Total Score</th>
									  <th>Level</th>
									</tr>
								  </thead>
								  <tbody>
										<?php
											//adaprime database
                      
                      $uname = '';
                      
                      if($User->isLoggedin()){
                          $uname=$User->getUsername();
                          //echo "Hello ".$uname;
                      }
                      $value = $Database->getLeaderboard(10);
                      for($i = 0; $i<10 && $value[$i]['username']!='' ; $i++){
                         if($uname != '' && $uname == $value[$i]['username'])
                             echo '<tr style="background: #ddf;">';
                         else
                             echo '<tr>';
										?>
									  <td><?php echo($i+1); ?>.</td>
									  <td><?php echo $value[$i]['username']; ?></td>
									  <td><?php echo $value[$i]['totalscore']; ?></td>
									  <td><?php echo $Database->check_level($value[$i]['username']); ?></td>
									</tr>
         
				
								  </tbody>
								  <?php
										}
    
                  if($User->isLoggedin() && ($Database->getRank($uname)==0 ||$Database->getRank($uname)>=10){
                  echo '<script> alert("if" </script>';
                  $rank=$Database->getRank($uname);
                  $l=$Database->getLevel($uname);
                  $score=$Database->total_score($uname,$l);
                  ?>
                  <tr style="background:#ddf;">
									  <td><?php if($rank!=0)echo $rank; else  echo "NA";?>.</td>
									  <td><?php echo $uname; ?></td>
									  <td><?php echo $score; ?></td>
									  <td><?php echo $l; ?></td>
									</tr>
                   <?php
                   }
                   else
                   {
                       //echo "No Hello";
                   }
                   //unset($User);
									 //unset($Database);
									 ?>
				  				</table>

						
                    </div>
					
					
            
                </div>
                
                
            </div>
        </div>
        
        
    </div>
    
  </body>
</html>
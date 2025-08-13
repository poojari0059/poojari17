
<script src="ADAPRIME/js/jquery.min.js"></script>
<script src="ADAPRIME/js/bootstrap.min.js"></script>
<script src="ADAPRIME/js/scripts.js"></script>
<script>
$(document).ready(function(){
    $("#up").hover(function(){
        $("#di").delay(300).slideDown();
    }, function(){
		$("#di").hide();
	});
});


var picCount=0;
var picArray= ["ADAPRIME/images/sponsordo.png","ADAPRIME/images/sponsorbh.png"]
var linkArray= ["https://www.digitalocean.com/","http://www.bluehost.in/"]
function nextPic() {
picCount=(picCount+1<picArray.length)? picCount+1 : 0;
var build='<div style="color:#83A2F9; float:left; font-family:cursive;">Presented By:</div><a target="_blank" href="'+linkArray[picCount]+'"><img style="width:100%;" src="'+picArray[picCount]+'" ></a>';
document.getElementById("imgHolder").innerHTML=build;
setTimeout('nextPic()',2000)
}
</script>


<?php

include 'ADAPRIME/class/Question_class.php';
include 'ADAPRIME/class/User_class.php';
include 'ADAPRIME/utils/curl/curl.php';
include 'ADAPRIME/class/Database_class.php';
include 'ADABR/class/Database_BR_class.php';

?>


<?php

include 'utils/utils.php';
//$User->checkRedirectLogin('login.php');
/*
include 'class/final_arrangement.php';
*/
/*
if($User->isLoggedIn()){
    
    //echo $User->getUsername()." ".$User->getPassword();
    if($Database_P->authenticate( $User->getUsername(), $User->getPassword() )){
      
        //echo "Proper credential, refresh time<br/>";
        //echo '<a href="_login.php?logout" target="blank">Logout</a>';
        //$User->login( $User->getUsername(), $User->getPassword() );
        //$User->refresh();
        header("location: login.php");
    }
    else{
        //header("location: login.php?logout");
        //echo "do Logout<br/>";
        //echo '<a href="_login.php?logout" target="blank">Logout</a><br/>';
        //echo '<a href="_login.php">Refresh</a><br/>';
    }
 //   echo '<script> alert("Hello") </script> ';
}
else{
    //header("location: login.php");
}
*/


if(!$User->isLoggedIn()){
    header("location: login.php");
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

    <link href="ADAPRIME/css/bootstrap.min.css" rel="stylesheet">
    <link href="ADAPRIME/css/style.css" rel="stylesheet">
    <link href="ADAPRIME/css/pure-min.css" rel="stylesheet">
    <link rel="stylesheet" href="ADAPRIME/css/font-awesome.min.css" />
    <link rel="icon" type="image/png" href="ADAPRIME/images/ada1.png">

  </head>
  <body onload="setTimeout('nextPic()',2000)">
      
      
      
    <div class="cover"></div>
           
    <?php include 'ADAPRIME/modules/starbackground.php'; ?>
    
    
    
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-inverse" style="background-color:rgba(13, 16, 22,0.9); margin-bottom:0px;">
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
                          <li><a target="blank" href="https://www.pragyan.org/17/home/" class="navmenu"><b>PRAGYAN'17</b></a></li>
                          <li data-toggle="modal" data-target="#prmodal"><a href="#" class="navmenu">Adaventure Prime Leaderboard</a></li> 
                          <li data-toggle="modal" data-target="#myModal"><a href="#" class="navmenu">Break-n Ride Leaderboard</a></li>
                          <!--li><a href="#" class="navmenu">Break-n Ride Leaderboard</a></li--> 
                           
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
                          <!--li id="btnRegister"><a href="https://www.pragyan.org/17/home/events/code_it/adaventure/+login&subaction=register" target="blank" class="navmenu">
                              <span class="glyphicon glyphicon-user"></span>&nbsp; Register</a></li-->
                          <!--li><a href="#"  data-toggle="modal" data-target="#login-modal" id="btnLogin" class="navmenu">
                              <span class="glyphicon glyphicon-log-in"></span>&nbsp; Login</a></li-->
                          <li><a href="ADAPRIME/login.php?logout" id="btnLogout" class="navmenu">
                              <span class="glyphicon glyphicon-log-in"></span>&nbsp; Logout</a></li>
                        </ul>
                    </div>
                  </div>
                </nav>
                
            </div>
        </div>
        
        <!--div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <center><span style="font-size:15px; color:red;">Check updates for Break-n-Ride Phase-II and Adaventure Prime</span></center>
            </div>
            <div class="col-md-4">
            <a target="_blank" href="https://www.digitalocean.com/"><img style=" width:250px; max-width:50%; right:30px; float:right;" src="ADAPRIME/images/sponsorlogo.png" ></a>                    
            </div>
        </div-->
        
        
        <div class="row">
            <div class="col-md-12">
              <div id="imgHolder" style=" width:200px; max-width:50%; height:33px; right:30px; float:right;"> 
                <div style="color:#83A2F9; float:left; font-family:cursive;">Presented By:</div>           
                <a target="_blank" href="https://www.digitalocean.com/"><img style="width:100%;" src="ADAPRIME/images/sponsordo.png" ></a>
              </div>                     
            </div>
        </div>
        
        
       
        
        
        
        
        
        
        <div id="prmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel"><caption><h3 align="center"> ADAVENTURE PRIME<br>LEADERBOARD</h3></caption></h4>
                    <li data-toggle="modal" data-target="#golfModal" style="top:-10px; position:relative; float:left;"><a href="#" class="navmenu">Codeslash Leaderboard</a></li>
                    <li data-toggle="modal" data-target="#crazyModal" style="top:-10px; position:relative; float:right"><a href="#" class="navmenu">Crazy Leaderboard</a></li>
            </div>
            <div class="modal-body">
                    
                <table class="table">

                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Username</th>
                            <th>Total Score</th>
                            <!--th>Level</th-->
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
                        <!--td><?php echo $Database->check_level($value[$i]['username']); ?></td-->
                        </tr>


                    <?php
                    }

                    if($User->isLoggedin() && $Database->getRank($uname)>=10){
                    $rank=$Database->getRank($uname);
                    //$l=$Database->getLevel($uname);
                    $score=$Database->total_score($uname,$l);
                    ?>
                    <tr style="background:#ddf;">
                    <td><?php echo $rank; ?>.</td>
                    <td><?php echo $uname; ?></td>
                    <td><?php echo $score; ?></td>
                    <!--td><?php echo $l; ?></td-->
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

        <div class="modal fade" id="golfModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><caption><h3 align="center"> CODESLASH<br>LEADERBOARD</h3></caption></h4>
                </div>
                <div class="modal-body">
                  <iframe src="lead_codegolf.php" style="border: none; overflow: hidden; position: relative; width: 100%; height: 470px;">Your browser don't support iframe</iframe>
                </div>
              </div>
            </div>
        </div>
        
        
        
        
        <div class="modal fade" id="crazyModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><caption><h3 align="center"> CRAZY<br>LEADERBOARD</h3></caption></h4>
                </div>
                <div class="modal-body">
                  <iframe src="lead_crazy.php" style="border: none; overflow: hidden; position: relative; width: 100%; height: 470px;">Your browser don't support iframe</iframe>
                </div>
              </div>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><caption><h3 align="center"> BREAK-N-RIDE<br>LEADERBOARD</h3></caption></h4>
                </div>
                <div class="modal-body">
                  <iframe src="lead_adabr.php" style="border: none; overflow: hidden; position: relative; width: 100%; height: 470px;">Your browser don't support iframe</iframe>
                </div>
              </div>
            </div>
        </div>
        
        
        
        
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><caption><h3 align="center"> BREAK-N-RIDE<br>LEADERBOARD</h3></caption></h4>
                </div>
                <div class="modal-body">
                  <iframe src="lead_adabr.php" style="border: none; overflow: hidden; position: relative; width: 100%; height: 470px;">Your browser don't support iframe</iframe>
                </div>
              </div>
            </div>
        </div>
        
        <ul class="navss1" >
          <a href="ADAPRIME/" style="text-decoration:none;"><li class="els1">Adaventure Prime</li></a>
          <a href="ADABR/" style="text-decoration:none;"><li class="els1">Break-n Ride</li></a>
          <li class="els1" data-toggle="modal" data-target="#aboutus"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; About Us</li>
          <li class="els1" data-toggle="modal" data-target="#contactus"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp; Contact Us</li>
        </ul>
        
        <?php include 'class/Update_class.php'; ?>
            <div class="update1" id="up" style="font-family: arial; font-size:13px;">ADAVENTURE UPDATES
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
    
    
    
    
    
    
    
       <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mycontact" aria-hidden="true" id="contactus">
            <div class="modal-dialog modal-md">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h4 class="modal-title" id="myLargeModalLabel"><caption><h3 align="center"> CONTACT US </h3></caption></h4>
                </div>
                <div class="modal-body">
                <div>
                  <table  class="table table-responsive table-condensed">
                    <tr>
                      <td>Pranay Nagar<br></td>
                      <td>9790063411 /  9425316712</td>
                    </tr>
                    <tr>
                      <td>Christ Prateek Prasanna Xaxa<br></td>
                      <td >8763077849</td>

                    </tr>
                    
                    <!--tr>
                      <td colspan="2" style="font-weight: bolder"><br><br>Cluster Head</td>
                    </tr>
                    <tr>
                      <td><br>Janardhan J Kammath</td>
                      <td><br>9495957295</td>
                    </tr-->
                    <tr>
                      <td colspan="2"><br><br>Email us at adaventure@pragyan.org</td>
                    </tr>
                  </table>
                  </div>
                </div>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        
        
        
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="aboutus" aria-hidden="true" id="aboutus">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><caption><h3 align="center">  What is Adaventure? </h3></caption></h4>
                </div>
                <div class="modal-body">
                <div style="padding:15px;">
                  <p>The name of the Event is inherited from Lady Ada, considered to be the first Computer Programmer in the world. 
                  		Adaventure epitomizes fun and coding in the software arena. 
                  		The event will provide a platform to the coding aspirants to showcase their talents.
                  		It consists of 2 sub-events:</p><br>
                  		<ul><li>Adaventure Prime</li>
                  		    <li>Break-n Ride</li></ul><br>
                  		<p>Adaventure is an event where programming meets fun and enjoyment.
                  		It is an event which requires the participants to code efficiently, understand and crack other participants. 
                  		As a whole it is a unique combination of programming and ethical hacking.</p>
                          <p>A huge crowd puller and an outstanding success rate imply that it's not all easy. 
                  		Hundreds of talented students are on the race. The game is on! Do get some rest before you need it.</p>
                  </div>
                </div>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        
        
        
        
        
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="brinfo" aria-hidden="true" id="adabrinfo">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button><br><br>
                  <a href="ADABR/"><button class="btn btn-primary btn-large" style="float:right;">Play Now!</button></a>
                  <h2 class="modal-title">Break-n-Ride</h2>

                </div>
                <div class="modal-body">
                  <div>If you think you are a cyber legend, then this event's tailor-made for you. Well, sure you won't be the only one thinking so, and that's what bases the fun factor of this event. The event? Given a safe to protect and a bank and other safes to rob, will you survive in the matrix?</div>
          <br><br><br>
          
          <span style="color:red;">NOTE</span> : This level is provided to all users to boost score by 1900 and getting aquianted with the UI. It consist of simple testcase by akelazzz80@gmail.com.<br>
Those user who already cracked the code will not be able to solve it again.<br>It can be solved only once per user and fixed 10% score of the dummy user will be provided. You need to have submitted your code first to solve this problem and you need to be logged in. <br><br>
<span style="color:red;">TESTCASE LINK</span> : <a target="blank" href="ADABR/akela_level4_showtestcase.php">https://www.pragyan.org/adaventure/ADABR/akela_level4_showtestcase.php</a><br><br>

<span style="color:red;">SOLUTION SUBMISSION LINK (AWARD : 1900)</span> : <a target="blank" href="ADABR/akela_level4_solve_codeground.php">https://www.pragyan.org/adaventure/ADABR/akela_level4_solve_codeground.php</a>

          
          <br><br><br>
          SECOND PROBLEM<br><br>
          
          TESTCASE LINK</span> : <a target="blank" href="ADABR/__abhi_level4_showtestcase.php">https://www.pragyan.org/adaventure/ADABR/__abhi_level4_showtestcase.php</a><br><br>

<span style="color:red;">SOLUTION SUBMISSION LINK (AWARD : 100)</span> : <a target="blank" href="ADABR/__abhi_level4_solve_codeground.php">https://www.pragyan.org/adaventure/ADABR/__abhi_level4_solve_codeground.php</a>
          

          <h2>SCHEDULE</h2>

          <ul>
            <li><span style="color:red">Applicable Schedule</span></li>
            <li>Break-N-Ride PHASE-II : <strong>27-Feb 8:00AM</strong></li>
            <li>Break-N-Ride End : <strong>28-Feb 11:59PM</strong></li>
            <li>Once entering PHASE-II, PHASE-I will be locked!</li>
            <li style="color:red;">The following users are for providing compedition in the game. These users will not crack other's code. If they win, they will not be part of any position. If you happen to see them in your lounge, surely you can crack their code to increase your own score.
            <ul>
                <li>akelazzz80@gmail.com</li>
                <li>205115019@nitt.edu</li>
                <li>jabhinav11@gmail.com</li>
                <li>205115025@nitt.edu</li>
                <li>205115031@nitt.edu</li>
            </ul>
            </li>
          </ul>  
          <br>

          <h2>General Rules and Regulations - PHASE I</h2>

          <ol>
          <li>Registration is compulsory for each participant.</li>
          <li>Each level must be crossed prior to be able to access any further levels.</li>
          <li>If you happen to win the levels, you will be awarded the maxscore set in our records which decreases in value after the hints are provided (Date: 24 FEB).</li>
          <li>On 27th FEB, 12am, Phase II will be open for all to try and maximize their score but you can reach there early if you win the previous levels.</li>
          <li>Results declared by the organisers shall be final and undisputable.</li>
          </ol>
          <br><br>  
          <h2>Phase II - Let the stealing begin :</h2><br>
          <a href="http://tinyurl.com/ada002">Click Here for brief tutorial : http://tinyurl.com/ada002</a>
          <h2>Rules and Regulations</h2>

          <ol>
          <li>It is compulsory to send picture of "ID CARD" with "USER ID" of pragyan in order to get access to ADABR ( adaventure@pragyan.org ).</li>
          <li>It is compulsory to submit your program prior to be able to steal others test cases.</li>
          <li>The test case submitted previously can be changed after a minimum time period of 20 minutes.</li>
          <li>The guidelines to submit the program are as follows:
              <ol>
           
                  <li>The program should be submitted in C language in the given program code.</li>
                  <li> A maximum length of the program allowed is 30 characters with atmost 5 operators at the time of submission and 40 charaters with atmost 6 operators at the time of cracking others code.</li>
                  <li> No pre-processor directives are allowed. The header files pre-included is 'stdio.h' along with the fixed code.</li>
                  <li>The test case to be submitted should produce exactly 300 lines, each consisting of numerical values in the range [0, 500] and the numerical values must not be floating/decimal or negative values.</li>
                  <li>Using any inbuilt mathematical functions, malloc function, random values and garbage values are not allowed.</li>
          </ol>
          </li>
          <li>Once your test case has been stolen, it is compulsory to submit another test case again to be able to steal others test cases.</li>
          <li>If in case, if your testcase is cracked, then your 10% of current score is passed to the person who cracked your testcase. Furthermore, your testcase is removed from the lounge and you need to submit a program again to continue once again.</li>  
          <li>  After entering to the lounge, if you happen to crack someone's testcase, you will be awarded 10% of the target opponent's current score.</li>
          <li>After submitting your program, you will be provided the dashboard with the other people's testcases. You will be allowed to search and preview the testcases as well as calculated 10% of their current score.</li>
          <li>Your each submission history is also recorded. We allow to track each transactions related to you with the feature "Passbook".</li>
          </ol>
          <br><br>
          <h2>Cracking the testcases:</h2>
          <h2> Rules and Regulations</h2>
          <ol>
          <li>A test case can be stolen if the program code submitted by you produces the exact same output.</li>
          <li>The guidelines to submit the program are as follows: 
            <ol>
              <li> The program should be submitted in C language along the specified program code.</li>
                  <li>A maximum length of the program allowed is 40 characters with 6 operators.</li>
                  <li>No pre-processor directives are allowed. The header files pre-included is 'stdio.h'.</li>
                  <li>The test case to be submitted should produce exactly 300 lines of numerical values in the range [0, 500] and the numerical values must not be floating/decimal or negative values.</li>
                  <li>Using any inbuilt mathematical functions, malloc function, random values and garbage values are not allowed.</li>
                  <li>The output should match the opponent's output to be able to crack it.</li>
            </ol>
          </li>
          <li>If you are able to crack the testcase, you will be awarded 10% of the current score of the target opponent. The testcase of your target 
          opponent is removed from the lounge until the user again returns back with any other program.</li>
          </ol>
          <br><br>
          <h2>To change your submission:</h2>
          <h2> Rules and Regulations</h2>
          <ol>
          <li>You can change your submission within an interval of 20 minutes.</li>
          <li>The guidelines to submit the program are as follows:
          <ol>
                  <li>The program should be submitted in C language with the specified format.</li>
                  <li>A maximum length of the program allowed is 30 characters with atmost 5 operators.</li>
                  <li> No pre-processor directives are allowed. The header files pre-included is 'stdio.h'.</li>
                  <li>The test case to be submitted should produce exactly 300 lines of numerical values in the range [0, 500] and the numerical values must not be floating/decimal or negative values.</li>
                  <li>Using any inbuilt mathematical functions, malloc function, random values and garbage values are not allowed.</li>


          </ol> 
          </li>
          </ol>

        </div>
        </div>
      </div>
    </div>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="primeinfo" aria-hidden="true" id="adaprimeinfo">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button><br><br>
                  <a href="ADAPRIME/"><button class="btn btn-primary btn-large" style="float:right;">Play Now!</button></a>
                  <h2 class="modal-title">Adaventure Prime</h2>

                </div>
                <div class="modal-body">
          <div>Here's the event to feed the adventurous you. How well do you know your college. Prepare to decode a surprise-filled map of your own campus and go the distance past the levels. Born Adaventure...!!</div>
          <br><br>
          
          <h2>Instructions for the map of NITT</h2>

          <ol>
            <li>Download the zip file from the link given below.</li>
              <a target="blank" href="https://drive.google.com/open?id=0B63az-b7GasrY3NLeUYxYzNuUmc">Click here</a>
            <li>Traverse the map to collect different access codes at prominent locations of NITT.</li>
            <li>Each access code denotes either a level, a bonus or a penalty.</li>
            <li>Some access code may be invalid</li>
            <li>Try to collect the access codes of the lower levels initially as they have to be entered in the website level-wise to move forward in the game.</li>
          </ol>  
          <br>


          <h2>SCHEDULE</h2>

          <ul style="color:red;">
            <li><strong>Starting date  :</strong>21<sup>st</sup> Feb 2017 (9:00 PM) </li>
            <li><strong>Ending date      :</strong> 28<sup>th</sup> Feb 2017 (11:59 PM) </li>
            <li>Level 6 will be open from 26<sup>th</sup> Feb 2017 (10:00 AM)</li>
            <li>All level will be accessible without any restriction (without solving previous level) from 26<sup>th</sup> Feb 2017 (8:00 PM)</li>
            
          </ul>  
          <br>

          <h2>General Instructions</h2>

          <ol>
          <li>The program should be submitted in C language and should be compatible with gcc-4.8.4(Turbo C should not be used).</li>
          <li>No preprocessor directives should be explicitly included.</li>
          <li>It is compulsory to include 'return 0'or 'exit(0)' at the end of the main function of your code.</li>
          <li>Don't use 'system()' and 'fork()'.</li>
          <li>You can submitt your code as many times you want. No negative marking for that .</li>
          <!--li>Each level's instructions will be displayed once you reach that level.</-->
          <li>To cross each level, a minimum number of programs(which will specified separately at each level) of that level have to be submitted successfully.</li> 
          <li><b>Time limit</b> 2 seconds.</li> 
          </ol>
          <br><br>  
          <h2>Judging Criteria</h2>

          <ol>
          <li>The top 3 winners who have the highest aggregate score will be declared the winners.</li>
          <li>In case of tie one who submitted earlier will be given preference.</li>
          <li>Participants will be disqualified if seen indulging in malpractices.</li>
          <li>The decision of the Adaventure team will be final and abiding.</li>

          </ol>
          <br><br>
          <h2>Level 1 - CrunchBox</h2>
          <h3> Instructions </h3>
          <ol>
          <li>The libraries which are implicitly included are "stdio.h","stdlib.h","string.h" and "math.h".</li>
          <li>For each solution successfully submitted, 100 points will be awarded.</li>
          <li>There will be NO partial marking. The solution will be submitted successfully only when all the testcases are passed.</li>
          <li>First successfull submission will be considered as final submission.</li>
          <li>Minimum no. of questions to be solved to proceed to next round : 4</li>
          </ol>
          <br><br>
          <h2>Level 2 - CodeSlash</h2>
          <h3> Instructions </h3>
          <ol>
          <li>The library which is implicitly included is "stdio.h".</li>
          <li style="color:red">Don't use library function which are not in "stdio.h" in comments also.</li>
          <li><b>Marking Scheme:</b> It will be based on the length of the program, that is, the no. of characters used (excluding the spaces). If the length exceeds 9,999 then ZERO points will be awarded.<br>
          Example:<br>int main()<br>{<br>int a=10, b=20;<br>printf("%d",a+b);<br>return 0;<br>} --------Length of the program is 49<br>So the points awarded will be: (10,000-49)/100 = 99.51<br></li>
          <li>Comments will also contribute to code length.</li>
          <li>The solution will be submitted successfully only when all the testcases are passed.</li>
          <li>Submission with highest marks will be considered as final submission.</li>
          <li>Minimum no. of questions to be solved to proceed to next round : 2</li>
          </ol>

          <h2>Level 3 - Mix-N-Match</h2>
          <h3> Instructions </h3>
          <ol>
          <li>Only the following keywords, operators and special characters are allowed to be used.</li>

          <table border="1" cellpadding="1"  style="width: 500px;">
            <thead>
              <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Keyword/Operator/Character</th>
                <th scope="col">Represents</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>_CHAR_ </td>
                <td>char</td>
              </tr>
              <tr>
                <td>2</td>
                <td>_VLOTTER_ </td>
                <td>float</td>
              </tr>
              <tr>
                <td>3</td>
                <td>_INT_</td>
                <td>int</td>
              </tr>
              <tr>
                <td>4</td>
                <td>_INDIEN_</td>
                <td>if</td>
              </tr>
              
              <tr>
                <td>5</td>
                <td>_TERWIJL_</td>
                <td>while</td>
              </tr>
              <tr>
                <td>6</td>
                <td>_BELANGRIJKSTE_</td>
                <td>main</td>
              </tr>
              <tr>
                <td>7</td>
                <td>_PRINTF_</td>
                <td>printf</td>
              </tr>
              <tr>
                <td>8</td>
                <td>_SCANF_</td>
                <td>scanf</td>
              </tr>
              <tr>
                <td>9</td>
                <td>_TERUGKEREN_</td>
                <td>return</td>
              </tr>
              <tr>
                <td>10</td>
                <td>_AMPERSAND_</td>
                <td>&amp;</td>
              </tr>
              <tr>
                <td>11</td>
                <td>_DIVISIE_</td>
                <td>/</td>
              </tr>
              <tr>
                <td>12</td>
                <td>_ENBEVESTIG_</td>
                <td>&&</td>
              </tr>
              <tr>
                <td>13</td>
                <td>_WEBINTERFACEOFOF_</td>
                <td>||</td>
              </tr>
              <tr>
                <td>14</td>
                <td>_NIET_</td>
                <td>!</td>
              </tr>
              <tr>
                <td>15</td>
                <td>_XOF_</td>
                <td>^</td>
              </tr>
              <tr>
                <td>16</td>
                <td>_AANVULLING_</td>
                <td>~</td>
              </tr>
              <tr>
                <td>17</td>
                <td>_EN_</td>
                <td>|</td>
              </tr>
              <tr>
                <td>18</td>
                <td>_GELIJK_</td>
                <td>=</td>
              </tr>
              <tr>
                <td>19</td>
                <td>_KOMMA_</td>
                <td>,</td>
              </tr>
              <tr>
                <td>20</td>
                <td>_DIKKEDARM_</td>
                <td>;</td>
              </tr>
              <tr>
                <td>21</td>
                <td>_MODULUSD_</td>
                <td>%d</td>
              </tr>
              <tr>
                <td>22</td>
                <td>_MODULUSF_</td>
                <td>%f</td>
              </tr>
              <tr>
                <td>23</td>
                <td>_TOEVOEGEN_</td>
                <td>+</td>
              </tr>
              <tr>
                <td>24</td>
                <td>_AFTREKKEN_</td>
                <td>-</td>
              </tr>
              <tr>
                <td>25</td>
                <td>_LINKER_SHIFT_</td>
                <td><<</td>
              </tr> 
                <tr>
                <td>26</td>
                <td>_RIGHT_SHIFT_</td>
                <td>>></td>
              </tr>
              
            </tbody>
          </table>
          <br>
          <li>Apart from the above mentioned, no additional C keywords, operators and special characters can be used.</li>
          <li>(),{}, [] and <strong>.</strong> can be used.</li>
          <li>Rest of the rules will be the same as applicable in a C program.</li>
          <li>For new line use <b>\n</b>.</li>
          <li>The library which is implicitly included is "stdio.h".</li>
          <li>For each solution successfully submitted, 100 points will be awarded.</li>
          <li>There will be NO partial marking. The solution will be submitted successfully only when all the testcases are passed.</li>
          <li><b>Example :</b><br>Program for addition in Mix N Match style:<br><br>
          _INT_ _BELANGRIJKSTE_(){<br>
            _INT_ a_KOMMA_b_DIKKEDARM_<br>
          _SCANF_("_MODULUSD__MODULUSD_"_KOMMA__AMPERSAND_a_KOMMA__AMPERSAND_b)_DIKKEDARM_<br>
            _INT_ c_GELIJK_a_TOEVOEGEN_b_DIKKEDARM_<br>
            _PRINTF_("_MODULUSD_" _KOMMA_ c)_DIKKEDARM_<br>
              _TERUGKEREN_ 0_DIKKEDARM_<br>
          }<br><br>
          The equivalent C program is:<br>
          int main(){<br>
            int a,b;<br>
          scanf("%d%d",&a,&b);<br>
            int c=a+b;<br>
            printf("%d" , c);<br>
              return  ;<br>
          }<br>
          <br></li>
          <li>Minimum no. of questions to be solved to proceed to next round : 2</li>
          </ol>
          <br><br>
          <h2>Level 4 - Crazy Programming</h2>
          <h3> Instructions </h3>
          <ol>
          <li>Everything is given a weight. The weight of your program will be the sum total of the weights of everything you use.</li>
          <li>The weight distribution is as follows:<br><br>
          <table border="1" cellpadding="1" cellspacing="1" style="width: 500px;">
            <thead>
              <tr>
                <th scope="col">SR NO.</th>
                <th scope="col">Symbol/Pattern/Keyword</th>
                <th scope="col">Weight</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>FOR</td>
                <td>5000</td>
              </tr>
              <tr>
                <td>2</td>
                <td>WHILE</td>
                <td>3000</td>
              </tr>
              <tr>
                <td>3</td>
                <td>+ - * /</td>
                <td>1000</td>
              </tr>
              <tr>
                <td>4</td>
                <td>SWITCH</td>
                <td>500</td>
              </tr>
              <tr>
                <td>5</td>
                <td>CASE</td>
                <td>100</td>
              </tr>
              <tr>
                <td>6</td>
                <td>Digits(0-9)</td>
                <td>100</td>
              </tr>
              <tr>
                <td>7</td>
                <td>goto</td>
                <td>100</td>
              </tr>
              <tr>
                <td>8</td>
                <td>&lt; &gt;</td>
                <td>50</td>
              </tr>
              <tr>
                <td>9</td>
                <td>&amp; ^ ~ |</td>
                <td>20</td>
              </tr>
              <tr>
                <td>10</td>
                <td>Alphabets(A-Z and a-z)</td>
                <td>10</td>
              </tr>
              <tr>
                <td>11</td>
                <td>&nbsp;: ? % $ _ @ !</td>
                <td>10</td>
              </tr>
              <tr>
                <td>12</td>
                <td>=</td>
                <td>5</td>
              </tr>
            </tbody>
          </table><br>
          <li>The library which is implicitly included is "stdio.h".</li>
          <li><b>Marking Scheme:</b> It will be based on the weight of the program.<br><br>
          <b>Example:</b> Sum of array elements<br><br>
          int main(){<br>int a[]={10,20,30,40},i,sum=0;<br>for(i=0;i<4;i++)<br>sum+=a[i];<br>printf("%d",sum");<br>return 0;<br>}<br><br>
          Explanation:<br>No. of alphabets = 41<br>
          Digits = 12<br>
          '=' = 4<br>
          'for' = 1<br>
          '+' = 3<br>
          '%' = 1<br><br>
          Total weight of program = 41*10 + 12*100 + 4*5 + 1*5000 + 3*1000 + 1*10 = 9640<br>
          Total points that will be awarded = (50,000-9640)/500 = 80.72 <br><br>
          <li>Comments will also contribute to code weight.</li>
          <li>If the weight of the program exceeds 49,999 then ZERO points will be awarded.</li>
          <li>The solution will be submitted successfully only when all the testcases are passed.</li>
          <li>Submission with highest marks will be considered as final submission.</li>
          <li>Minimum no. of questions to be solved to proceed to next round : 3</li>
          </ol>
          <br><br>
          <h2>Level 5 - About-turn</h2>
          <h3> Instructions </h3>
          <ol>
          <li>A sample input and output will be given alongwith constraints. You have to submit a program which satisfies all the testcases within the logic of the program.</li>
          <li>The libraries which are implicitly included are "stdio.h","stdlib.h","string.h" and "math.h".</li>
          <li>First successfull submission will be considered as final submission.</li>
          <li>The logic of the program can be understood by testing the output by giving input of your choice.</li>
          <li>There will be NO partial marking. The solution will be submitted successfully only when all the testcases are passed.</li>
          <li>For each solution successfully submitted, 100 points will be awarded.</li>
          <li>Minimum no. of questions to be solved to proceed to next round : 4</li>
          </ol>
          <br><br>
          <h2>Level 6 - The Tight Spot </h2>
          <h3> Instructions </h3>
          <ol>
          <li>The libraries which are implicitly included are "stdio.h","stdlib.h","string.h" and "math.h".</li>
          <li>First successfull submission will be considered as final submission.</li>
          <li>For each solution successfully submitted, 100 points will be awarded.</li>
          <li>There will be NO partial marking. The solution will be submitted successfully only when all the testcases are passed.</li>

          </ol>
                </div>
              </div>
             </div>
          </div>

        
        
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
              <div class="row boxposition">
                   <div class="viewdesktop"> 
                    
                        <div class="wrapper11">

                            <div class="container11" id="c111" data-toggle="modal" data-target="#adaprimeinfo">
                                <img height="500px" width="320px" src="images/prime.PNG">
                            </div>
                            <div class="container11" id="c211" data-toggle="modal" data-target="#adabrinfo">
                                <img height="500px" width="320px" src="images/bnr.PNG">
                            </div>


                          </div>
                        </div>
                    <div class="viewmobile" style="text-align:center; margin-top:20px;">
                      <div class="col-md-6 ">
                
                    <div class="panel panel-info" style="background: rgba(121, 132, 203,0.5);border: none; margin-left:10px; margin-right:10px;" data-toggle="modal" data-target="#adaprimeinfo">
                    <img src="images/adaventure_prime_mob.png" class="img-responsive center-block">
                      <div >
                                  
                                    <h3 style="color: #002;font-weight: bolder">Adaventure Prime</h3>
                                  <p> Here's the event to feed the adventurous you. How well do you know your college? Prepare to decode a surprise-filled map of your own campus and go the distance past the levels. Bon Adaventure!</p>
                                  
                                </div>
                    </div>
                
                  </div>

                  <div class="col-md-6 ">
                  
                  <div class="panel panel-info" style="background: rgba(121, 132, 203,0.5);border: none; margin-left:10px; margin-right:10px;" data-toggle="modal" data-target="#adabrinfo">
                    <img src="images/break-n-ride_mob.png" class="img-responsive center-block">
                    <div >
                                  <h3 style="color: #002;font-weight: bolder" >Break-n-Ride</h3>
                                  <p> If you think you are a cyber legend, then this event's tailor-made for you. Well, sure you won't be the only one thinking so, and that's what bases the fun factor of this event. The event? Given a safe to protect and a bank and other safes to rob, will you survive in the matrix?</p>

                                  </div>
                    </div>
                    
                  </div>
                          </div>
                          <!--mobile end-->
                    </div>
                    </div>
                </div>
            
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <h4 style="color:#ffffcc; left:20px; max-width:50%; bottom:10px; position:fixed;">Adaventure prizes worth: 30000</h4>
        <img class="fbsocial" style="cursor: pointer;" src="ADAPRIME/images/fbsocial.png" onclick="window.open('http://www.facebook.com/adaventure','mywindow');">
    </div> 
    
  </div>
</html>
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
</script>
<?php

include 'ADAPRIME/class/Question_class.php';
include 'ADAPRIME/class/User_class.php';
include 'ADAPRIME/utils/curl/curl.php';
include 'ADAPRIME/class/Database_class.php';
include 'ADABR/class/Database_BR_class.php';

$login_error = false;
$login_pass = false;

$debug_no_redirect = false;

if(isset($_REQUEST['login'])){
    if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
        $_SESSION["ADAPRIME_user_id"] = $_REQUEST['username'];
        $status_code = makeRequest($_REQUEST['username'],$_REQUEST['password'],4,"9be885d7168f3f993608f7cabbe8dd14",true, false);
        //print_r($status_code);
        //echo '<script> alert("CHECKPOINT 1");</script>';
        if($status_code[0]==200){
            $_SESSION["ADAPRIME_full_name"] = $status_code[2];
            //echo '<script> alert("CHECKPOINT 2");</script>';
            if($Database->checkexist($_SESSION["ADAPRIME_user_id"])) {
                //echo '<script> alert("CHECKPOINT 3");</script>';
                
                //Unimplemented - put password
                
                $token = substr(md5(rand()), 0, 10);
                //echo '<script> alert("CHECKPOINT 0.5");</script>';
                $Database->upd_token($_SESSION["ADAPRIME_user_id"] ,$token);
                //echo '<script> alert("CHECKPOINT 1");</script>';
                $Database_BR->changePassword( $_REQUEST['username'] , $token );
                $User->login($_SESSION["ADAPRIME_user_id"], $token);
                //echo '<script> alert("CHECKPOINT 2");</script>';
                
                header('location: index.php');
            }
            else {
                $login_pass = true;
                $login_error = false;
                
               // echo '<script> alert("CHECKPOINT 3 else");</script>';
            }
            
        }
        else{
          if($status_code[0]==400){
            echo '<script> alert("Error occurred.<br>Please try again!");</script>';
            $login_error = true;
          }
          else if($status_code[0]==403){
            echo '<script> alert("Error occurred.<br>Please try again!");</script>';
            $login_error = true;
          }
          else if($status_code[0]==412){
            echo '<script> alert("Register for Pragyan.");</script>';
            //header('location: https://www.pragyan.org/17/home/events/code_it/adaventure/+login&subaction=register');
            $login_error = true;
          }
          else if($status_code[0]==401){
            echo '<script> alert("Invalid credential.");</script>';
            $login_error = true;
          }
          else if($status_code[0]==406){
            echo '<script> alert("Register for Adaventure.(In Codeit Section)");</script>';
            //header('location: https://www.pragyan.org/17/home/events/code_it/adaventure/+login&subaction=register');
            
            $login_error = true;
          }
          $login_error = true;
            // SHOW ERROR
        }
    }
}

if(isset($_REQUEST['flogin']) && isset($_REQUEST["gender"])){
        // INSERT IN DATABASE
        if(isset($_SESSION["ADAPRIME_user_id"]) && isset($_SESSION["ADAPRIME_full_name"]) && $_SESSION["ADAPRIME_user_id"] != "" && $_SESSION["ADAPRIME_full_name"] != "" ){      
            //echo '<script> alert("entered flogin"); </script>';
            if($Database->register($_SESSION["ADAPRIME_user_id"],$_SESSION["ADAPRIME_full_name"],$_REQUEST["gender"])){
                
                
                // 2nd table don't have entry
                $token = substr(md5(rand()), 0, 10);
                
                $Database->ins_token( $_SESSION["ADAPRIME_user_id"], $token );
                
                $Database_BR->updateUser( $_SESSION["ADAPRIME_user_id"] , $token);
                
                $User->login( $_SESSION["ADAPRIME_user_id"], $token );
                
                //echo 'xaxa19';
                $login_pass = false;
                // Unimplemented - put password
                
                //$User->login($_SESSION["ADAPRIME_user_id"], "");
                
                if(!$debug_no_redirect)
                    header('location: index.php');
            }
            else {
                //ERROR
                echo '<script> alert("Try Again!!\nIf problem persists, contact administrator."); </script>' ;
                $login_pass = false;
            }
             
        }
    else{
        echo $_SESSION["ADAPRIME_user_id"].$_SESSION["ADAPRIME_full_name"];
    }
}

if($User->isLoggedin()){
    header('location: index.php');
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
  <body>
      
      
      
    <div class="cover"></div>
           
    <?php include 'ADAPRIME/modules/starbackground.php'; ?>
      
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-inverse">
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
                          <li><a href="https://www.pragyan.org/17/home/" class="navmenu"><b>PRAGYAN'17</b></a></li>
                          <li data-toggle="modal" data-target="#prmodal"><a href="#" class="navmenu">Adaventure Prime Leaderboard</a></li> 
                          <!--li data-toggle="modal" data-target="#myModal"><a href="#" class="navmenu">Break-n Ride Leaderboard</a></li-->
                          <li><a href="#" class="navmenu">Break-n Ride Leaderboard</a></li>
                           
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
                          <li id="btnRegister"><a href="https://www.pragyan.org/17/home/events/code_it/adaventure/+login&subaction=register" target="blank" class="navmenu">
                              <span class="glyphicon glyphicon-user"></span>&nbsp; Register</a></li>
                          <li><a href="#"  data-toggle="modal" data-target="#login-modal" id="btnLogin" class="navmenu">
                              <span class="glyphicon glyphicon-log-in"></span>&nbsp; Login</a></li>
                        </ul>
                    </div>
                  </div>
                </nav>
                
            </div>
        </div>
                <a target="_blank" href="https://www.digitalocean.com/"><img style=" width:250px; max-width:33%; right:30px; position:absolute;" src="ADAPRIME/images/sponsorlogo.png" ></a>
        
        <div class="row">
            <div class="col-md-12">
                <div id="modalLogin" style="background: linear-gradient(to left, #00d2ff , #3a7bd5);">
                    <form class="pure-form" method="POST">
                        <input required='' id="username" name="username" type="email" placeholder="Enter Your Email">
                        <input required='' id="password" name="password" type="password" placeholder="Enter Your Password">

                        <button id="login" type="submit" name="login" class="pure-button pure-input-1 pure-button-primary" style="height: 38px; font-family: cursive;"> Login </button>
                        <a href="https://www.pragyan.org/17/home/events/code_it/adaventure/+login&subaction=resetPasswd" style="color:white;"> Forgot Password?</a>
                    </form>
                </div>
                <?php
                if($login_pass){
                ?>
                <div id="modalLogin1" style="background: linear-gradient(to left, #00d2ff , #3a7bd5);">
                    <form class="pure-form" style="padding:20px;" method="POST">
                        <input type="radio" style="margin-left:100px; margin-top:10px;" id="gender" name="gender" value="m" checked>&nbsp;<label for="gender" style="font-size:15px;"> Male </label><br>
                        <input type="radio" style="margin-left:100px;" name="gender" value="f">&nbsp;<label for="gender" style="font-size:15px;"> Female </label><br>
                        <button id="flogin" style="margin-top:20px;" type="submit" name="flogin" class="pure-button pure-input-1 pure-button-primary" style="height: 38px; font-family: cursive;"> Login </button>
                        
                    </form>
                </div>
                
                <?php
                    }
                ?>
                
            </div>
        </div>
        
        
        
        <?php include 'ADAPRIME/modules/adaprimeleader.php'; ?>
        
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
        
        <ul class="navss1 viewdesktop" >
          <a href="ADAPRIME/" style="text-decoration:none;"><li class="els1">Adaventure Prime</li></a>
          <a href="ADABR/" style="text-decoration:none;"><li class="els1">Break-n Ride</li></a>
          
          <li class="els1" data-toggle="modal" data-target="#contactus"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp; Contact Us</li>
        </ul>
        
        <?php include 'class/Update_class.php'; 
              echo "ABC";
        ?>
            <div class="update1" id="up" style="font-family: arial;">ADAVENTURE UPDATES
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
                </div>
                <div class="modal-body">
                <div>
                  <table  class="table table-responsive table-condensed">
                    <thead>
                      <tr>
                        <th colspan="2" style="text-align:center;font-size: 20px;">Contact Us<br><br></th>
                      </tr>

                    </thead>
                    <tr>
                      <td>Pranay Nagar<br></td>
                      <td>9790063411 /  9425316712</td>
                    </tr>
                    <tr>
                      <td>Christ Prateek Prasanna Xaxa<br></td>
                      <td >8763077849</td>

                    </tr>
                    
                    <tr>
                      <td colspan="2" style="font-weight: bolder"><br><br>Cluster Head</td>
                    </tr>
                    <tr>
                      <td><br>Janardhan J Kammath</td>
                      <td><br>9495957295</td>
                    </tr>
                    <tr>
                      <td colspan="2"><br><br>Email us at adaventure@pragyan.org</td>
                    </tr>
                  </table>
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
                  <div>If you think you are a cyber legend, then this event's tailor-made for you. Well, sure you won't be the only one thinking so, and that's what bases the fun factor of this event. The event? Given a safe to protect and a bank and other safes to rob, will you survive in the matrix?
                  </div>
          <br><br>

          <h2>SCHEDULE</h2>

          <ul>
            <li><strong>22 Feb  :</strong>Break N Ride will commence</li>
            <li><strong>24 FEB :</strong> Hints will be provided for all the levels to make it easier for the participant stuck at a particular level.</li>
            <li><strong>27 FEB  : (00:00)</strong> This being the last day of Break N Ride, the PHASE II will be unlocked for all the participants,          regardless of their current level.</li>
            <li><strong>27 FEB  : (23:59)</strong> End Break N Ride.</li>
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
          <h2>Phase II - Let the stealing begin :</h2><br><br>
          <h2>Rules and Regulations</h2>

          <ol>
          <li>It is compulsory to submit your program prior to be able to steal others test cases.</li>
          <li>The test case submitted previously can be changed after a minimum time period of 10 minutes.</li>
          <li>The guidelines to submit the program are as follows:
              <ol>
           
                  <li>The program should be submitted in C language.</li>
                  <li> A maximum length of the program allowed is 1000 characters.</li>
                  <li> No pre-processor directives are allowed. The header files pre-included is 'stdio.h'.</li>
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
              <li> The program should be submitted in C language.</li>
                  <li>A maximum length of the program allowed is 1000 characters.</li>
                  <li>No pre-processor directives are allowed. The header files pre-included is 'stdio.h'.</li>
                  <li>The test case to be submitted should produce exactly 300 lines of numerical values in the range [0, 500] and the numerical values must not be floating/decimal or negative values.</li>
                  <li>Using any inbuilt mathematical functions, malloc function, random values and garbage values are not allowed.</li>
            </ol>
          </li>
          <li>If you are able to crack the testcase, you will be awarded 10% of the current score of the target opponent. The testcase of your target 
          opponent is removed from the lounge until the user again returns back with any other program.</li>
          </ol>
          <br><br>
          <h2>To change your submission:</h2>
          <h2> Rules and Regulations</h2>
          <ol>
          <li>You can change your submission within an interval of 10 minutes.</li>
          <li>The guidelines to submit the program are as follows:
          <ol>
                  <li>The program should be submitted in C language.</li>
                  <li>A maximum length of the program allowed is 1000 characters.</li>
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
                  <h2 class="modal-title">Adaprime</h2>

                </div>
                <div class="modal-body">
          <div>Here's the event to feed the adventurous you. How well do you know your college. Prepare to decode a surprise-filled map of your own campus and go the distance past the levels. Born Adaventure...!!</div>
          <br><br>

          <h2>Instructions for the map of NITT</h2>

          <ol>
            <li>Download the zip file from the link given below.</li>
              <a href="https://drive.google.com/open?id=0B63az-b7GasrY3NLeUYxYzNuUmc">Click here</a>
            <li>Traverse the map to collect different access codes at prominent locations of NITT.</li>
            <li>Each access code denotes either a level, a bonus or a penalty.</li>
            <li>Some access code may be invalid</li>
            <li>Try to collect the access codes of the lower levels initially as they have to be entered in the website level-wise to move forward in the game.</li>
          </ol>  
          <br>


          <h2>SCHEDULE</h2>

          <ul>
            <li><strong>Staring date  :</strong>21st Feb 2017(9:00 PM) </li>
            <li><strong>Ending date      :</strong> 28th Feb 2017(11:59 PM) </li>
            <li>Level 4 and above will be open from 24th Feb 2017(6:00 PM)</li>
            
          </ul>  
          <br>

          <h2>General Instructions</h2>

          <ol>
          <li>The program should be submitted in C language and should be compatible with gcc-4.8.4(Turbo C should not be used).</li>
          <li>No preprocessor directives should be explicitly included.</li>
          <li>It is compulsory to include 'return 0'or 'exit(0)' at the end of the main function of your code.</li>
          <li>Don't use 'system()' and 'fork()'.</li>
          <li>Don't use 'void main()'.</li>
          <li>You can submitt your code as many times you want. No negative marking for that .</li>
          <!--li>Each level's instructions will be displayed once you reach that level.</-->
          <li>To cross each level, a minimum number of programs(which will specified separately at each level) of that level have to be submitted successfully.</li>  
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
          <h2> Instructions </h2>
          <ol>
          <li>The libraries which are implicitly included are "stdio.h","stdlib.h","string.h" and "math.h".</li>
          <li>For each solution successfully submitted, 100 points will be awarded.</li>
          <li>There will be NO partial marking. The solution will be submitted successfully only when all the testcases are passed.</li>
          <li>First successfull submission will be considered as final submission.</li>
          <li>Minimum no. of questions to be solved to proceed to next round : 6</li>
          </ol>
          <br><br>
          <h2>Level 2 - CodeSlash</h2>
          <h2> Instructions </h2>
          <ol>
          <li>The library which is implicitly included is "stdio.h".</li>
          <li><b>Marking Scheme:</b> It will be based on the length of the program, that is, the no. of characters used (excluding the spaces). If the length exceeds 9,999 then ZERO points will be awarded.<br>
          Example:<br>int main()<br>{<br>int a=10, b=20;<br>printf("%d",a+b);<br>return 0;<br>} --------Length of the program is 49<br>So the points awarded will be: (10,000-49)/100 = 99.51<br></li>
          <li>Comments will also contribute to code length.</li>
          <li>The solution will be submitted successfully only when all the testcases are passed.</li>
          <li>Submission with highest marks will be considered as final submission.</li>
          <li>Minimum no. of questions to be solved to proceed to next round : 2</li>
          </ol>

          <h2>Level 3 - Mix-N-Match</h2>
          <h2> Instructions </h2>
          <ol>
          <li>Only the following keywords, operators and special characters are allowed to be used.</li>

          <table class="table table-responsive table-condensed">
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
                <td>_linker_shift_</td>
                <td><<</td>
              </tr> 
                <tr>
                <td>26</td>
                <td>_rightshift_</td>
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
              _TERUGKEREN_  _DIKKEDARM_<br>
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
          <h2> Instructions </h2>
          <ol>
          <li>Everything is given a weight. The weight of your program will be the sum total of the weights of everything you use.</li>
          <li>The weight distribution is as follows:<br><br>
          <table class="table table-responsive table-condensed">
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
          <h2> Instructions </h2>
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
          <h2> Instructions </h2>
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
                                <img height="500px" width="330" src="images/prime.PNG">
                            </div>
                            <div class="container11" id="c211" data-toggle="modal" data-target="#adabrinfo">
                                <img height="500px" width="330" src="images/bnr.PNG">
                            </div>


                        </div>
                        </div>
                    <div class="viewmobile" style="text-align: center">
                      <div class="col-md-6 ">
                
                    <div class="panel panel-info" style="background: rgba(121, 132, 203,0.5);border: none;" data-toggle="modal" data-target="#adaprimeinfo">
                    <img src="images/adaventure_prime_mob.png" class="img-responsive center-block">
                      <div >
                                  
                                    <h3 style="color: #002;font-weight: bolder">Adaventure Prime</h3>
                                  <p style="color:#fff;font-size: 12px;padding:10px"> Here's the event to feed the adventurous you. How well do you know your college? Prepare to decode a surprise-filled map of your own campus and go the distance past the levels. Bon Adaventure!</p>
                                  
                                </div>
                    </div>
                
                  </div>

                  <div class="col-md-6 ">
                  
                  <div class="panel panel-info" style="background: rgba(121, 132, 203,0.5);border: none;" data-toggle="modal" data-target="#adabrinfo">
                    <img src="images/break-n-ride_mob.png" class="img-responsive center-block">
                    <div >
                                  <h3 style="color: #002;font-weight: bolder" >Break-n-Ride</h3>
                                  <p style="color:#fff;font-size: 12px;padding:10px"> If you think you are a cyber legend, then this event's tailor-made for you. Well, sure you won't be the only one thinking so, and that's what bases the fun factor of this event. The event? Given a safe to protect and a bank and other safes to rob, will you survive in the matrix?</p>

                                  </div>
                    </div>
                    
                  </div>
                          </div>
                          <!--mobile end-->
                    </div>
                    </div>
                </div>
            
            
            <div class="col-md-2">
            </div>
        </div>
        <!--
        <img class="fbsocial" src="ADAPRIME/images/fbsocial.png" onclick="window.open('http://www.facebook.com/adaventure','mywindow');">
        -->
    
    <?php
        if($login_error) {
    ?>
          <script>
              function setModalLoginVisibleFalse(){
                  modalLoginVisible1 = true;
                  //alert(modalLoginVisible1);
                  $("#modalLogin").slideDown(500);
                  $(".cover").fadeIn(500);
              }
              $(document).ready(function(){
                  setTimeout(setModalLoginVisibleFalse, 100);
              });
              
              
          </script>
    <?php
        }
        if($login_pass) {
    ?>
          <script>
              function setModalLoginVisibleFalse(){
                  modalLoginVisible1 = true;
                  //alert(modalLoginVisible1);
                  $("#modalLogin").slideUp(500);
                  $("#modalLogin1").slideDown(500);
                  $(".cover").fadeIn(500);
              }
              $(document).ready(function(){
                  setTimeout(setModalLoginVisibleFalse, 100);
              });
              
              
          </script>
    <?php
        }
    ?>                    
    
    <script>
    
    $(document).ready(function(){
        $("#cover").click(function(e){
            $("#modalLogin").slideUp();
        });
    });
    
    </script>
    
  </body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script>

$(document).ready(function(){
    $("#up").hover(function(){
        $("#di").delay(300).slideDown();
    }, function(){
		$("#di").hide();
	});
});


var picCount=0;
var picArray= ["images/sponsordo.png","images/sponsorbh.png"]
var linkArray= ["https://www.digitalocean.com/","http://www.bluehost.in/"]
function nextPic() {
picCount=(picCount+1<picArray.length)? picCount+1 : 0;
var build='<div style="color:#83A2F9; float:left; font-family:cursive;">Presented By:</div><a target="_blank" href="'+linkArray[picCount]+'"><img style="width:100%;" src="'+picArray[picCount]+'" ></a>';
document.getElementById("imgHolder").innerHTML=build;
setTimeout('nextPic()',2000)
}
</script>






<?php
include 'class/Question_class.php';
include 'class/User_class.php';
include 'class/Database_class.php';

$User->checkRedirectLogin('login.php');

include 'class/final_arrangement.php';


$uname=$User->getusername();
//get gender
$gender='m';

if(isset($_REQUEST['submit'])){
    $code = $_REQUEST['accesscode'];
    
    if($Database->validpbcode($code)){
        
        if($Database->check_level($uname)>1) {
            
            $status = $Database->check_pb($uname, $code, $gender);
            if($status == 'b') {
                // got bonus
                echo "<script>setTimeout(function() { createAlert('','Yippee!!!','You Have Got Bonus','success',true,true,'pageMessages'); },500);</script>";
            }
            else if($status == 'p') {
                // got penalty
                echo "<script>setTimeout(function() { createAlert('','Oops :( You Went On The Wrong Path You Got Penalty',' ','warning',false,true,'pageMessages'); },500);</script>";
            }
            else if($status == 't') {
                // code already used
                 echo "<script>setTimeout(function() { createAlert('','','Code Already Used!.','info',false,true,'pageMessages'); },500);</script>";
            }
            else if($status == 'i') {
                // invalid access code
                 echo "<script>setTimeout(function() { createAlert('Oops!','Invalid Access Code.',' ','danger',true,false,'pageMessages'); },500);</script>";
            }
        }
        else {
            //code of higher level
           echo "<script>setTimeout(function() { createAlert('','First Solve Previous Levels!!',' ','warning',false,true,'pageMessages'); },500);</script>";
        }
    }
    
    else if($Database->valid_access_code($code)){
        
        $level = $Database->level_access_code($code);
        $ques_no = $Database->question_access_code($code);

        if($level <= $Database->check_level($uname)){
            //hatana hai 24th ko
              if($uname!="akelazzz80@gmail.com" && $level==3){
              echo "<script>setTimeout(function() { createAlert('','This level will start from 22th Feb 2017 at 10:00 PM','Till then Solve previous level questions. ','warning',false,true,'pageMessages'); },500);</script>";         
            }
            else if($level>3){
              echo "<script>setTimeout(function() { createAlert('','This level will start from 24th Feb 2017','Till then Solve previous level questions. ','warning',false,true,'pageMessages'); },500);</script>";         
            }
            else{ 
            
              header('location: problem.php?accesscode='.$code);
              exit();
            }
        }
        else{
            // show : previous level not completed
           echo "<script>setTimeout(function() { createAlert('','Previous Level Not Completed First Solve Previous Levels!!',' ','warning',false,true,'pageMessages'); },500);</script>";         
        }
        
    }
    else{
        // show invalid access code
        echo "<script>setTimeout(function() { createAlert('Opps!','Invalid Access Code.',' ','danger',true,false,'pageMessages'); },500);</script>";
    }  
}
 
$User->checkRedirectLogin('login.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Adaventure17</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/pure-min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="icon" type="image/png" href="images/ada1.png">

  </head>
  <body onload="setTimeout('nextPic()',2000)">
      
    <?php include 'modules/starbackground.php'; ?>
	
    <div class="container-fluid">
        
        <nav class="navbar navbar-inverse" style="background-color:rgba(13, 16, 22,0.9);">
            <div class="container-fluid">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
          
                  <a href="https://www.pragyan.org/adaventure/"><img src="images/ada.png" id="adaimage"></a>
              </div>
              <div class="collapse navbar-collapse" id="navbar-collapse">
                  <ul class="nav navbar-nav">
                    <li><a target="blank" href="https://www.pragyan.org/17/home/" class="navmenu"><b>PRAGYAN'17</b></a></li>
                    <li data-toggle="modal" data-target="#prmodal"><a href="#" class="navmenu">Adaventure Prime Leaderboard</a></li> 
                    <li data-toggle="modal" data-target="#myModal"><a href="#" class="navmenu">Break-n Ride Leaderboard</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li name="logout"><a href="login.php?logout" class="navmenu"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
                  </ul>
              </div>
            </div>
          </nav>
          
        
        <div class="row">
            <div class="col-md-12">
              <div id="imgHolder" style=" width:200px; max-width:50%; height:33px; right:30px; float:right;"> 
                <div style="color:#83A2F9; float:left; font-family:cursive;">Presented By:</div>           
                <a target="_blank" href="https://www.digitalocean.com/"><img style="width:100%;" src="images/sponsordo.png" ></a>
              </div>                     
            </div>
        </div>
        
        <?php include 'modules/adaprimeleader1.php'; ?>
        
        <?php include 'modules/adabrleader.php'; ?>
        
        <?php include 'modules/contactus.php'; ?>
        
        <?php include 'modules/navmenu.php'; ?>
        
        <?php include 'modules/aupdates.php'; ?>
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8" style=" top:100px;">
                        <div style="background:white; width:200px; left:10%; padding:10px; border-radius:10px; position:relative; font-size:20px;"><a style="text-decoration:none; " href="https://drive.google.com/open?id=0B63az-b7GasrY3NLeUYxYzNuUmc" target="blank"><span class="glyphicon glyphicon-download-alt"></span>&nbsp; Download Map</a></div><br>
                        <div style="background:white; width:80%; left:10%; padding:10px; padding-top:5px; padding-bottom:5px; border-radius:10px; position:relative;">
                            <form class="form-horizontal">
                            <fieldset>
                                <legend>Get Started !</legend>
                              <div class="form-group">
                                  <label class="col-md-1 control-label"></label>
                                  <div class="col-md-10">
                                  <input id="accesscode" name="accesscode" autofocus="autofocus" type="password" placeholder="Enter Access Code" class="form-control input-md" required="">
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <label class="col-md-1 control-label" for="submit"></label>
                                    <div class="col-md-10">
                                  <input type="submit" id="submit" name="submit"class="btn btn-primary" style="float:right;" value="SUBMIT" />
                                </div>
                                </div>
                            </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        
        
    </div>
        
     
    <div id="pageMessages">
    </div>  
           
  </body>
</html>
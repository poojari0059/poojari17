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
        
        /*if($Database->check_level($uname)>1 && $Database->check_level($uname)<4) {
            
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
            if($Database->check_level($uname)<2){
               echo "<script>setTimeout(function() { createAlert('','First Solve Previous Levels!!',' ','warning',false,true,'pageMessages'); },500);</script>";
            }
            else if($Database->check_level($uname)>3){
               echo "<script>setTimeout(function() { createAlert('','Code expired!!',' ','warning',false,true,'pageMessages'); },500);</script>";
            }
        }*/
                
        echo "<script>setTimeout(function() { createAlert('','Code expired!!',' ','warning',false,true,'pageMessages'); },500);</script>";
                        
    }
    
    else if($Database->valid_access_code($code)){
        
        $level = $Database->level_access_code($code);
        $ques_no = $Database->question_access_code($code);

        /*if($level <= $Database->check_level($uname)){
             
             if($level>6){
             
             
              echo "<script>setTimeout(function() { createAlert('','Level does not exist..','Solve previous level questions. ','warning',false,true,'pageMessages'); },500);</script>";
               
            }
            else{
            
              header('location: problem.php?accesscode='.$code);
              exit();
              
            }
        }
        else{
            // show : previous level not completed
           echo "<script>setTimeout(function() { createAlert('','Previous Level Not Completed First Solve Previous Levels!!',' ','warning',false,true,'pageMessages'); },500);</script>";         
        }*/
        if($level==5){
          header('location: problem_reversecoding.php?accesscode='.$code);
          exit();
        }
        else {
            header('location: problem.php?accesscode='.$code);
            exit();
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
      
    <?php include 'modules/starbackground.php'; ?>
	
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php include 'modules/titlebar.php'; ?>
            </div>
        </div>
        
        <div class="row">
              <!--div class="col-md-3">
              </div>
              <div class="col-md-6">
                  <center><span style="font-size:15px; color:white;">All levels of Adaventure prime are now open to all.</span></center>
              </div-->
              <div class="col-md-12">
              <?php include 'modules/greeting.php'; ?>   
              </div>
          </div>
        
        <?php include 'modules/adaprimeleader.php'; ?>
        
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
                    <div class="col-md-8 gtstrt">
                        <div style="background:white; width:170px; left:10%; padding:6px; border-radius:6px; position:relative; font-size:17px; text-align: center;"><a style="text-decoration:none; " href="https://drive.google.com/open?id=0B63az-b7GasrY3NLeUYxYzNuUmc" target="blank"><span class="glyphicon glyphicon-download-alt"></span>&nbsp; Download Map</a></div><br>
                        <div style="background:white; width:80%; left:10%; padding:10px; padding-top:5px; padding-bottom:5px; border-radius:8px; position:relative;">
                            <form class="form-horizontal" method="POST">
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
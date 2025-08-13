
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
include 'utils/utils.php';
include 'class/User_class.php';
include 'class/Database_class.php';

$debug = false;

$User->checkRedirectLogin('login.php');

include 'class/final_arrangement.php';


$uname=$User->getusername();

$code = $_REQUEST['accesscode'];

$flag = FALSE;

if($Database->valid_access_code($code)){
    
    $level = $Database->level_access_code($code);
    $ques_no = $Database->question_access_code($code);
    

    if($level == 5){
        header("location: problem_reversecoding.php?accesscode=".$code);
    }
    
    $flag=TRUE;
}
else{
  header('Location: get_started.php?accesscode='.$code);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Adaventure'17</title>


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
            <div class="col-md-12">
                <?php include 'modules/greeting.php'; ?>
            </div>
        </div>
        
        <?php include 'modules/adaprimeleader.php'; ?>
        
        <?php include 'modules/navmenu.php'; ?>
        
        <?php include 'modules/aupdates.php'; ?>
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="row">
          
              <?php
                if($flag){
                  //echo $level." ".$ques_no;
                  $Question->showquestion($level, $ques_no);
                }
              ?>
          
					<form action="result.php" method="POST">
                            <?php
                            nl();
                            echo '<label class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 10px 10px 0px 0px; padding: 10px;">Enter your C-program below</label>';
                            nl();
                             if($level==2 || $level==3 || $level==4)
                               codeTextArea_header1();
                             else
                               codeTextArea_header2();
                        
                             codeTextArea_body();
                             nl();

                             echo '<input type="hidden" name="haccesscode" value="'.$code.'"/>';

                            echo '<label class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 0px 0px 10px 10px; padding: 10px;">
                            <input type="submit" id="singlebutton" name="submit" class="btn btn-success" value="SUBMIT" style="width: 100%;" /></label>';
                            ?>
					
					</form>
                </div>
                
                
            </div>
            <div class="col-md-2">
            </div>
        </div>
        
    </div>
  </body>
</html>
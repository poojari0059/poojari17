
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

    if($level != 5){
        header("location: problem.php?accesscode=".$code);
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
    
    <script>
    home_url = "http://192.168.43.13:3080/adaventure17/ADAPRIME/";
    </script>
    
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
                      $Question->showdescription($level, $ques_no);
                    }
                  ?>
          
          
          <div class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 0px 0px 10px 10px; padding: 0px; margin-bottom: 10px; height: auto;">
            <div class="col-md-6">
            <textarea readonly style="margin: 10px; margin-bottom: 0px; width: 100%; resize: none; border: none; outline: none;" placeholder="//Place your input below:"></textarea><br>
              <textarea id="rctestinput" autofocus="autofocus" name="rctestinput" style="margin: 10px; margin-top: 0px; height: 350px; width: 100%; resize: none; border: none; border-right: 4px solid #C3C5D5; outline: none;"></textarea>
            </div>
            <div class="col-md-6">
                        <textarea readonly style="margin: 10px; margin-bottom: 0px; width: 100%; resize: none; border: none; outline: none;" placeholder="//Output :"></textarea><br>
                
                        
                          <textarea readonly id="txtoutput" style="margin: 10px; margin-top: 0px; height: 350px; width: 100%; resize: none; border: none; outline: none;">
                        </textarea>
                        <center><div id="loading" style="display: none; margin: 10px; margin-top: 0px; height: 354px; width: 100%;"><img style="width:100px;" src="images/load.gif" /> <label style="color: #999; margin-left:10px; font-size:20px; font-family: cursive;">Please wait . . . </label> </div></center>
                    </div>
                    
                <button id="btn_showoutput" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 10px; outline: none; float:left;" >SHOW OUTPUT</button>
          
            <!--button id="btn_showoutput" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 10px; outline: none;" >SHOW OUTPUT</button--> 
            </div>         
          
          <script>
          
          function hideLoad(){
              $("#txtoutput").show();
              $("#loading").hide();
          }
          
          $(document).ready(function(){
              $("#btn_showoutput").click(function(){
                          $("#txtoutput").hide();
                          $("#loading").show();              
                  $.ajax({url: "rcoutput.php?qno=<?php echo $ques_no; ?>&level=<?php echo $level; ?>&uname=<?php echo $uname; ?>&code="+$("textarea#rctestinput").val().replace(/(\r\n|\n|\r)/gm, '%0D%0A'), success: function(result){
                            
                            setTimeout(function(){
                                $("#txtoutput").show();
                                $("#loading").hide();
                              }, 1000);                  
                      $("#txtoutput").html(result);
                  }});
              });
          });
          
          </script>
            
					<form action="result.php" method="POST">
						
                    <!div class="col-md-12" style="background:white; top:150px; height:200px; border-radius:10px;">
                        
                    <!/div>
            		<?php
					nl();
					echo '<label class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 10px 10px 0px 0px; padding: 10px;">Enter your C-program below</label>';
					nl();
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
        
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
  </body>
</html>
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
include 'class/Compiler_class.php';
include 'utils/utils.php';
include 'class/Database_class.php';
include 'class/User_class.php';

//print_r( $User );

$User->checkRedirectLogin('login.php');

include 'class/final_arrangement.php';


$uname=$User->getusername();

//print_r( $User );

if(!isset($_REQUEST['submit'])){
    header("location: get_started.php");
}

//$code = $_REQUEST['accesscode'];
//print_r( $User );
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
                
                <?php include 'modules/starbackground.php'; 
                ?>
      
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php include 'modules/titlebar.php'; ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <?php include 'modules/greeting.php'; 
                //print_r( $User );
                ?>
            </div>
        </div>
        
        <?php include 'modules/adaprimeleader.php';
        //echo "before hello"; 
        //print_r( $User );
        //echo "hello";
        ?>
        
        <?php include 'modules/navmenu.php'; 
        //print_r( $User );
        ?>
        
        <?php include 'modules/aupdates.php'; 
        //print_r( $User );
        ?>
    
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                
                <div class="row">
                
                <?php
                      
                      //print_r( $User );
                      //nl();
                      
        if($User->isLoggedin() && isset($_REQUEST["submit"])) {
            //print_r($User);
            $User->checkRedirectLogin('login.php');
            $uname=$User->getusername();
					  $haccesscode1 = $_REQUEST["haccesscode"];
					  $level = $Database->level_access_code($haccesscode1);
					  $ques = $Database->question_access_code($haccesscode1);
                      
					  //echo '<script>alert("'.$ques.$level.'");</script>';
                          
						$input_code=$_REQUEST["codearea"];
																								 
					   if($level==3){
						   $input_code = $Database->mixnmatchcode($input_code);
					   }
					   else if($level==2 || $level==4){
						   $input_code = $Database->math_check($input_code);
					   }
              else {
                $input_code = $Database->preprocessor($input_code);
              }
					$input_code = addHeaderFile($input_code, $level);
					$path = "upload/";
					$fcprogram = $path.$uname."_lv_".$level."_qn_".$ques.".c";
					$fp=fopen($fcprogram,"w");
					fputs($fp, $input_code);
					fclose($fp);
					
					//$Compiler->compile("/home/cppxaxa/Desktop/sandbox/clean.c", "/home/cppxaxa/Desktop/sandbox/abhinavcheck.out");
					$fcompiled = $path.$uname."_lv_".$level."_qn_".$ques.".out";
					//echo $foutput;
					
					
					  echo '<button type="button" id="goback" class="btn btn-primary" style="float:left;" onclick="window.history.back();">GO BACK</button>';
            
					  nl(); nl(); nl();
					  
					$clearflag=true;
					               
					if(!$clearflag){
						echo '<label class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 10px; padding: 10px;">Compilation Error in submitted C-program </br> Please check for errors and submit it again</label>';		
					}
       
					else if( $Compiler->compile($fcprogram, $fcompiled) ){
						// Get testcases
						//$testcase = [];
						$testcase = $Question->read_testcase_name($level, $ques);
						//$testcase[] = "/home/cppxaxa/public_html/adaventure17/ADAPRIME/upload/testcase_lv_".$level."_qn_".$ques."_1.txt";
						//$testcase[] = "/home/cppxaxa/public_html/adaventure17/ADAPRIME/upload/testcase_lv_".$level."_qn_".$ques."_2.txt";
						//$testcase[] = "/home/cppxaxa/public_html/adaventure17/ADAPRIME/upload/testcase_lv_".$level."_qn_".$ques."_3.txt";
						
						$result = [];
						$result[] = "upload/result_lv_".$level."_qn_".$ques."_1.txt";
						$result[] = "upload/result_lv_".$level."_qn_".$ques."_2.txt";
						$result[] = "upload/result_lv_".$level."_qn_".$ques."_3.txt";
						//$i = 0;
						//$fprogoutput = $path.$uname."_output_result.txt";
						
						echo '<label class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 10px; padding: 10px;">';
						
						$nTestcasePassed = 0;
						
						for($i = 0; $i < 3; $i++){
							$fprogoutput = $path.$uname."_output_lv_".$level."_qn_".$ques."_".($i+1).".txt";
							if( checkSafeProgram($uname, $fcompiled, $fprogoutput, $testcase[$i]) ){
								echo "No syntactic and runtime error for testcase ".($i + 1);
								
								$result_equal = true;
								unset($f);
                                
                                
                                $lfOutput = getOutputFromProgram($uname, $fcompiled, $fprogoutput, $testcase[$i]);
                                
                                //print_r($lfOutput);
                                
								//$f = fopen($fprogoutput, "r");
                                $k = 0;
								$fIdeal = fopen($result[$i], "r");
								while($k < count($lfOutput) && !feof($fIdeal)){
									$line = $lfOutput[$k];
                                    $k++;
									$lineIdeal = fgets($fIdeal, 100);
									if(trim($line) != trim($lineIdeal))
										$result_equal = false;
									//echo $line." == ".$lineIdeal." ?";
									//nl();
								}
                                /*
								if(feof($f) != feof($fIdeal)){
                                    $extra = "";
                                    if(!feof($f))
                                        $extra = fgets($f, 100);
                                    if(!feof($fIdeal))
                                        $extra = fgets($fIdeal, 100);
                                    
                                    if(feof($f) != feof($fIdeal)){
                                        $result_equal = false;
                                        echo "<br/>Equality fails, No of lines not equal";
                                    }
                                    else if(trim($extra) == ""){
                                        
                                    }
                                    else{
                                        $result_equal = false;
                                    }
									//nl();
								}*/
                                if($k <= 1 + count($lfOutput) || !feof($fIdeal)){
                                    $extra = "";
                                    $extra2 = "";
                                    if($k <= count($lfOutput))
                                        $extra2 = fgets($f, 100);
                                    if(!feof($fIdeal))
                                        $extra = fgets($fIdeal, 100);
                                    
                                    if(!feof($fIdeal)){
                                        $result_equal = false;
                                        echo "<br/>Equality fails, No of lines not equal";
                                    }
                                    else if(count($lfOutput) - $k > 0){
                                        $result_equal = false;
                                        echo "<br/>Equality fails, No of lines not equal";
                                    }
                                    else if(trim($extra) == "" && trim($extra2) == ""){
                                        
                                    }
                                    else{
                                        $result_equal = false;
                                    }
                                }
								//fclose($f);
								fclose($fIdeal);
								unset($fIdeal);
								//unset($f);
								
								nl();
								if($result_equal){
									echo '<div style="border-left : thick double lime; padding: 5px; color: gray;">';
									echo 'Testcase '.($i+1).' : Passed';
									echo '</div>';
									
									$nTestcasePassed++;
								}
								else{
									echo '<div style="border-left : thick double red; padding: 5px; color: gray;">';
									echo 'Testcase '.($i+1).' : Failed';
									echo '</div>';
								}
								nl();
								
							}
							else{
								echo 'Your program is not abinding to our rules and regulations.</br>Hence the program is not acceptable.';
								
								break;
							}
							
							unlink($fprogoutput);
						}
						
						echo "</label>";
                            
						if($nTestcasePassed == 3 && $uname != ''){
                               if($Database->submission_check($uname,$level,$ques)){
                                   $Database->save_program($uname,$level,$ques,$input_code);
                                   $Database->update_score($uname,$level,$ques,$input_code);
                                   /*if($Database->check_level($uname) == $level && $Database->level_increase($uname,$level)){
                                 
                                   echo '<label class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 10px; padding: 10px;">Congratulations ! Level increased.</label>';
                                 }*/
                             }
                             
                             
							echo '<label class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 10px; padding: 10px;">Congratulations ! You have solved the question.</label>';
                                             
               //For Showing score in a question                
              echo '<label class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 10px; padding: 10px;">
              <div>Maximum Marks Obtained &nbsp;'.$Database->get_question_score($User->getUsername(),$level,$ques).'<i style="color:green;" class="fa fa-check"></i></div></label>';
              
              echo '<a href="get_started.php"><button type="button" class="btn btn-primary" style="float:right; margin-bottom: 15px; margin-up: 15px;">CONTINUE</button></a><script>$(document).ready(function(){ $("#goback").hide();});</script>';
						}
						else{
							echo '<label class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 10px; padding: 10px;">Try to pass all the testcases to pass this level.</label>';
						}
              
            if($uname == ""){
                echo '<label class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 10px; padding: 10px;">Your session expired. Please login.</label>';
            }
						unlink($fcompiled);
            //unlink($fcprogram);
					}
					else
					{
						echo '<label class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 10px; padding: 10px;">Compilation Error in submitted C-Program </br> Please check for errors and submit again.</label>';
					}
				}
					
						?>
						
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
                      <div class='facebook' onclick="location.href='http://www.facebook.com/adaventure'; target='_new';">
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
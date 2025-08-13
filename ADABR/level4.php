<?php

include 'utils/utils.php';
include 'class/User_class.php';
include 'class/Database_class.php';
include 'class/Compiler_class.php';

$debug = false;

$level = $Database->getLevel( $User->getUsername() );

if($level == 4){
    
}
else{
    //header('location: level'.$level.'.php');
    header('location: get_started.php');
}

$User->checkRedirectLogin('login.php');

include 'class/final_arrangement.php';











$flag = false;







if(isset($_REQUEST['codearea']) && $_REQUEST['codearea'] != ''){
    //echo "<script>alert('Program Submitted');</script>";
    
    //Unimplemented check correctness
    //if(){
        
        
        
        
        
        
        
     
        
        
    //if(check_function($_REQUEST['codearea']) == 0){ //unimplemented...viranjan will implement with return true or false
    if(Math_Check($_REQUEST['codearea'])){
        //echo "<script>alert('Program Submitted');</script>";
        if($debug){
            echo '<textarea style="width: 1000px; height: 200px;">';
            echo "ORIG : ".$_REQUEST['codearea'];
        }
        
        // Unimplemented
        //$_REQUEST['codearea'] = check_function($_REQUEST['codearea']);
        
        if($debug){
            echo "\n\nMOD : ".$_REQUEST['codearea'];
            echo "</textarea>";
        }
        // Run the program and get output
        $fpath = "level4_area/";
        $fname = $fpath . $User->getUsername() . "_level4_prog.c";
        $fprog = $fpath . $User->getUsername() . "_level4_prog.out";
        $finput = $fpath . "input.txt";
        $foutput = $fpath . $User->getUsername() . "_level4_prog.txt";
        //echo $fname;
        //Unimplemented
        
        
        
        if(l4_submit($_REQUEST['codearea'], 30) && check_operator( $_REQUEST['codearea'] ) <= 5)
        {
            //echo "<script>alert('Program Submitted');</script>";

            file_put_contents($fname, "
                  #include <stdio.h>\n\r
                  int main(){\n\r
                  	int a = 2;\n\r
                  	int i;\n\r
                  	for(i=1; i<=300; i++)\n\r
                  		printf(\"%d\\n\", 
            ", LOCK_EX);
        
        
        
            
            
            file_put_contents($fname, $_REQUEST['codearea'], FILE_APPEND | LOCK_EX);
            
            file_put_contents($fname, "
                      );\n\r
                      return 0;\n\r
                  }\n\r
            ", FILE_APPEND | LOCK_EX);
            
            $file = file_get_contents($fname, FILE_USE_INCLUDE_PATH);
            
            if($debug){
                echo "<br/>".$file."<br/>";
            }
            
            //echo "<br/>".$fname." ".$fprog."<br/>";
            $Compiler->compile($fname, $fprog);
            
            //echo "start 3.5";
            //checkSafeProgram($username, $fname, $output_path, $testcase);
            //echo "<br/>".$User->getUsername()." ".$fprog." ".$foutput." ".$finput."<br/>";
            if( checkSafeProgram($User->getUsername(), $fprog, $foutput, $finput) ){
                //echo "start 4";
                
                if($debug){
                    echo "Safe";
                }
                //echo "<textarea>";
                //print_r( getOutputFromProgram($User->getUsername(), $fprog, $foutput, $finput) );
                if($debug){
                    echo json_encode( getOutputFromProgram($User->getUsername(), $fprog, $foutput, $finput) );
                }
                
                $val =  json_encode( getOutputFromProgram($User->getUsername(), $fprog, $foutput, $finput) );
                $val1 = json_encode( getOutputFromProgram($User->getUsername(), $fprog, $foutput, $finput) );
                //if 300 output numbers
                
                
                
                
                //if(l4check_output($val, $val1)){
                if($debug){
                    echo "hello 0.5";
                }
                if(l4check_output($val,$val1)){
                    if($debug){
                        echo "hello 1";
                    }
                
                
                    if(true){
                        $Database->adabr_level4_testcase($User->getUsername(), $val);
                        
                        if($level == 4){
                            $Database->updateScore($User->getUsername(), 4);
                            $Database->setLevel($User->getUsername(), 5);
                            
                            header('location: level5.php');
                        }
                    
                        $flag = true;
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    }
                    
                    //echo "</textarea>";
                    
                
                
                
                
                
                
                
                
                
                
                
                }
                
                if($debug){
                    echo "hello 1.5";
                }
            
            
            
            }
            else{
                //echo "No safe program";
            }
        }
        else{
            //echo "NO l4_debug";
        }
    }
}




if($debug){
    echo "To save prog : ";
    if($flag)
        echo "true";
    else
        echo "false";
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
                <!--div class="row boxposition">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-5 text-center boxmargin">
                        <div class="box" data-toggle="modal" data-target=".bs-example-modal-lg">
                            <div class="box-content">
                                <h1 class="tag-title h1box-font">Adaventure Prime</h1>
                                <hr />
                                <img src="images/tumblr_static_bg3.png" class="box-img">
                                <p>AAdaventure Prime<br />Game 1</p>
                                <br />
                                <a href="#" class="btn btn-block btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 text-center boxmargin">
                        <div class="box" data-toggle="modal" data-target=".bs-example-modal-lg">
                            <div class="box-content">
                                <h1 class="tag-title h1box-font">Break-n Ride</h1>
                                <hr />
                                <img src="images/tumblr_static_bg3.png" class="box-img">
                                <p>BBreak-n Ride<br />Game 2</p>
                                <br />
                                <a href="#" class="btn btn-block btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div-->
                    <!--div class="col-md-4 text-center boxmargin">
                        <div class="box" data-toggle="modal" data-target=".bs-example-modal-lg">
                            <div class="box-content">
                                <h1 class="tag-title h1box-font">Mix-n-Match</h1>
                                <hr />
                                <img src="images/tumblr_static_bg3.png" class="box-img">
                                <p>MMix-n-Match<br />Game 3</p>
                                <br />
                                <a href="#" class="btn btn-block btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                </div-->
                <div class="row">
                        <?php
                            
                            if($Database->ifScorePresent( $User->getUsername() , 4)){
                                echo '<textarea readonly style="padding: 20px; outline: none; border: none; border-radius:10px; width: 100%; height: auto; resize: none;">';
                                $attack = $Database->adabr_level4_getLastAttack( $User->getUsername() );
                                
                                echo "Sorry, your piece of code is cracked by @".$attack['to']." on ".$attack['timestamp']."! Please submit a program again inorder to enter to the lounge and break others.";
                                //echo $level."<br/>".$qno."<br/><br/>";
                                echo '</textarea>';
                                
                                echo '<a style="position: relative; float: right; margin-bottom: 5px;" href="level4_history.php"><button class="btn btn-primary">SHOW PASSBOOK</button></a>';
                                
                            }
                        
                          //if($flag){
                            echo '<textarea readonly style="padding: 20px; outline: none; border: none; border-radius:10px; width: 100%; height: 530px;  resize: none;">';
                            //echo "Please submit a program with 2500 characters of source code. Your output should consist of only whole numbers excluding negative numbers but includes 0. The count of numbers generated whould be 300.";
                            
                            if(isset($_REQUEST['codearea']) && $_REQUEST['codearea'] != ''){
                                echo "Sorry, your code is not abinding with our rules and regulations\n\n";
                            }
?>
Rules and Regulations

1.	It is compulsory to submit your program prior to be able to steal others’ test cases.
2.	The test case submitted previously can be changed after a minimum time period of 10 minutes.
3.	The guidelines to submit the program are as follows: 
        a) The program should be submitted in C language.
        b) A maximum length of the characters to be inserted is 30 characters.
        c) No pre-processor directives are allowed. The header files pre-included is 'stdio.h'.
        d) The test case to be submitted should produce exactly 300 lines, each consisting of numerical values in the range [0, 500] and the numerical values must not be floating/decimal or negative values.
        e) Using any inbuilt mathematical functions, malloc function, random values and garbage values are not allowed.
        f) Maximum number of allowed operators is 5 ( Note : Some shorthands are considered as 1 operator e.g. += )
        g) You can try experimenting which things are allowed below
4.	Once your test case has been stolen, it is compulsory to submit another test case again to be able to steal others test cases.
5.  If in case, if your testcase is cracked, then your 10% of current score is passed to the person who cracked your testcase. Furthermore, your testcase is removed from the lounge and you need to submit a program again to continue once again.
6.  After entering to the lounge, if you happen to crack someone's testcase, you will be awarded 10% of the target opponent's current score.
7.  After submitting your program, you will be provided the dashboard with the other people's testcases. You will be allowed to search and preview the testcases as well as calculated 10% of their current score.
8.  Your each submission history is also recorded. We allow to track each transactions related to you with the feature "Passbook".<?php
                            //echo $level."<br/>".$qno."<br/><br/>";
                            echo '</textarea>';
                          //}
                          
                            nl();
                            echo '<label class="col-md-12" style="width: 100%; color: black; background: white; border-radius: 10px; padding: 10px;">Enter your C-program below</label>';
                            nl();
                        
                        ?>
                        
					<form action="" method="GET">
						
                    <!div class="col-md-12" style="background:white; top:150px; height:440px; border-radius:10px;">
                    <!/div>
            		<?php
					
                        codeTextArea_border("10px 10px 0px 0px", 2);
                        nl();
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
<?php

include 'class/Database_class.php';
include 'class/User_class.php';
include 'utils/utils.php';

$level = $Database->getLevel( $User->getUsername() );

if( $level != 3){
    //header('location: level'.$level.'.php');
    header('location: get_started.php');
}

$User->checkRedirectLogin('login.php');

include 'class/final_arrangement.php';

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
                    
<textarea readonly style="padding: 20px; outline: none; border: none; border-radius:10px; width: 100%; height: auto; resize: none;">Instructions
You have to hack your way through the username and password.
</textarea>
                    
                    
                    <div class="col-md-9" style="background:white; top:30px; height:auto; border-radius:10px;">
                        
                        <div class="bg-info" style="padding: 10px; margin-bottom: 10px;"><h3>LEVEL 3</h3></div>
                        
                        <?php
                        
                        if(! isset($_REQUEST['command']))
                            echo "Make your way through the terminal to boot the os";
                        ?>
                        </br>
                        </br>
                        
                        <div class="bg-danger" style="padding: 2px; margin-bottom: 10px;"><h5>BOOTLOADER TERMINAL 7</h5></div>
                        
						<div style="padding: 10px; margin-bottom: 10px;">
                        <?php
                        
                        function encloseTextarea($var){
                            echo '<textarea style="outline: none; border: 0; width: 100%; height: 160px;  resize: none;" readonly>'.$var."</textarea>";
                        }
                        
                        if(isset($_REQUEST['command'])){
                            $cmd = $_REQUEST['command'];
                            
                            $found = true;
                            
                            switch($cmd){
                                case "ls -a": echo '<img src="level3/ls_a.jpg" style="position: relative; width: 100%; height: auto;"></img>';
                                break;
                                case "ls": echo '<img src="level3/ls.jpg" style="position: relative; width: 100%; height: auto;"></img>';
                                break;
                                case "man": echo encloseTextarea(show_file('level3/man.txt'));
                                break;
                                case "help": echo encloseTextarea(show_file('level3/man.txt'));
                                break;
                                case "man cat": echo encloseTextarea(show_file('level3/man_cat.txt'));
                                break;
                                case "man exec": echo encloseTextarea(show_file('level3/man_exec.txt'));
                                break;
                                case "man ls": echo encloseTextarea(show_file('level3/man_ls.txt'));
                                break;
                                case "help cat": echo encloseTextarea(show_file('level3/man_cat.txt'));
                                break;
                                case "help exec": echo encloseTextarea(show_file('level3/man_exec.txt'));
                                break;
                                case "help ls": echo encloseTextarea(show_file('level3/man_ls.txt'));
                                break;
                                case "exec /ai/kernel.so": echo encloseTextarea(show_file("level3/exec_kernel_so.txt"));
                                break;
                                case "exec /bin/passwd": echo encloseTextarea(show_file("level3/exec_passwd.txt"));
                                break;
                                case "exec /bin/passwd -dump": echo encloseTextarea(show_file("level3/exec_passwd_dump.txt"));
                                break;
                                case "exec /bin/passwd -encrypt": echo encloseTextarea(show_file("level3/exec_passwd_encrypt.txt"));
                                break;
                                case "exec /bin/psql": echo encloseTextarea(show_file("level3/exec_psql.txt"));
                                break;
                                case "exec /usr/root": echo encloseTextarea(show_file("level3/exec_root.txt"));
                                break;
                                case "exec /usr/su": echo encloseTextarea(show_file("level3/exec_su.txt"));
                                break;
                                case "exec /ai/x0": echo encloseTextarea(show_file("level3/exec_x0.txt"));
                                break;
                                case "cat /ai/kernel.so": echo encloseTextarea(show_file("level3/cat_kernel_so.txt"));
                                break;
                                case "cat /bin/passwd": echo encloseTextarea(show_file("level3/cat_passwd.txt"));
                                break;
                                case "sudo /bin/passwd postgres": echo "Password : toor";
                                break;
                                case "exec /bin/passwd postgres": echo "Password : toor";
                                break;
                                case "exec /bin/passwd postgres": echo "Password : toor";
                                break;
                                case "sudo /bin/passwd psql": echo "Password : toor";
                                break;
                                case "exec /bin/passwd psql": echo "Password : toor";
                                break;
                                case "exec /bin/passwd psql": echo "Password : toor";
                                break;
                                
                                //case "abc": echo encloseTextarea();
                                //break;
                                
                                default: $found = false;
                                break;
                            }
                            
                            if(! $found){
                                $line = explode(" ", $cmd);
                                $module = NULL;
                                $user = NULL;
                                $pass = NULL;
                                
                                for($i = 0; $i < count($line) -1; $i++){
                                    switch($line[ $i ]){
                                        case "exec": $module = $line[ $i + 1 ]; $i++;
                                        break;
                                        case "-u" : $user = $line[ $i + 1 ]; $i++;
                                        break;
                                        case "-p" : $pass = $line[ $i + 1 ]; $i++;
                                        break;
                                    }
                                }
                                
                                if($module == NULL || $user == NULL || $pass == NULL )
                                    $found = false;
                                else
                                    $found = true;
                                
                                //echo $module." ".$user." ".$pass;
                                
                                if($module == '/bin/psql' && $user == 'root' && $pass == 'toor'){
                                    echo "ADABR\n^Z";
                                }
                                else if($module == '/ai/x0' && $user == 'root' && $pass == 'AI_rocks!'){
                                    ?>
                                    <form action="process3.php" method="POST">
                                        <input type="hidden" name="module" value="<?php echo $module; ?>">
                                        <input type="hidden" name="username" value="<?php echo $user; ?>">
                                        <input type="hidden" name="password" value="<?php echo $pass; ?>">
                                        <button id="submit" name="submit" class="btn btn-primary">SUBMIT YOUR RESEARCH</button>
                                    </form>
                                    <?php
                                }
                                
                                nl();
                            }
                            
                            if(! $found){
                                echo encloseTextarea("Ignoring string");
                            }
                        }
                        ?>
                        </div>
                        
                        <form method="POST">
                        <input name="command" style="outline: none; border: 0;" type="text" id="cmd" value="" placeholder="Bootloader commands here" autofocus>
                        </form>
						
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
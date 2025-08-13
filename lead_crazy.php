<?php

include "ADAPRIME/class/Database_class.php";
include "ADAPRIME/class/User_class.php";

?>

<link rel="stylesheet" type="text/css" href="ADABR/css/bootstrap.min.css" />

            <table class="table">
						
              <thead>
                <tr>
                  <th>Rank</th>
                  <th>Username</th>
                  <th>Ques 1</th>
                  <th>Ques 2</th>
                  <th>Ques 3</th>
                  <th>Ques 4</th>
                    <th>Ques 5</th>
                  <th>Sum</th>
                </tr>
              </thead>
								  <tbody>
										<?php

            $uname = '';
            //$score = 0;
           
						$value = $Database->glb_crazy();
            if($User->isLoggedIn()){
                $uname = $User->getUsername();
                //$score = $Database->getScore($uname)['totalscore'];
            }
            //echo "Hello ".$uname;
            $flag = false;
            
						for($i = 0; $i < 10&& $value[$i]['username']!=''; $i++){
                if($uname != '' && $value[$i]['username'] == $uname){
                    $flag = true;
                    echo '<tr style="background:#ddf;">'; 
                }
                else{
                    echo "<tr>";
                }
					?>
					  
						  <td><?php echo($i+1); ?>.</td>
						  <td><?php echo $value[$i]['username']; ?></td>
              <td><?php echo $value[$i]['m1']; ?></td>
              <td><?php echo $value[$i]['m2']; ?></td>
              <td><?php echo $value[$i]['m3']; ?></td>
              <td><?php echo $value[$i]['m4']; ?></td>
              <td><?php echo $value[$i]['m5']; ?></td>
						  <td><?php echo $value[$i]['totalscore']; ?></td>
						</tr>
					  
                          
           <?php
           }
           
           if($uname != ''  && $Database->check_level($uname)>=4 && !$flag){
           
           ?>
           
            <tr style="background:#ddf;">
						  <td><?php echo $Database->getRank_crazy($uname); ?>.</td>
						  <td><?php echo $uname; ?></td>
              
              <?php
              
              //echo "Hello";
              $value = $Database->marks_crazy($uname);
              //print_r($value);
              //echo "Hello2";
              
              ?>
              
              
						  <td><?php echo $value['m1']; ?></td>
              <td><?php echo $value['m2']; ?></td>
              <td><?php echo $value['m3']; ?></td>
              <td><?php echo $value['m4']; ?></td>
              <td><?php echo $value['m5']; ?></td>
              <td><?php echo $value['totalscore']; ?></td>
              
						</tr>
					  
           <?php
           
           }
           
           ?>
				
								  </tbody>
								  <?php
                 
						unset($Database);
						?>
				  				</table>
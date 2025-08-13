<?php

include "ADABR/class/Database_class.php";
include "ADABR/class/User_class.php";

?>

<link rel="stylesheet" type="text/css" href="ADABR/css/bootstrap.min.css" />

            <table class="table">
						
              <thead>
                <tr>
                  <th>Rank</th>
                  <th>Username</th>
                  <th>Total Score</th>
                  <th>Level</th>
                </tr>
              </thead>
								  <tbody>
										<?php

            $uname = '';
            $score = 0;
           
						$value = $Database->getLeaderboard(10);
            if($User->isLoggedIn()){
                $uname = $User->getUsername();
                $score = $Database->getScore($uname)['totalscore'];
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
						  <td><?php echo $value[$i]['totalscore']; ?></td>
						  <td><?php echo $value[$i]['level']; ?></td>
						</tr>
					  
                          
           <?php
           }
           
           if($uname != '' && !$flag){
           
           ?>
           
            <tr style="background:#ddf;">
						  <td><?php echo $Database->getRank($uname); ?>.</td>
						  <td><?php echo $uname; ?></td>
						  <td><?php echo $score; ?></td>
						  <td><?php echo $Database->getLevel($uname); ?></td>
						</tr>
					  
           <?php
           
           }
           
           ?>
				
								  </tbody>
								  <?php
                 
						unset($Database);
						?>
				  				</table>
<div id="prmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel"><caption><h3 align="center"> ADAVENTURE PRIME<br>LEADERBOARD</h3></caption></h4>
                    <li data-toggle="modal" data-target="#golfModal" style="top:-10px; position:relative; float:left;"><a href="#" class="navmenu">Codeslash Leaderboard</a></li>
                    <li data-toggle="modal" data-target="#crazyModal" style="top:-10px; position:relative; float:right"><a href="#" class="navmenu">Crazy Leaderboard</a></li>
            </div>
            <div class="modal-body">
                    
                <table class="table">

                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Username</th>
                            <th>Total Score</th>
                            <!--th>Level</th-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //adaprime database

                        $uname = '';

                        if($User->isLoggedin()){
                        $uname=$User->getUsername();
                        //echo "Hello ".$uname;
                        }
                        $value = $Database->getLeaderboard(10);
                        for($i = 0; $i<10 && $value[$i]['username']!='' ; $i++){
                        if($uname != '' && $uname == $value[$i]['username'])
                        echo '<tr style="background: #ddf;">';
                        else
                        echo '<tr>';
                        ?>
                        <td><?php echo($i+1); ?>.</td>
                        <td><?php echo $value[$i]['username']; ?></td>
                        <td><?php echo $value[$i]['totalscore']; ?></td>
                        <!--td><?php echo $Database->check_level($value[$i]['username']); ?></td-->
                        </tr>


                    <?php
                    }

                    if($User->isLoggedin() && $Database->getRank($uname)>=10){
                    $rank=$Database->getRank($uname);
                    //$l=$Database->getLevel($uname);
                    $score=$Database->total_score($uname,$l);
                    ?>
                    <tr style="background:#ddf;">
                    <td><?php echo $rank; ?>.</td>
                    <td><?php echo $uname; ?></td>
                    <td><?php echo $score; ?></td>
                    <!--td><?php echo $l; ?></td-->
                    </tr>
                    <?php
                    }
                    else
                    {
                    //echo "No Hello";
                    }
                    //unset($User);
                    //unset($Database);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'modules/adaprimecodegolfleader.php'; ?>

<?php include 'modules/adaprimecrazyleader.php'; ?>

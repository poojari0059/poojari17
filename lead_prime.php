
<script src="ADAPRIME/js/jquery.min.js"></script>
<script src="ADAPRIME/js/bootstrap.min.js"></script>
<script src="ADAPRIME/js/scripts.js"></script>



<?php

include 'ADAPRIME/class/Question_class.php';
include 'ADAPRIME/class/User_class.php';
include 'ADAPRIME/utils/curl/curl.php';
include 'ADAPRIME/class/Database_class.php';
include 'ADABR/class/Database_BR_class.php';

?>


<?php

include 'utils/utils.php';


?>



    <link href="ADAPRIME/css/bootstrap.min.css" rel="stylesheet">
    <link href="ADAPRIME/css/style.css" rel="stylesheet">
    <link href="ADAPRIME/css/pure-min.css" rel="stylesheet">
    <link rel="stylesheet" href="ADAPRIME/css/font-awesome.min.css" />
    <link rel="icon" type="image/png" href="ADAPRIME/images/ada1.png">








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
  
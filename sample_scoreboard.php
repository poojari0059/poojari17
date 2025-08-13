<?php

include "ADABR/class/Database_class.php";

$value = $Database->getLeaderboard(10);
for($i = 0; $i < 10; $i++){
    echo $value[$i]['username']." ".$value[$i]['totalscore']." ".$value[$i]['level']."<br/>";
}

unset($Database);

?>
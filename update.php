<?php

include 'class/Update_class.php';
//include 'Update_class.php';
//include 'ADAPRIME/class/Update_class.php';

$len = 10;
$list = $Update->getTextList( $len );

echo "<table>\n";

for($i = 0; $i < $len; $i++){
    echo "<tr><td>".$list[$i]."</td></tr>\n";
}

echo "</table>\n";

?>
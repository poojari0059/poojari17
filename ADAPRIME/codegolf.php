<?php
function code_golf_len($code) {
   $code="       n     charint   ";
  echo $code;
echo "<br>";
rtrim($code);
$code_length = strlen($code) - substr_count($code, ' ');

return  $code_length;
   
   
}


?>
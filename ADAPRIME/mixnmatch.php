<?php
function mix_n_match_pre_processing($code) {

   //$code="int main(void)int x = 16printf(%d,firstFactorialDivisibleNumber(x));return 0;";

  //echo $code;
  //echo "<br>";

  $ristricted_find_array =  array("auto", "double", "struct", "break", "else" ,"long", "switch", "case", "enum" ,"register", "typedef", "exturn" ,"union", "const", "short" ,"unsigned" ,"continue" ,"for" ,"signed", "void", "default" ,"goto", "sizeof", "volatile" ,"do", "static" ,"#","+", "-", ":", "<", "?", "/", "%", "printf", "scanf", ">", "*", "%", "^", "!", "&", "int", "float", "main", "char", "if", "while", "return", "/", "|", "~", ",", ";");

  $c =  str_replace($ristricted_find_array,"xx",$code);
  $code=$c;

  $find_array =  array("_CHAR_", "_VLOTTER_", "_INT_", "_INDIEN_", "_TERWIJL_", "_BELANGRIJKSTE_", "_PRINTF_", "_SCANF_", "_TERUGKEREN_", "_ALTERISK_", "_AMPERSAND_", "_MULTIPLICATION_", "_DIVISIE_", "_GROTER_", "_EQUALEQUA_", "_ENBEVESTIG_", "_WEBINTERFACEOFOF_", "_NIET_", "_XOF_", "_AANVULLING_", "_OF_", "_EN_", "_GELIJK_", "_KOMMA_", "_DIKKEDARM_", "_MODULUSD_", "_MODULUSF_");
  
  $replace_array = array("char", "float", "int", "if", "while", "main", "printf", "scanf", "return", "*", "&", "*", "/", ">", "==", "&&", "||", "!", "^", "~", "|", "&", "=", ",", ";", "%d", "%f");

   $c=str_replace($find_array,$replace_array,$code);

   $code=$c;

 //  echo "<br>"; 
  // echo $code;
   
   return $code;
}


?>
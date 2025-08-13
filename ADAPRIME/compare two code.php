<?php

function code_similarity($code1, $code2) {
    
    $set_percentage=60;
    
  //$code1 = "Depending structure  a=2+5; structure";
  //$code2 = "Depending on the structure a=2+5;  of your structure array ";
    $count1 = str_word_count($code1, 1);
    $count2 = str_word_count($code2, 1);

    //$result=array_intersect(array_unique($pieces1), array_unique($pieces2));
    $result=array_intersect($count1, $count2); 
    
    $maxword=max(count($count1),count($count2));
    //echo $maxword;
    $matched_word= count($result);
    
    $percentage =($matched_word*100)/$maxword;
    //echo $percentage;
    if($percentage> $set_percentage)
        return true;
    return false;
   
 }
?>
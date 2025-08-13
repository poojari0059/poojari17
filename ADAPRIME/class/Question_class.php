<?php

class Question_class{
	
	public function linecount($text, $cols, $minrows=1) {
		if ($text <= '') {return $minrows;}
		$text = wordwrap($text, $cols, PHP_EOL);
		$rows = substr_count( $text, PHP_EOL )+1;
		if ($minrows >= $rows) {$rows = $minrows;}
		return $rows;
	}
	
	public function showquestion($level, $qno){
		$location = "ques/";
		$filename = $location."ques_lv_".$level."_qn_".$qno.".txt";
    //echo getcwd();
    //echo "FILE : ".getcwd()."/".$filename;
    /*
    if(file_exists(getcwd()."/".$filename)){
        echo "TRUE";
    }
    else
        echo "FALSE";
    */
    //echo "PATH : ".realpath($filename);
		$question =  file_get_contents ( $filename );
    //echo "QUES : ".$question;
		echo '<div readonly style="background-color:#fff; padding: 20px; outline: none; border: none; border-radius:10px; width: 100%; height: auto; resize: none;">';
		//echo "Problem Statement\n\n";
		echo $question;
		//echo $level."<br/>".$qno."<br/><br/>";
		echo '</div>';
	}
 
 public function showdescription($level, $qno){
		$location = "ques/";
		$filename = $location."ques_lv_".$level."_qn_".$qno.".txt";
		$question =  file_get_contents ( $filename );
		echo '<div readonly style="background-color:#fff; padding: 20px; outline: none; border: none; border-radius:10px 10px 0px 0px; width: 100%; height: auto; resize: none;">';
		//echo "Problem Statement\n\n";
		echo $question;
		//echo $level."<br/>".$qno."<br/><br/>";
		echo '</div>';
	}
	
	public function read_testcase($level, $ques){
		$file1 = "upload/testcase_lv_".$level."_qn_".$ques."_1.txt";
		$file2 = "upload/testcase_lv_".$level."_qn_".$ques."_2.txt";
		$file3 = "upload/testcase_lv_".$level."_qn_".$ques."_3.txt";
		$t1  = file_get_contents ($file1);
		$t2  = file_get_contents ($file2);
		$t3  = file_get_contents ($file3);
        $testcase = array($t1,$t2,$t3);
		return $testcase;
	}
		 
	public function read_testcase_name($level, $ques){
		$file1 = "upload/testcase_lv_".$level."_qn_".$ques."_1.txt";
		$file2 = "upload/testcase_lv_".$level."_qn_".$ques."_2.txt";
		$file3 = "upload/testcase_lv_".$level."_qn_".$ques."_3.txt";
			  
        $testcase = array($file1,$file2,$file3);
		return $testcase;
	}
}


$Question = new Question_class();

//$Question->showquestion(1, 4);

?>
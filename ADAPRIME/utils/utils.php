<?php

function check_cookie(){
	setcookie("test_cookie", "test", time() + 3600, '/');

	if(count($_COOKIE) > 0) {
    	return true;
	} else {
    	return false;
	}
}

function generate_token(){
    $length=10;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
	}
    return $randomString;
}

function calc_input_programname($username, $level, $qno){
	return "prog_".$username."_".$level."_".$qno.".c";
}

function codeTextarea(){
	echo '<textarea class="col-md-12" name="codearea" style="width: 100%; height: 300px; border-radius:10px; border: none; outline: none;"></textarea>';
}
function codeTextarea_border($border){
	echo '<textarea class="col-md-12" name="codearea" style="width: 100%; height: 300px; border-radius: '.$border.'; border: none; outline: none;"></textarea>';
}
function codeTextarea_header1(){
	echo '<textarea readonly class="col-md-12" style="width: 100%; height:33px; padding-left:25px; padding-top:10px; border-radius:0px 0px 0px 0px; resize: none; border: none; outline: none;" placeholder="#include<stdio.h>"></textarea>';
}
function codeTextarea_header2(){
	echo '<textarea readonly class="col-md-12" style="width: 100%; height:90px; padding-left:25px; padding-top:10px; border-radius:0px 0px 0px 0px; resize: none; border: none; outline: none;" placeholder="#include<stdio.h>
#include<string.h>
#include<math.h>
#include<stdlib.h>"></textarea>';
}
function codeTextarea_body(){
	echo '<textarea class="col-md-12" name="codearea" style="width: 100%; height: 400px; padding-left:25px; border-radius:0px0px 10px 10px; resize: none; border: none; outline: none;"></textarea>';
}

function nl(){
	echo "<br/>";
}

function checkSafeProgram($username, $fname, $output_path, $testcase){
  //$val = [];
  //echo "SYNTAX ".$username." ".$fname." ".$output_path." ".$testcase."<br/>";
  
	$result = [];
	
	$upload_path = "/home/cppxaxa/public_html/adaventure17/ADAPRIME/upload/";
	
  $python_path = "python";
  $sandbox_path = "/home/cppxaxa/Desktop/sandbox/sample2.py";
  $file_path = $fname;
  //$output_path = "/home/cppxaxa/public_html/adaventure17/ADAPRIME/upload/".$username."_out.txt";
  //$full_path = $python_path." ".$sandbox_path." ".$file_path." > ".$output_path;
  $result_path = $upload_path.$username."_prog_status.txt";
  $full_path = $python_path." ".$sandbox_path." ".$file_path." ".$output_path." ".$result_path." ".$testcase;
  //echo "Path ".$full_path;
  //nl();nl();
  
	
	//$ftmp = fopen($upload_path."pranay_output_result.txt", "w");
	//fclose($ftmp);
	//chmod($upload_path."pranay_output_result.txt", 0777);
	
	//$ftmp = fopen($upload_path."pranay_prog_status.txt", "w");
	//fclose($ftmp);
	//chmod($upload_path."pranay_prog_status.txt", 0777);
	
	//nl();
	//echo "I am ".shell_exec("whoami");
	//nl();
	
	$output = shell_exec($full_path." 2>&1");
	//$output = shell_exec("python -V 2>&1");
	//$output = shell_exec("whoami");
	//echo "Sandbox : ".$output;
	
	$output_array = explode("\n", $output);
	
	//nl();
	//echo "Count ".count($output_array);
	//nl();
	
	$output_text = [];
	
	$prog_safe = $output_array[count($output_array) -1];
	
	for($i = 0; $i < count($output_array) -1; $i++){
		$output_text[] = $output_array[$i];
	}
	
	//echo "Is it Safe ? ".$prog_safe;
	//nl();
	//echo "Output";
	//nl();
	
	$foutput_text = fopen($output_path, "w");
	
	foreach($output_text as $line){
		//echo $line;
		fputs($foutput_text, $line);
		//nl();
	}
	
	fclose($foutput_text);
	
	//nl();
	//nl();

	if($prog_safe == "OK"){
		return true;
	}
	else{
		//echo "Machine error occurred ! ";
		//nl();
		echo "Please check for memory leak and ensure you have terminated program using exit(0) or return 0.";
		nl();
	}
  return false;
}
//print_r( checkSafeProgram('cppxaxa', '/home/cppxaxa/public_html/ADAPRIME/upload/clean.out'));
//print_r( checkSafeProgram('cppxaxa', '', '', '') );





function getOutputFromProgram($username, $fname, $output_path, $testcase){
  //$val = [];
	$result = [];
	
	$upload_path = "/var/www/html/adaventure17/ADAPRIME/upload/";
	
    $python_path = "python";
    $sandbox_path = "/home/cppxaxa/Desktop/sandbox/sample2.py";
    $file_path = $fname;
    //$output_path = "/home/cppxaxa/public_html/adaventure17/ADAPRIME/upload/".$username."_out.txt";
    //$full_path = $python_path." ".$sandbox_path." ".$file_path." > ".$output_path;
    $result_path = $upload_path.$username."_prog_status.txt";
    $full_path = $python_path." ".$sandbox_path." ".$file_path." ".$output_path." ".$result_path." ".$testcase;
    //echo "Path ".$full_path;
    //nl();nl();

	
	//$ftmp = fopen($upload_path."pranay_output_result.txt", "w");
	//fclose($ftmp);
	//chmod($upload_path."pranay_output_result.txt", 0777);
	
	//$ftmp = fopen($upload_path."pranay_prog_status.txt", "w");
	//fclose($ftmp);
	//chmod($upload_path."pranay_prog_status.txt", 0777);
	
	//nl();
	//echo "I am ".shell_exec("whoami");
	//nl();
	
	$output = shell_exec($full_path." 2>&1");
	//$output = shell_exec("python -V 2>&1");
	//$output = shell_exec("whoami");
	//echo "Sandbox : ".$output;
	
	$output_array = explode("\n", $output);
	
	//nl();
	//echo "Count ".count($output_array);
	//nl();
	
	$output_text = [];
	
	$prog_safe = $output_array[count($output_array) -1];
	
	for($i = 0; $i < count($output_array) -1; $i++){
		$output_text[] = $output_array[$i];
	}
	
	//echo "Is it Safe ? ".$prog_safe;
	//nl();
	//echo "Output";
	//nl();
	
//	$foutput_text = fopen($output_path, "w");
//	
//	foreach($output_text as $line){
//		//echo $line;
//		fputs($foutput_text, $line);
//		//nl();
//	}
//	
//	fclose($foutput_text);
	
	
	
	//nl();
	//nl();

	if($prog_safe == "OK"){
		return $output_text;
	}
    return [];
}






function addHeaderFile($code, $level){
   //stdio
   $code = "#include <stdio.h>\n\n" . $code;
   
   if($level == 1 || $level == 5 || $level == 6){
     //math, string
     $code = "#include <math.h>\n\n" . $code;
     $code = "#include <string.h>\n\n" . $code;
     $code = "#include <stdlib.h>\n\n" . $code;
   }
   
   return $code;
}

/*
$code = "int main()\n{\n\n}\n";
$code = addHeaderFile($code, 1);
echo "<textarea>".$code."</textarea>";
*/

?>

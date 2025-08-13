<?php

function check_cookie(){
	setcookie("test_cookie", "test", time() + 3600, '/');

	if(count($_COOKIE) > 0) {
    	return true;
	} else {
    	return false;
	}
}

function calc_input_programname($username, $level, $qno){
	return "prog_".$username."_".$level."_".$qno.".c";
}

function codeTextarea(){
	echo '<textarea class="col-md-12" name="codearea" style="width: 100%; height: 300px; border-radius:10px; border: none; outline: none; resize: none; padding-top: 10px;"></textarea>';
}

function codeTextarea_border($border, $val = 1){
    if($val == 1){
	      echo '<textarea class="col-md-12" name="codearea" style="width: 100%; height: 300px; border-radius: '.$border.'; border: none; outline: none; resize: none; padding-top: 10px;"></textarea>';
    }
    else{
        echo '<textarea readonly class="col-md-12" style="width: 100%; height: 140px; border-radius: 10px 10px 0px 0px; border: none; outline: none; resize: none; padding-top: 10px; color: #999;">#include <stdio.h>
int main(){
    int a = 1;
    int i;
    for( i = 1; i <= 300; i++ )
        printf("%d\n", </textarea>';
        echo '<textarea class="col-md-12" name="codearea" style="width: 100%; height: 40px; border: none; outline: none; resize: none; padding-top: 10px;" placeholder="//Enter code here"></textarea>';
        echo '<textarea readonly class="col-md-12" style="width: 100%; height: 90px; border-radius: 0px 0px 0px 0px; border: none; outline: none; resize: none; padding-top: 10px; color: #999;">
        );
    return 0;
}</textarea>';
    }
}

function nl(){
	echo "<br/>";
}

function checkSafeProgram($username, $fname, $output_path, $testcase){
  //$val = [];
	$result = [];
	
	$upload_path = "/home/cppxaxa/public_html/adaventure17/ADABR/level4_area/";
	
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
		//echo "Please check for memory leak and ensure you have terminated program using exit(0) or return 0.";
		//nl();
	}
  return false;
}
//print_r( checkSafeProgram('cppxaxa', '/home/cppxaxa/public_html/ADAPRIME/upload/clean.out'));

function getOutputFromProgram($username, $fname, $output_path, $testcase){
  //$val = [];
	$result = [];
	
	$upload_path = "/home/cppxaxa/public_html/adaventure17/ADABR/level4_area/";
	
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


function show_file($fname){
    $f = fopen($fname, "r");
    $line = "";
    while(!feof($f)){
        $line = $line.fgets($f, 100);
    }
    return $line;
}
/*function check_function($source_code)
{
    $code2 = array("malloc","#","rand","abs","acos","asin","atan","atan2","cos","cosh","sin","sinh","tan","tanh","exp","frexp","ldexp","log","log10","modf","pow","sqrt","ceil","fabs","floor","fmod","modf","scalbn","scalbln","cbrt","hypot","erf","erfc","tgamma","lgamma","ceil","floor","fmod","trunc","round","rint","nearbyint","remainder","remquo","copysign","nan","nextafter","nexttoward","fdim","fmax","fmin","fabs","abs","fma");
    
    $value = 0;
    
    for($i = 0; $i < count($code2); $i++){
      //$code1 = "Depending structure  a=2+5; structure";
      //$code2 = "Depending on the structure a=2+5;  of your structure array ";
        $count1 = str_word_count($source_code, 1);
        $count2 = str_word_count($code2[$i], 1);

        //$result=array_intersect(array_unique($pieces1), array_unique($pieces2));
        $result=array_intersect($count1, $count2); 
       
        //$maxword=max(count($count1),count($count2));
        //echo $maxword;
        $matched_word = count($result);
        $value += $matched_word;
    }
    
    //echo $value;
    
    return $value;
/*$fun = array("malloc","#","rand");//"abs","","acos","asin","atan","atan2","cos","cosh","sin","sinh","tan","tanh","exp","frexp","ldexp","log","log10","modf","pow","sqrt","ceil","fabs","floor","fmod","modf","scalbn","scalbln","cbrt","hypot","erf","erfc","tgamma","lgamma","ceil","floor","fmod","trunc","round","rint","nearbyint","remainder","remquo","copysign","nan","nextafter","nexttoward","fdim","fmax","fmin","fabs","abs","fma");
$source_code = str_replace($fun,"@",$source_code,$count);
return $source_code;*/

function Math_Check($code1){
      $code2="malloc #include # #define #if #ifdef #defined # rand abs acos asin atan atan2 cos cosh sin sinh tan tanh exp frexp ldexp log log10 modf pow sqrt ceil fabs floor fmod modf scalbn scalbln cbrt hypot erf erfc tgamma lgamma ceil floor fmod trunc round rint nearbyint remainder remquo copysign nan nextafter nexttoward fdim fmax fmin fabs absfma";

        $count1 = str_word_count($code1, 1);
        $count2 = str_word_count($code2, 1);

        //$result=array_intersect(array_unique($pieces1), array_unique($pieces2));
        $result=array_intersect($count1, $count2); 

        //$maxword=max(count($count1),count($count2));

        $matched_word= count($result);
            if($matched_word)
                return false;
        return true;
        }

//function to check length of code submitted
function l4_submit($source_code, $value = 1000)
{
$len = strlen($source_code);
    if($len>$value)
        return false;
return true;
}
function l4check_output($json_output1, $json_output2)
{
$output1 = json_decode($json_output1,TRUE);
$output2 = json_decode($json_output2,TRUE);

for($i=0;$i<count($output1);$i++){
    if($output1[$i]!=$output2[$i])
        { //echo "length of output dont match";	
            return false;}
}


if(count($output1)==301) //change to decode json string and check each element of array for 0, special character, and decimal
{
    
    for($i=0;$i<300;$i++)
        {
            if(preg_match('/[\'^£$%&*()}{@#~?><>,.|=_+¬-]/',$output1[$i]) || trim($output1[$i]) == ''|| $output1[$i]<0 || $output1[$i]>500 ||   !is_numeric($output1[$i]))
            {  
                return false;}
        }

    return true;
}
return false;
}
//l4_submit("#include<stdio.h> int main(){return 0;}");
//l4check_output("1 2 3 4 ","1 2 3 4 ");

function convert_email($email)
{
$res = preg_replace("/[@.]/", "", $email);
echo $res;
}


function check_operator($code)
{
$code2 = (string)$code;
$code2 = str_replace(' ','',$code2);
$count=0;
if(substr_count($code2,'sizeof'))
{
$count+= substr_count($code2,'sizeof');
$code2 = str_replace('sizeof','',$code2);
}
if(substr_count($code2,'>>='))
{
$count+=substr_count($code2,'>>=');
$code2 = str_replace('>>=','',$code2);
}
if(substr_count($code2,'<<='))
{
$count+=substr_count($code2,'<<=');
$code2 = str_replace('<<=','',$code2);
}
if(substr_count($code2,'++'))
{
$count+=substr_count($code2,'++');
$code2 = str_replace('++','',$code2);
}
if(substr_count($code2,'--'))
{
$count+=substr_count($code2,'--');
$code2 = str_replace('--','',$code2);
}
if(substr_count($code2,'<<'))
{
$count+=substr_count($code2,'<<');
$code2 = str_replace('<<','',$code2);
}
if(substr_count($code2,'>>'))
{
$count+=substr_count($code2,'>>');
$code2 = str_replace('>>','',$code2);
}
if(substr_count($code2,'+='))
{
$count+=substr_count($code2,'+=');
$code2 = str_replace('+=','',$code2);
}
if(substr_count($code2,'-='))
{
$count+=substr_count($code2,'-=');
$code2 = str_replace('-=','',$code2);
}
if(substr_count($code2,'*='))
{
$count+=substr_count($code2,'*=');
$code2 = str_replace('*=','',$code2);
}
if(substr_count($code2,'/='))
{
$count+=substr_count($code2,'/=');
$code2 = str_replace('/=','',$code2);
}
if(substr_count($code2,'%='))
{
$count+=substr_count($code2,'%=');
$code2 = str_replace('%=','',$code2);
}
if(substr_count($code2,'&&'))
{
$count+=substr_count($code2,'&&');
$code2 = str_replace('&&','',$code2);
}
if(substr_count($code2,'||'))
{
$count+=substr_count($code2,'||');
$code2 = str_replace('||','',$code2);
}
if(substr_count($code2,'&='))
{
$count+=substr_count($code2,'&=');
$code2 = str_replace('&=','',$code2);
}
if(substr_count($code2,'^='))
{
$count+=substr_count($code2,'^=');
$code2 = str_replace('^=','',$code2);
}
if(substr_count($code2,'!='))
{
$count+=substr_count($code2,'!=');
$code2 = str_replace('!=','',$code2);
}
if(substr_count($code2,'|='))
{
$count+=substr_count($code2,'|=');
$code2 = str_replace('|=','',$code2);
}
if(substr_count($code2,'<='))
{
$count+=substr_count($code2,'<=');
$code2 = str_replace('<=','',$code2);
}
if(substr_count($code2,'>='))
{
$count+=substr_count($code2,'>=');
$code2 = str_replace('>=','',$code2);
}
if(substr_count($code2,'=='))
{
$count+=substr_count($code2,'==');
$code2 = str_replace('==','',$code2);
}
if(substr_count($code2,'+'))
{
$count+=substr_count($code2,'+');
$code2 = str_replace('+','',$code2);
}
if(substr_count($code2,'-'))
{
$count+=substr_count($code2,'-');
$code2 = str_replace('-','',$code2);
}
if(substr_count($code2,'!'))
{
$count+=substr_count($code2,'!');
$code2 = str_replace('!','',$code2);
}
if(substr_count($code2,'~'))
{
$count+=substr_count($code2,'~');
$code2 = str_replace('~','',$code2);
}
if(substr_count($code2,'*'))
{
$count+=substr_count($code2,'*');
$code2 = str_replace('*','',$code2);
}
if(substr_count($code2,'/'))
{
$count+=substr_count($code2,'/');
$code2 = str_replace('/','',$code2);
}
if(substr_count($code2,'%'))
{
$count+=substr_count($code2,'%');
$code2 = str_replace('%','',$code2);
}
if(substr_count($code2,'<'))
{
$count+=substr_count($code2,'<');
$code2 = str_replace('<','',$code2);
}
if(substr_count($code2,'>'))
{
$count+=substr_count($code2,'>');
$code2 = str_replace('>','',$code2);
}
if(substr_count($code2,'&'))
{
$count+=substr_count($code2,'&');
$code2 = str_replace('&','',$code2);
}
if(substr_count($code2,'^'))
{
$count+=substr_count($code2,'^');
$code2 = str_replace('^','',$code2);
}
if(substr_count($code2,'|'))
{
$count+=substr_count($code2,'|');
$code2 = str_replace('|','',$code2);
}
if(substr_count($code2,'?'))
{
$count+=substr_count($code2,'?');
$code2 = str_replace('?','',$code2);
}
if(substr_count($code2,'='))
{
$count+=substr_count($code2,'=');
$code2 = str_replace('=','',$code2);
}
/*
if(substr_count($code2,','))
{
$count+=substr_count($code2,',');
$code2 = str_replace(',','',$code2);
}
*/

return $count;

}


?>

<?php
class Database_P_class{
	private $conn;
	function  __construct($host, $user, $pass, $db)
	{
		$this->conn = mysqli_connect($host, $user, $pass, $db);
	}
function authenticate($uname,$token){
        $uname = mysqli_real_escape_string($this->conn, $uname);
        $token = mysqli_real_escape_string($this->conn, $token);
        $sql = "SELECT count(*) `count` FROM `adaventuretoken` where `username` = '$uname' and `token` = '$token'";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_array($result);
        if($row['count'] == 1)
            return true;
        return false;
}
public function check_entry($uname)
{
	$sql="select count(*) as c from adaventuretoken where username='$uname'";
	$result=mysqli_query($this->conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row['c']>0)
		return 1;
	else
		return 0;
}
public function ins_token($uname,$token){ 
  $uname = mysqli_real_escape_string($this->conn, $uname);
  $token = mysqli_real_escape_string($this->conn, $token);
	$sql="insert into adaventuretoken values('".$uname."','".$token."')";
	$result=mysqli_query($this->conn,$sql);
  echo $sql;
	//echo "ins";
	return 1;
}

function upd_token($uname,$token){
    $sql="update  adaventuretoken set `token`='".$token."' where `username`='".$uname."' ";
    $result=mysqli_query($this->conn,$sql);
	//echo $sql;
	//echo "upd";
	return 1;
}


public function preprocessor($code){
  $code1=array("include","#","typedef","define","fork","system");
  $code=str_replace($code1,"xx",$code);
  return $code;
}
public function mixnmatchcode($code)
{    
 $ristricted_find_array =  array("auto","double", "struct", "break", "else" ,"long", "switch", "case", "enum" ,"register", "typedef", "exturn" ,"union", "const", "short" ,"unsigned" ,"continue" ,"for" ,"signed", "void", "default" ,"goto", "sizeof", "volatile" ,"do", "static" ,"#","+", "-", ":", "<", "?", "%", "printf", "scanf", ">", "*", "%", "^", "!", "&", "int", "float", "main", "char", "if", "while", "return", "/", "|", "~", ",", ";","=", "_AFTREKKEN__AFTREKKEN_","_TOEVOEGEN__TOEVOEGEN_","_GELIJK__GELIJK_","?","typedef", "gets", "puts","_EQUALEQUA__EQUALEQUA_","<<",">>","_AMPERSAND__AMPERSAND_","_OF__OF_","fork","system");

  $c =  str_replace($ristricted_find_array,"xx",$code);
  $code=$c;

  $ristricted_find_array1= array("include", "#","define", "acos", "acosh", "asin", "asinh", "atan", "atan2", "atanh","cbrt", "ceil", "copysign", "cos", "cosh", "erf", "erfc", "exp", "exp2", "expm1", "fabs", "fdim", "floor",  "fma", "fmax","fmin", "fmod","frexp", "hypot","ilgob", "ldexp", "lgamma", "llrint", "llround", "log", "log10", "log1p", "log2", "logb", "lrint", "lround", "nearbyint", "nextafter", "nexttoward", "pow", "reminder", "remquo", "rint", "round", "scalbln", "scalbn", "sin", "sinh", "sqrt", "tan", "tanh", "tgamma", "trunc", "memchr", "memcmp", "memcpy", "memmove" ,"memset", "strcmp", "strcat","strncat", "strchr", "strncmp", "strcoll", "strcpy", "strncpy", "strerror","strlen","strrchr", "strspn", "strstr", "strtok", "strxfrm", "atof", "atoi", "atol", "strtod", "strtol", "strtoul", "calloc", "free", "malloc", "relloc", "abort",  "abs", "qsort", "div", "labs", "ldiv", "rand", "srand", "mbtowc", "wcstombs", "wctomb","mblen", "mbstowcs","delay");
        
  $c =  str_replace($ristricted_find_array1,"xx",$code);
  $code=$c;  
  $find_array =  array("_CHAR_", "_VLOTTER_", "_INT_", "_INDIEN_", "_TERWIJL_", "_BELANGRIJKSTE_", "_PRINTF_", "_SCANF_", "_TERUGKEREN_", "_AMPERSAND_", "_DIVISIE_", "_ENBEVESTIG_", "_WEBINTERFACEOFOF_", "_NIET_", "_XOF_", "_AANVULLING_", "_OF_", "_EN_", "_GELIJK_", "_KOMMA_", "_DIKKEDARM_", "_MODULUSD_", "_MODULUSF_", "_TOEVOEGEN_", "_AFTREKKEN_","_LINKER_SHIFT_","_RIGHT_SHIFT_");
  
  $replace_array = array("char", "float", "int", "if", "while", "main", "printf", "scanf", "return", "&", "/", "&&", "||", "!", "^", "~", "|","&", "=", ",", ";", "%d", "%f","+","-","<<",">>");
  //$replace_array1=array("_rightshxxt_","_linker_shxxt_");
 // $replace_array2=array(">>","<<");
   $c=str_replace($find_array,$replace_array,$code);
   $code=$c;
   $c=str_replace($replace_arry1,$replace_array2,$code);
   $code=$c;
   //echo '<textarea>'.$code.'</textarea>';
   return $code;
}


public function math_check($code1){
$code2="malloc #include # #define acos acosh asin asinh atan atan2 atanh cbrt ceil copysign cos cosh erf erfc exp exp2 expm1 fabs fdim floor fma fmax fmin fmod frexp hypot ilgob ldexp lgamma llrint llround log logb lrint lround nearbyint nextafter nexttoward pow reminder remquo rint round scalbln scalbn sin sinh sqrt tan tanh tgamma trunc memchr memcmp memcpy memmove memset strcmp strcat strncat strchr strncmp strcoll strcpy strncpy strerror strlen  strrchr strspn strstr strtok strxfrm atof atoi atol strtod strtol strtoul calloc free malloc relloc abort  abs qsort div labs ldiv rand srand mbtowc wcstombs wctomb mblen mbstowcs delay";   
     
$count1 = str_word_count($code1, 1);
$count2 = str_word_count($code2, 1);
$result=array_intersect($count1, $count2); 
$matched_word= count($result);
$err="xyz";
if($matched_word)
{
  
  $code1.=$err;
}
 //echo '<textarea>'.$code1.'</textarea>';
 return $code1;
 }
public function get_question_score($uname,$level,$ques){
   $m="m";
   $m.=$ques; 
   $sql="select $m from adaprimelevelmarks where level=$level and username='$uname'";
   $result=mysqli_query($this->conn,$sql);
   $row=mysqli_fetch_assoc($result);
   if($row[$m]==NULL)
     return 0;
   else
    return $row[$m];
}
public function checkexist($uname)
{
	$sql="select count(*) as c from adaventureregister where username='$uname'";
	$result=mysqli_query($this->conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row['c'])
		return true;
    else 
		return false;
}

public function register($username,$fullname,$gender)
{
	$sql="insert into adaventureregister(username,fullname,gender) values('".$username."','".$fullname."','".$gender."')";
	$result=mysqli_query($this->conn,$sql);
	if(mysqli_affected_rows($this->conn)==1)
	return true;
    else 
return false;
}
private function marks_obtained_crazy($weight){ 
    $setstandard=50000;
     $marks=($setstandard-$weight);
     if($marks<=0)
        return 0;
    $marks=($marks/500);
    return $marks;
}
private function weight_of_code($code) { 
        $codelen=strlen($code);
        $points=0;
        $escapeChars[0]=array('<','>');
        $escapeChars[1]=array('&lt;','&gt;');
        $nString=str_replace($escapeChars[0],$escapeChars[1],$code);
        for( $i = 0; $i < $codelen; $i++ ) {
                 $c=$code[$i];
				if (($c>='A' && $c<='Z') || ($c>='a' && $c<='z'))
					$points+=10;
				elseif ($c>='0' && $c <='9')
					$points+=100;
				elseif ($c=='+' || $c=='-' || $c=='*' || $c=='/')
					$points+=1000;
				elseif ($c=='<' || $c=='>')
					$points+=50;
				elseif($c=='~' || $c== '^' || $c=='|' || $c=='&')
					$points+=20;					
				elseif ($c==':' || $c=='?'|| $c=='%' || $c=='$' || $c=='_' || $c=='@' || $c=='!')
					$points+=10;
				elseif ($c=='=')
					$points+=5;
				else
					$points+=0;
			}  
            $count=substr_count($code,"switch");
            $points+=($count*440);
            $count=substr_count($code,"case");
            $points+=($count*60);
            $count=substr_count($code,"while");
            $points+=($count*2950);
            $count=substr_count($code,"for");
            $points+=($count*4970);
            $count=substr_count($code,"goto");
            $points+=($count*60);
            $points-=230;
			return $points;
		
}	
private function Marks_obtained($length){
    $setstandard=10000;
    $marks=($setstandard-$length);
    if($marks<=0)
        return 0;
    $marks=($marks/100);     
    return $marks;
}
private function code_golf_len($code) {
  $code_length = strlen($code) - substr_count($code, ' ');
  $code_length-=17;
   return  $code_length;  
}
 public function validpbcode($accesscode)
{
	$accesscode=mysqli_real_escape_string($this->conn, $accesscode);
	$sql = "select count(*) as c from adaprimebonuspenalty where accesscode='$accesscode'";
	$result = mysqli_query($this->conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row['c']==1)
		return true;
	else
		 return false;
}
public function check_pb($uname,$accesscode , $gender)	{
	$uname=mysqli_real_escape_string($this->conn, $uname);
	$accesscode=mysqli_real_escape_string($this->conn, $accesscode);
	$gender=mysqli_real_escape_string($this->conn, $gender);
	$gen="gender";
 	$type="type";
	$sql = "select count(*) as c from adaprimebonuspenalty where accesscode='$accesscode'";
	$result = mysqli_query($this->conn,$sql);
	$row=mysqli_fetch_assoc($result);
	
	$sql1 = "select count(*) as d from adaprimextramarks where accesscode='$accesscode' and username='$uname'";
	$result1 = mysqli_query($this->conn,$sql1);
	$row1=mysqli_fetch_assoc($result1);
	
	$sql2 = "select * from adaprimebonuspenalty where accesscode='$accesscode' ";
	$result2 = mysqli_query($this->conn,$sql2);
	$row2= mysqli_fetch_assoc($result2);
	if($row['c']==1&&$row1['d']==0)
	{
		if($row2[$type]=='b')
		{
			$ad=100;
			//echo $ad;
			//updtae score of both girl and boy;
			$sql1="select `totalscore` from adaprimequestionsolved where `username`='$uname'";
			$result=mysqli_query($this->conn,$sql1);
			$row= mysqli_fetch_assoc($result);
			$t=$row['totalscore'];
			if($t<=500)
			{
				$ad=($t*0.1);
				//echo "bonus added";
				$t=$t+$ad;
			}
			else if($t<=750)
			{
				$ad=($t*0.09);
				//echo "bonus added";
				$t=$t+$ad;
			}
			else if($t<=1000)
			{
				$ad=($t*0.075);
				//echo "bonus added";
				$t=$t+$ad;
			}
			else if($t<=1700)
			{
				$ad=(int)($t*0.06);
				//echo "bonus added";
				$t=$t+$ad;
			}
			else
			{
				$ad=($t*0.05);
				//echo "bonus added";
				$t=$t+$ad;
			}
			$sql="insert into adaprimextramarks(username,accesscode,score) values ('".$uname."' , '".$accesscode."','".$ad."') ";
			$result=mysqli_query($this->conn,$sql);
			//echo $t;
			$sql1="update  adaprimequestionsolved set `totalscore`='".$t."' where `username`='".$uname."'";
			$result=mysqli_query($this->conn,$sql1);
			return 'b';
		}
		else if($row2[$gen]!=$gender && $row2[$type]=='p')
		{
			$ad=100;
			$sql1="select `totalscore` from adaprimequestionsolved where `username`='$uname'";
			$result=mysqli_query($this->conn,$sql1);
			$row= mysqli_fetch_assoc($result);
			$t=$row['totalscore'];
			if($t<=500)
			{
				$ad=($t*0.1);
				$ad=-1*$ad;
				$t=$t+$ad;
			}
			else if($t<=750)
			{
				$ad=($t*0.09);
				$ad=-1*$ad;
				$t=$t+$ad;
			}
			else if($t<=1000)
			{
				$ad=($t*0.075);
				$ad=-1*$ad;
				$t=$t+$ad;
			}
			else if($t<=1700)
			{
				$ad=($t*0.06);
				$ad=-1*$ad;
				$t=$t+$ad;
			}
			else
			{
				$ad=($t*0.05);
				$ad=-1*$ad;
				$t=$t+$ad;
			}
			$sql="insert into adaprimextramarks(username,accesscode,score) values ('".$uname."' , '".$accesscode."','".$ad."') ";
			$result=mysqli_query($this->conn,$sql);
			$sql1="update  adaprimequestionsolved set `totalscore`='".$t."' where `username`='".$uname."'";
			$result=mysqli_query($this->conn,$sql1);
			return 'p';

		}
		return 'i';
    }
       if(($row2[$gen]==$gender && $row2[$type]=='p' )|| $row2[$type]=='b' )
      {
        return 't';  //code already used;
      } 
		else
			return 'i';
}
public function save_program($uname,$level,$ques,$code)
{
	$sql="select count(*) as c from adaprimeusersolution where username='$uname' and level=$level and question=$ques ";
	$result=mysqli_query($this->conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row['c']==1)
	{
		$sql="update  adaprimefinalsolution set `code`='".$code."' where `username`='".$uname."' and `level`='".$level."' and `question`='".$ques."' ";
		$result=mysqli_query($this->conn,$sql);
	}
	else
	{
	  $sql="insert into adaprimeusersolution(username,level,question,code) values('".$uname."','".$level."','".$ques."','".$code."')";
	  $result=mysqli_query($this->conn,$sql);
	  $sql="insert into adaprimefinalsolution(username,level,question,code) values('".$uname."','".$level."','".$ques."','".$code."')";
	  $result=mysqli_query($this->conn,$sql);
	}
}
public function valid_access_code($accesscode)
{
	    $accesscode=mysqli_real_escape_string($this->conn, $accesscode);
	    $sql="select count(*) as c from adaprimeaccesscode where `accesscode`= '$accesscode'";
		$result = mysqli_query($this->conn,$sql);
		$row=mysqli_fetch_assoc($result);
		if($row['c']==1)
			return True;
		else
			return False;
}
public function question_access_code($accesscode)
{
	    $accesscode=mysqli_real_escape_string($this->conn, $accesscode);
		$sql="select questionnumber from adaprimeaccesscode where `accesscode`= '$accesscode'";
		$result = mysqli_query($this->conn,$sql);
		$row=mysqli_fetch_assoc($result);
		return $row['questionnumber'];
}	
public function level_access_code($accesscode)
{
	    $accesscode=mysqli_real_escape_string($this->conn, $accesscode);
		$sql="select level from adaprimeaccesscode where `accesscode`= '$accesscode'";
		$result = mysqli_query($this->conn,$sql);
		$row=mysqli_fetch_assoc($result);
		return $row['level'];
}
public function level_increase($uname,$level)
{
	$flag = 0;
	$count_adaprimelevelmarks=0;
	$count_adaprimemaxscore=0;
	$m_adaprimelevelmarks="m";
	$max_adaprimemaxscore="max";
	
	$sql="select max(level) as l from adaprimelevelmarks where `username`='$uname'";
	$result=mysqli_query($this->conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$count_level=$row['l'];
	//echo $row['l'];
	
	$sql="select * from adaprimelevelmarks where `username`='$uname' and `level`=$level";
	$result=mysqli_query($this->conn,$sql);
	$row=mysqli_fetch_assoc($result);
	
	$sql1="select * from adaprimemaxscore where `level`=$level";
	$result1=mysqli_query($this->conn,$sql1);
	$row1=mysqli_fetch_assoc($result1);
	$count_adaprimemaxscore=$row1['minques'];
	
	for($i=1;$i<=10;$i++)
	{
		$m_adaprimelevelmarks.=$i;
		if($row[$m_adaprimelevelmarks]!=NULL)
			$count_adaprimelevelmarks++;
		$m_adaprimelevelmarks="m";
	}
	if($count_adaprimelevelmarks==$count_adaprimemaxscore)
	{
//		echo "equal";
		$count_level++;
		$flag = 1;
	}
    
	$sql="select count(*) as c from adaprimelevelnumber where `username`='$uname'";
    $result=mysqli_query($this->conn,$sql);
    $row=mysqli_fetch_assoc($result);	
	if($row['c']>0)
	{
		$sql="update adaprimelevelnumber set `level`=$count_level where username='$uname'";
		$result=mysqli_query($this->conn,$sql);
//		return $count_level;
	}
	else
	{
		$sql="insert into adaprimelevelnumber values ('".$uname."',1)";
		$result=mysqli_query($this->conn,$sql);
//		return $count_level;
	}
	if($flag)
		return true;
	else
		return false;
}
private function check_question($uname,$level,$q)
{
	//echo $q;
	$que="m";
	$que.=$q;
	//echo $que;
	$sql="select * from adaprimelevelmarks where `username`='$uname' and `level`=$level";
	$result=mysqli_query($this->conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row[$que]!=NULL)
		return True;
	else 
		return False;
}	
public function check_level($uname)
{
		$sql="select level from adaprimelevelnumber where `username`='$uname'";
		$result=mysqli_query($this->conn,$sql);
		$row=mysqli_fetch_assoc($result);		
		if($row['level']==NULL)
			return 1;
		else
			return $row['level'];
      
}
public function submission_check($uname,$level,$ques)
{
	if($level==2)
		return True;
	$m="m";
	$m.=$ques;
	$sql="select * from adaprimelevelmarks where `username`='$uname' and `level`=$level";
	$result=mysqli_query($this->conn,$sql);
	$row=mysqli_fetch_assoc($result);
	if($row[$m]!=NULL)
	    return False;
	else
		return True;
}
private function check_count($uname , $level)
{
	$count=0;
	$sql="select * from adaprimelevelmarks where username='$uname' and level=$level";
    $result=mysqli_query($this->conn,$sql);
    $row=mysqli_fetch_assoc($result);
	for($i=1;$i<=10;$i++)
	{
		$m="m";
		$m .=$i;
		if($row[$m]==NULL)
			$count++;
	}
	if($count==10)
		return False;
	else
		return True;
}
private function check_count1($uname , $level)
{
	$count=0;
	$lev="level";
	$lev .=1;
	$sql="select * from adaprimequestionsolved where username='$uname'";
    $result=mysqli_query($this->conn,$sql);
    $row=mysqli_fetch_assoc($result);
		$m="level";
		$m .=1;
		if($row[$m]==NULL)
			$count++;
	if($count==1)
	{
	  return False;
	}
	else
		return True;
}
public function total_score($uname,$level=1)
{
	/*$sum=0;
	$m="m";
	for($i=1;$i<=$level;$i++)
	{ 
		$lev=$i;
		$sql="select * from adaprimelevelmarks where username='$uname' and level=$lev";
    	$result=mysqli_query($this->conn,$sql);
    	$row=mysqli_fetch_assoc($result);
		for($j=1;$j<=10;$j++)
		{
		   $m .=$j;
		   if($row[$m]!=NULL)
		   {
			   $sum=$sum+$row[$m];
		   }
		   $m="m";
		}
		$lev="level";
		$m="m";
	}
	return $sum;*/
    $sql="select count(*) as c from adaprimequestionsolved where `username`='$uname'";
    $result=mysqli_query($this->conn,$sql);
    $row=mysqli_fetch_assoc($result);	
	if($row['c']>0)
     {
      $sql1="select `totalscore` from adaprimequestionsolved where `username`='$uname'";
			$result=mysqli_query($this->conn,$sql1);
			$row= mysqli_fetch_assoc($result);
			$t=$row['totalscore'];
      return $t;
     }
	return 0;
}
public function count_question($level)
{
	$count=0;
	$max="m";
	$sql="select * from adaprimelevelmarks where level=$level";
	$result=mysqli_query($this->conn,$sql);
	$row=mysqli_fetch_assoc($result);
	for($i=1;$i<11;$i++)
	{
		$max .= $i;	
		if($row[$max]!=NULL)
			$count++;
		$max="m";
	}
	return $count;
}	
private function fetch_score($level,$ques)
{
	$max="max";
    $max .= $ques;
	$sql="select $max from adaprimemaxscore	 where level=$level ";
	$result=mysqli_query($this->conn,$sql);
    $row=mysqli_fetch_assoc($result);
    return $row[$max];		
}
public function update_score($uname,$level,$ques,$code)
  {  
	  //$this=new Database_class("localhost", "root", "pritam@123", "gourav1");
	  if($level==2)
	  { 
         //For CodeGolf
         $totalscore;
         $flag=0;
		 $lev="level";
		 $lev .=$level;
		 $max="m";
		 $max .=$ques;
         $len=$this->code_golf_len($code);
		 $marks=$this->Marks_obtained($len);
		 //echo $marks;
		 if($this->check_question($uname,$level,$ques)){
			  //  echo "if part";
				$sql="select * from adaprimelevelmarks where level=$level and username='$uname'";
				$result=mysqli_query($this->conn,$sql);
				$row=mysqli_fetch_assoc($result);
				if($row[$max]<$marks){
					
					$totalscore=$marks-$row[$max]  + $this->total_score($uname,$level);
				}
				else{
					$totalscore=$this->total_score($uname,$level);
				}
		 }
		 else{
			// echo "else part";
			 $totalscore=$marks  + $this->total_score($uname,$level);
		 }
		//echo $totalscore;		 
			 $sql="select $lev from adaprimequestionsolved where `username`='$uname'";
			 $result=mysqli_query($this->conn,$sql);
			 $row=mysqli_fetch_assoc($result);
			 $level_val=$row[$lev];
			 if($level_val==NULL)
			  $level_val=1;
			 else if(!($this->check_question($uname,$level,$ques)))
			  $level_val++;     
			 $sql="select * from adaprimequestionsolved where level=$lev";
			 $result=mysqli_query($this->conn,$sql);
			 $sql1="update  adaprimequestionsolved set `".$lev."` = '".$level_val."' , `totalscore`='".$totalscore."' where `username`='".$uname."'";
			 $result=mysqli_query($this->conn,$sql1);	  
		  if(!($this->check_count($uname,$level)))
			{ 
				$sql1="insert into adaprimelevelmarks(`username`, `level`,`".$max."`) values ('".$uname."' , '".$level."' , '".$marks."')";
				$result=mysqli_query($this->conn,$sql1);
			}
			else
			{
				$sql="select * from adaprimelevelmarks where level=$level and username='$uname'";
				$result=mysqli_query($this->conn,$sql);
				$row=mysqli_fetch_assoc($result);
				//echo $row[$max];
                if($row[$max]<$marks)
                   $flag=1;					
				if($flag){
				 $sql1="update  adaprimelevelmarks set `".$max."` = '".$marks."' where `username`='".$uname."' and `level`='".$level."'";
				 $result=mysqli_query($this->conn,$sql1);
				}
			}	 
	  }
	  else if($level==4){
		  // crazy programming
		  
         $totalscore;
         $flag=0;
		 $lev="level";
		 $lev .=$level;
		 $max="m";
		 $max .=$ques;
         $len=$this->weight_of_code($code);
		 $marks=$this->marks_obtained_crazy($len);
		 echo $marks;
		 if($this->check_question($uname,$level,$ques)){
			    //echo "if part";
				$sql="select * from adaprimelevelmarks where level=$level and username='$uname'";
				$result=mysqli_query($this->conn,$sql);
				$row=mysqli_fetch_assoc($result);
				if($row[$max]<$marks){
					
					$totalscore=$marks-$row[$max]  + $this->total_score($uname,$level);
				}
				else{
					$totalscore=$this->total_score($uname,$level);
				}
		 }
		 else{
			 //echo "else part";
			 $totalscore=$marks  + $this->total_score($uname,$level);
		 }
		//echo $totalscore;		 
			 $sql="select $lev from adaprimequestionsolved where `username`='$uname'";
			 $result=mysqli_query($this->conn,$sql);
			 $row=mysqli_fetch_assoc($result);
			 $level_val=$row[$lev];
			 if($level_val==NULL)
			  $level_val=1;
			 else if(!($this->check_question($uname,$level,$ques)))
			  $level_val++;     
			 $sql="select * from adaprimequestionsolved where level=$lev";
			 $result=mysqli_query($this->conn,$sql);
			 $sql1="update  adaprimequestionsolved set `".$lev."` = '".$level_val."' , `totalscore`='".$totalscore."' where `username`='".$uname."'";
			 $result=mysqli_query($this->conn,$sql1);	  
		  if(!($this->check_count($uname,$level)))
			{ 
				$sql1="insert into adaprimelevelmarks(`username`, `level`,`".$max."`) values ('".$uname."' , '".$level."' , '".$marks."')";
				$result=mysqli_query($this->conn,$sql1);
			}
			else
			{
				$sql="select * from adaprimelevelmarks where level=$level and username='$uname'";
				$result=mysqli_query($this->conn,$sql);
				$row=mysqli_fetch_assoc($result);
				//echo $row[$max];
                if($row[$max]<$marks)
                   $flag=1;					
				if($flag){
				 $sql1="update  adaprimelevelmarks set `".$max."` = '".$marks."' where `username`='".$uname."' and `level`='".$level."'";
				 $result=mysqli_query($this->conn,$sql1);
				}
			}	  
	  }
	  else
	  {
		  echo "level1";
		  $lev="level";
		  $lev .=$level;
		  $max="m";
		  $max .=$ques;
			$marks=$this->fetch_score($level,$ques);
			if(!$this->check_count1($uname,$level))
			{
				 //echo "1 if me ghus gaya";
				$totalscore=$this->total_score($uname,$level);
				$totalscore=$totalscore+$marks;
				$sql="insert into adaprimequestionsolved(`username` , `totalscore`,`".$lev."`) values ('".$uname."' , '".$totalscore."' , 1)";
				$result=mysqli_query($this->conn,$sql);
			}
			else
			{
				if(!($this->check_question($uname,$level,$ques)))
				{
					$totalscore=$this->total_score($uname,$level);
					$totalscore=$totalscore+$marks;
					$sql="select $lev from adaprimequestionsolved where `username`='$uname'";
					$result=mysqli_query($this->conn,$sql);
					$row=mysqli_fetch_assoc($result);
					$level_val=$row[$lev];
					echo $level_val;
					if($level_val==NULL){
						//echo "cnvkjvghfhjghfhn  ";
					    $level_val=1;
						//echo $level_val;
						//echo " pranay";
				}
				    else
					 $level_val++;
					$sql="select * from adaprimequestionsolved where level=$lev";
					$result=mysqli_query($this->conn,$sql);
					$sql1="update  adaprimequestionsolved set `".$lev."` = '".$level_val."' , `totalscore`='".$totalscore."' where `username`='".$uname."'";
					$result=mysqli_query($this->conn,$sql1);
					//echo $sql1;
				}
			}
			if(!($this->check_count($uname,$level)))
			{ 
		      //  echo "2 if me ghus gaya";
				$sql1="insert into adaprimelevelmarks(`username`, `level`,`".$max."`) values ('".$uname."' , '".$level."' , '".$marks."')";
				$result=mysqli_query($this->conn,$sql1);
			}
			else
			{
				//echo "else me ghus gaya";
				$sql1="update  adaprimelevelmarks set `".$max."` = '".$marks."' where `username`='".$uname."' and `level`='".$level."'";
				$result=mysqli_query($this->conn,$sql1);
			}
			//$this->level_increase($uname,$level);
	  
        }
	}
	
	
	public function getLevel($username){
   
       $sql="select `level` from `adaprimelevelnumber` WHERE `username` = '".$username."'";
       $result = mysqli_query($this->conn, $sql);
       $row= mysqli_fetch_assoc($result);
			  $l=$row['level'];
        return $l;
       
   }
   
   public function getRank($username){
       //$sql="select * from `adaprimequestionsolved` order by `totalscore` desc";
       $sql = "select `a`.`username` `username`, `a`.`totalscore` `totalscore`, `a`.`level1` `level1`, `a`.`level2` `level2`, `a`.`level3` `level3`, `a`.`level4` `level4`, `a`.`level5` `level5`, `a`.`level6` `level6`, `a`.`level7` `level7`, `a`.`level8` `level8`, `a`.`level9` `level9`, `a`.`level10` `level10` from `adaprimequestionsolved` `a`, `adaprimeusersolution` `b` where `a`.`username` = `b`.`username` group by `a`.`username` order by `a`.`totalscore` desc, `b`.`tstamp` asc";
       
       $result = mysqli_query($this->conn, $sql);
       $flag=0;
       $value = [];
        $i = 0;
        while($row = mysqli_fetch_array($result)){
            $i++;
            if($row['username']==$username)
              {
                 $flag=1;
                 break;
              }
        }
        if($flag)
         return $i;
        else
         return 0;
   }
   
    
    public function getRank_codegolf($username){
       $sql="select `username`, `level`, TRUNCATE(IFNULL(m1,0), 2) `m1`, TRUNCATE(IFNULL(m2,0), 2) `m2`, TRUNCATE(IFNULL(m3,0), 2) `m3`, TRUNCATE(IFNULL(m4,0), 2) `m4`,  TRUNCATE(IFNULL(m1,0)+IFNULL(m2,0)+IFNULL(m3,0)+IFNULL(m4,0), 2) `sum` from adaprimelevelmarks where level=2 order by `sum` desc";
       $result = mysqli_query($this->conn, $sql);
       
        $i = 0;
        while($row = mysqli_fetch_array($result)){
            $i++;
            if($row['username']==$username)
              break;
        }
        return $i;
   }
   
    function marks_codegolf($username){
        $sql="select TRUNCATE(IFNULL(m1,0), 2) `m1`, TRUNCATE(IFNULL(m2,0), 2) `m2`, TRUNCATE(IFNULL(m3,0), 2) `m3`, TRUNCATE(IFNULL(m4,0), 2) `m4`, TRUNCATE(IFNULL(m1,0)+IFNULL(m2,0)+IFNULL(m3,0)+IFNULL(m4,0), 2) `sum` from adaprimelevelmarks where level=2 and `username` ='$username'";
        //echo $sql;
        $result=mysqli_query($this->conn,$sql);
        $row=mysqli_fetch_array($result);
        $res=[];
        $ques="m";
        $res['totalscore']=$row['sum'];
        $res['level']=2;
        
        for($i=1;$i<5;$i++){
            $ques.=$i;
            $res[$ques]=$row[$ques];
            $ques="m";
        }
        
        /*$res['totalscore']=40;
        $res['m1'] = 10;
        $res['m2'] = 10;
        $res['m3'] = 10;
        $res['m4'] = 10;
        */
        return $res;
    }
    
   /*
   
   public function getRank_crazy($username){
       $sql="select *, IFNULL(m1,0)+IFNULL(m2,0)+IFNULL(m3,0)+IFNULL(m4,0) `sum` from adaprimelevelmarks where level=4 order by `sum` desc";
       $result = mysqli_query($this->conn, $sql);
       
       $value = [];
        $i = 0;
        while($row = mysqli_fetch_array($result)){
            $i++;
            if($row['username']==$username)
              break;
        }
        return $i;
   }
   
	
	function marks_crazy($username){
	 $sql="select *, IFNULL(m1,0)+IFNULL(m2,0)+IFNULL(m3,0)+IFNULL(m4,0) `sum` from adaprimelevelmarks where level=4 and username ='$username'";
	 $result=mysqli_query($this->conn,$sql);
	 $row=mysqli_fetch_array($result);
	 $res=[];
	 $ques="m";
	 $res['totalscore']=$row['sum'];
	 $res['level']=2;
	   for($i=1;$i<5;$i++){
		$ques.=$i;
		if($row[$ques])
		 $res[$ques]=$row[$ques];
	    else
		 $res[$ques]=0;
	    $ques="m";
		}
		return $res;
	} */
   
   public function getLeaderboard($len = 10){
        //$sql = "select * from `adaprimequestionsolved` order by `totalscore` desc limit 0, ".$len;
        $sql = "select `a`.`username` `username`, `a`.`totalscore` `totalscore`, `a`.`level1` `level1`, `a`.`level2` `level2`, `a`.`level3` `level3`, `a`.`level4` `level4`, `a`.`level5` `level5`, `a`.`level6` `level6`, `a`.`level7` `level7`, `a`.`level8` `level8`, `a`.`level9` `level9`, `a`.`level10` `level10` from `adaprimequestionsolved` `a`, `adaprimeusersolution` `b` where `a`.`username` = `b`.`username` group by `a`.`username` order by `a`.`totalscore` desc, `b`.`tstamp` asc limit 0, ".$len;
        //echo $sql;
        $result = mysqli_query($this->conn, $sql);
        
        $value = [];
        $i = 0;
        while($row = mysqli_fetch_array($result)){
        //for($i = 0; $i < $len; $i++){
            $i++;
            $val = [];
            $val['username'] = $row['username'];
            $val['totalscore'] = $row['totalscore'];
            $val['level'] = $this->getLevel($row['username']);
            
            $value[] = $val;
        }
        for( ; $i < $len; $i++){
            $val = [];
            $val['username'] = '';
            $val['totalscore'] = '';
            $val['level'] = '';
            
            $value[] = $val;
        }
        return $value;
    }
	
    
    public function gameEnded(){
        $sql = "SELECT `status` FROM `adaprime_switch` LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_array($result);
        if($row['status'] == 2)
            return true;
        return false;
    }
    
    public function gameLive(){
        $sql = "SELECT `status` FROM `adaprime_switch` LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_array($result);
        if($row['status'] == 1)
            return true;
        return false;
    }
	function glb()
	{
		$sql="select `username`, `level`, TRUNCATE(IFNULL(m1,0), 2) `m1`, TRUNCATE(IFNULL(m2,0), 2) `m2`, TRUNCATE(IFNULL(m3,0), 2) `m3`, TRUNCATE(IFNULL(m4,0), 2) `m4`, TRUNCATE(IFNULL(m1,0)+IFNULL(m2,0)+IFNULL(m3,0)+IFNULL(m4,0), 2) `sum` from adaprimelevelmarks where level=2 order by `sum` desc";
		$result=mysqli_query($this->conn,$sql);
		//$row=mysqli_fetch_assoc($result);
		$res=[];
		$count=0;
    $ques="m";
		while($row=mysqli_fetch_assoc($result)){
		    $val=[];
        $sum=0;
        $val['username']=$row['username'];
        $val['level']=$row['level'];
        $val['m1']=$row['m1'];
			  $val['m2']=$row['m2'];
			  $val['m3']=$row['m3'];
  			$val['m4']=$row['m4'];
        /*
        for($i=1;$i<5;$i++){
		        $ques.=$i;
		        if($row[$ques])
		           $val[$ques]=$row[$ques];
	          else
		           $val[$ques]=0;
	          $ques="m";
		    }*/
		    $val['totalscore']=$row['sum'];
		    $res[]=$val;
		    $count++;
		}
		for( ; $count < 10; $count++){
            $val = [];
            $val['username']='-';
			$val['level']='-';
			$val['m1']='-';
			$val['m2']='-';
			$val['m3']='-';
			$val['m4']='-';
			$val['totalscore']='-';
            $res[] = $val;
          }
		return $res;
	}
	/*function leaderboard_crazy()
	{
		$sql="select *, IFNULL(m1,0)+IFNULL(m2,0)+IFNULL(m3,0)+IFNULL(m4,0) `sum` from adaprimelevelmarks where level=4 order by `sum` desc";
   
		$result=mysqli_query($this->conn,$sql);
		//$row=mysqli_fetch_assoc($result);
		$res=[];
		$count=0;
	    $ques="m";
		while($row=mysqli_fetch_assoc($result)){
		$val=[];
		$sum=0;
        $val['username']=$row['username'];
        $val['level']=$row['level'];
        for($i=1;$i<5;$i++){
		$ques.=$i;
		if($row[$ques])
		 $val[$ques]=$row[$ques];
	    else
		 $val[$ques]=0;
	    $ques="m";
		}
		$val['totalscore']=$row['sum'];
		$res[]=$val;
		$count++;
		}
		for( ; $count < 10; $count++){
            $val = [];
            $val['username']='-';
			$val['level']='-';
			$val['m1']='-';
			$val['m2']='-';
			$val['m3']='-';
			$val['m4']='-';
			$val['totalscore']='-';
            $res[] = $val;
          }
		return $res;
	}*/
    
    public function getRank_crazy($username){
       $sql="select `username`, `level`, TRUNCATE(IFNULL(m1,0), 2) `m1`, TRUNCATE(IFNULL(m2,0), 2) `m2`, TRUNCATE(IFNULL(m3,0), 2) `m3`, TRUNCATE(IFNULL(m4,0), 2) `m4`,TRUNCATE(IFNULL(m5,0), 2) `m5`,  TRUNCATE(IFNULL(m1,0)+IFNULL(m2,0)+IFNULL(m3,0)+IFNULL(m4,0)+IFNULL(m5,0), 2) `sum` from adaprimelevelmarks where level=4 order by `sum` desc";
       $result = mysqli_query($this->conn, $sql);
       
        $i = 0;
        while($row = mysqli_fetch_array($result)){
            $i++;
            if($row['username']==$username)
              break;
        }
        return $i;
   }
   
   
   
    function marks_crazy(){
    
      $sql="select TRUNCATE(IFNULL(m1,0), 2) `m1`, TRUNCATE(IFNULL(m2,0), 2) `m2`, TRUNCATE(IFNULL(m3,0), 2) `m3`, TRUNCATE(IFNULL(m4,0), 2) `m4`,TRUNCATE(IFNULL(m5,0), 2) `m5`, TRUNCATE(IFNULL(m1,0)+IFNULL(m2,0)+IFNULL(m3,0)+IFNULL(m4,0)+IFNULL(m5,0), 2) `sum` from adaprimelevelmarks where level=4 and `username` ='$username'";
        //echo $sql;
        $result=mysqli_query($this->conn,$sql);
        $row=mysqli_fetch_array($result);
        $res=[];
        $ques="m";
        $res['totalscore']=$row['sum'];
        $res['level']=2;
        
        for($i=1;$i<6;$i++){
            $ques.=$i;
            $res[$ques]=$row[$ques];
            $ques="m";
        }
        
        /*$res['totalscore']=40;
        $res['m1'] = 10;
        $res['m2'] = 10;
        $res['m3'] = 10;
        $res['m4'] = 10;
        */
        return $res;
    
    }
    
    	function glb_crazy()
	{
			$sql="select `username`, `level`, TRUNCATE(IFNULL(m1,0), 2) `m1`, TRUNCATE(IFNULL(m2,0), 2) `m2`, TRUNCATE(IFNULL(m3,0), 2) `m3`, TRUNCATE(IFNULL(m4,0), 2) `m4`,TRUNCATE(IFNULL(m5,0), 2) `m5`, TRUNCATE(IFNULL(m1,0)+IFNULL(m2,0)+IFNULL(m3,0)+IFNULL(m4,0)+IFNULL(m5,0),2) `sum` from adaprimelevelmarks where level=4 order by `sum` desc";
		$result=mysqli_query($this->conn,$sql);
		//$row=mysqli_fetch_assoc($result);
		$res=[];
		$count=0;
    $ques="m";
		while($row=mysqli_fetch_assoc($result)){
		    $val=[];
        $sum=0;
        $val['username']=$row['username'];
        $val['level']=$row['level'];
        $val['m1']=$row['m1'];
			  $val['m2']=$row['m2'];
			  $val['m3']=$row['m3'];
  			$val['m4']=$row['m4'];
        $val['m5']=$row['m5'];
        /*
        for($i=1;$i<5;$i++){
		        $ques.=$i;
		        if($row[$ques])
		           $val[$ques]=$row[$ques];
	          else
		           $val[$ques]=0;
	          $ques="m";
		    }*/
		    $val['totalscore']=$row['sum'];
		    $res[]=$val;
		    $count++;
		}
		for( ; $count < 10; $count++){
            $val = [];
            $val['username']='-';
			$val['level']='-';
			$val['m1']='-';
			$val['m2']='-';
			$val['m3']='-';
			$val['m4']='-';
      $val['m5']='-';
			$val['totalscore']='-';
            $res[] = $val;
          }
		return $res;
  }

    
    
}
$Database_P=new Database_P_class("localhost", "root", "pritam@123", "gourav1");



$gameLive = $Database_P->gameLive();
$gameEnded = $Database_P->gameEnded();

if(!$gameLive){
    if(!$gameEnded){
        header("location: will_start.php");
    }
    else{
        header("location: gamefinished.php");
    }	
}
 //$Database->marks_codegolf("gb09");
 //$Database->mixnmatchcode("abort div abs qsort _CHAR_ _CHAR_ _CHAR__CHAR_ srand rand srand rand #include");
//$Database->save_program("abhinavpagal",1,2,"hu me pag");
//$uname="pranay";
//$level=4;
//$ques=3;
//$Database->get_question_score("gb09",2,2);
//$code="for switch case ? hu+=po jo-=lo lp*=hj for for for";
//$Database->update_score($uname,$level,$ques,$code);
//$Database->check_pb($uname,"loljmjm","f");
?>
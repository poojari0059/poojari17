<?php
include 'class/User_class.php';
if(!$User->isLoggedin()){
  echo "/// -LOGIN AGAIN TO CHECK THE OUTPUT-";
}
else{
  $ques=$_REQUEST['qno'];
  $level=$_REQUEST['level'];
  $uname=$_REQUEST['uname'];
  $rcinput_test=$_REQUEST["code"];
  $path = "rcupload/";
  $rcinput_file = $path.$uname."_lv_".$level."_qn_".$ques.".txt";
  $fp=fopen($rcinput_file,"w");
  fputs($fp, $rcinput_test);
  fclose($fp);
  //$rc_command=$path.'rc_lv_'.$level.'_qn_'.$ques.'.out < '.$rcinput_file.' > '.$path.'rcoutput_'.$uname.'.txt';
  //shell_exec($rc_command);
  //echo file_get_contents($path.'rcoutput_'.$uname.'.txt');
  $rc_command=$path.'rc_lv_'.$level.'_qn_'.$ques.'.out < '.$rcinput_file;
  $result = shell_exec($rc_command);
  echo $result;
  unlink($rcinput_file);
}
?>
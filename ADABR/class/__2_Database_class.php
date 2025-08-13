<?php

class Database_class{
    private $db;
    
    public function __construct($host, $username, $password, $db){
        $this->db = mysqli_connect($host, $username, $password, $db);
        
        if(!$this->db)
            echo "Database failure";
    }
    
    public function authenticate($username, $password){
        $username = mysqli_real_escape_string($this->db, $username);
        $password = mysqli_real_escape_string($this->db, $password);
        $sql = "SELECT count(*) `count` FROM `adabr_scoreboard` where `username` = '$username' and `password` = '$password'";
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        if($row['count'] == 1)
            return true;
        return false;
    }
    
    public function valid($username){
        $username = mysqli_real_escape_string($this->db, $username);
        $sql = "select count(*) `count` from `adabr_scoreboard` where `username` = '$username'";
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        
        if($row['count'] == 1)
            return true;
        else 
            return false;
    }
    
    public function updateUser($username, $password){
        $username = mysqli_real_escape_string($this->db, $username);
        $password = mysqli_real_escape_string($this->db, $password);
        if(! $this->valid($username)){
            $sql = "INSERT INTO `adabr_scoreboard`(`username`, `password`, `level`, `totalscore`) VALUES ('$username', '$password', '1', '0')";
            $result = mysqli_query($this->db, $sql);
            
            $sql = "INSERT INTO `adabr_details`(`username`) VALUES ('$username')";
            $result = mysqli_query($this->db, $sql);
        }
    }
    
    public function banUsername($username){
        $username = mysqli_real_escape_string($this->db, $username);
        if(! $this->isBanned($username)){
            $sql = "INSERT INTO `adabr_user_status`(`username`) VALUES( '$username' )";
            $result = mysqli_query($this->db, $sql);
        }
    }
    
    public function isBanned($username){
        $username = mysqli_real_escape_string($this->db, $username);
        $sql = "SELECT COUNT(*) `value` FROM `adabr_user_status` WHERE `username` = '$username'";
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        
        if($row['value'] == 1){
            return true;
        }
        return false;
    }
    
    public function getLevel($username){
        $username = mysqli_real_escape_string($this->db, $username);
        if($this->isBanned($username)){
            header('location: barred.php');
            return -1;
        }
        
        $sql = "select `level` from `adabr_scoreboard` where `username` = '$username'";
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        
        return $row['level'];
    }
    
    public function setLevel($username, $new_level){
        $username = mysqli_real_escape_string($this->db, $username);
        $sql = "update `adabr_scoreboard` set `level` = '".$new_level."' where `username` = '$username'";
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
        
        $sql = "update `adabr_scoreboard` set `levelchange` = now() where `username` = '$username'";
        //echo $sql."</br>";
        $result = mysqli_query($this->db, $sql);
    }
    
    public function updateLevel($username){
        $username = mysqli_real_escape_string($this->db, $username);
        $this->setLevel($username, 4);
    }
    
    public function delete_level4_data($username){
        $username = mysqli_real_escape_string($this->db, $username);
        $sql = "DELETE FROM `adabrlevel4_board` WHERE `username` = '$username'";
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
    }
    
    public function updateScore($username, $level){
        $username = mysqli_real_escape_string($this->db, $username);
        
        $score = 0;
        
        $sql = "select `lev".$level."` as `value` from `adabr_details` where `username` = '$username'";
        //echo $sql."</br>";
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        $score = $row['value'];
        
        // If not completed
        if($score == 0){
            //Here sequence is important
            
            $sql = "select `maxscore` from `adabr_maxscore` where `level` = '".$level."'";
            //echo $sql."</br>";
            $result = mysqli_query($this->db, $sql);
            $row = mysqli_fetch_array($result);
            $score = $row['maxscore'];
            
            $sql = "update `adabr_details` set `lev".$level."` = '".$score."' where `username` = '$username'";
            //echo $sql."</br>";
            $result = mysqli_query($this->db, $sql);
            
            $sql = "select `totalscore` from `adabr_scoreboard` where `username` = '$username'";
            //echo $sql."</br>";
            $result = mysqli_query($this->db, $sql);
            $row = mysqli_fetch_array($result);
            $score += $row['totalscore'];
            
            $sql = "update `adabr_scoreboard` set `totalscore` = '".$score."' where `username` = '$username'";
            //echo $sql."</br>";
            $result = mysqli_query($this->db, $sql);
            
            
        }
    }
    
    public function getLeaderboard($len){
        $len = mysqli_real_escape_string($this->db, $len);
        $sql = "select * from `adabr_scoreboard` order by `totalscore` desc, `levelchange` asc limit 0, $len";
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
        
        
        $value = [];
        $i = 0;
        while($row = mysqli_fetch_array($result)){
        //for($i = 0; $i < $len; $i++){
            $i++;
            $val = [];
            $val['username'] = $row['username'];
            $val['totalscore'] = $row['totalscore'];
            $val['level'] = $row['level'];
            
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
    
    public function getScore($username){
        $username = mysqli_real_escape_string($this->db, $username);
        $sql = "select * from `adabr_scoreboard` where `username` = '$username'";
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        //for($i = 0; $i < $len; $i++){
        $val = [];
        $val['username'] = $row['username'];
        $val['totalscore'] = $row['totalscore'];
        $val['level'] = $row['level'];
        
        return $val;
    }
    
    public function getRank($username){
        $username = mysqli_real_escape_string($this->db, $username);
        $sql = "select * from `adabr_scoreboard` order by `totalscore` desc";
        $result = mysqli_query($this->db, $sql);
        
        $value = [];
        $i = 0;
        while($row = mysqli_fetch_array($result)){
            $i++;
            if($row['username']==$username)
                break;
        }
        return $i;
    }
    
    // It sets/updates testcase
    public function adabr_level4_testcase($username, $val, $program_code = ''){
        $username = mysqli_real_escape_string($this->db, $username);
        $sql = "INSERT INTO `adabrlevel4_testcase` (`username`, `testcase`) VALUES ('$username', '".$val."')";
        //echo "<br/>".$sql;
        $result = mysqli_query($this->db, $sql);
        
        $id = mysqli_insert_id($this->db);
        //echo "Last inserted id : ".$id;
        
        if($program_code != ''){
            $sql = "INSERT INTO `adabrlevel4_program`(`id`, `username`, `program`) VALUES ( ".$id.", '$username', '".$program_code."') ";
            //echo $sql;
            $result = mysqli_query($this->db, $sql);
        }
        
        
        $sql = "SELECT COUNT(*) `value` FROM `adabrlevel4_board` WHERE `username` = '$username'";
        //echo "<br/>".$sql;
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        
        if($row['value'] == 1){
            $sql = "UPDATE `adabrlevel4_board` SET `testcase_id` = '".$id."' WHERE `username` = '$username'";
        }
        else{
            $sql = "INSERT INTO `adabrlevel4_board`(`username`, `testcase_id`) VALUE('$username', '".$id."')";
        }
        //echo "<br/>".$sql;
        $result = mysqli_query($this->db, $sql);
        
    }
    
    public function adabr_level4_board(){
        $sql = "SELECT `a`.`username` `username`, `b`.`testcase` `testcase`, ROUND(`c`.`totalscore`*0.1) `award` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b`, `adabr_scoreboard` `c` WHERE `a`.`testcase_id` = `b`.`id` AND `c`.`username` = `a`.`username`";
        //echo "<br/>".$sql;
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
    
    public function adabr_level4_board_except($username, $username_keyword = "%", $offset = 0, $len = 10){
        $username = mysqli_real_escape_string($this->db, $username);
        $username_keyword = mysqli_real_escape_string($this->db, $username_keyword);
        $offset = mysqli_real_escape_string($this->db, $offset);
        $len = mysqli_real_escape_string($this->db, $len);
        
        $sql = "SELECT `a`.`username` `username`, `b`.`testcase` `testcase`, ROUND(`c`.`totalscore`*0.1) `award` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b`, `adabr_scoreboard` `c` WHERE `a`.`testcase_id` = `b`.`id` AND `c`.`username` = `a`.`username` AND `c`.`username` != '$username' AND `c`.`username` LIKE '%".$username_keyword."%' LIMIT $offset, $len";
        
        if($username_keyword == '%'){
            $sql = "SELECT `a`.`username` `username`, `b`.`testcase` `testcase`, ROUND(`c`.`totalscore`*0.1) `award` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b`, `adabr_scoreboard` `c` WHERE `a`.`testcase_id` = `b`.`id` AND `c`.`username` = `a`.`username` AND `c`.`username` != '$username' AND `c`.`username` LIKE '%' LIMIT $offset, $len";
        }
        
        //echo "<br/>".$sql;
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
    
    public function adabr_level4_board_except_scoreless($username, $username_keyword = "%", $score = 0, $offset = 0, $len = 10, $last_attacker = ""){
        $score -= 300;
        
        //echo "LAST : ".$last_attacker;
        
        $username = mysqli_real_escape_string($this->db, $username);
        $username_keyword = mysqli_real_escape_string($this->db, $username_keyword);
        $offset = mysqli_real_escape_string($this->db, $offset);
        $len = mysqli_real_escape_string($this->db, $len);
        //$score = mysqli_real_escape_string($this->db, $score);
        
        
        if($last_attacker != ""){
        
        
                $sql = "( SELECT `a`.`username` `username`, `b`.`testcase` `testcase`, ROUND(`c`.`totalscore`*0.1) `award` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b`, `adabr_scoreboard` `c` WHERE `a`.`testcase_id` = `b`.`id` AND `c`.`username` = `a`.`username` AND `c`.`username` != '$username' AND `c`.`username` LIKE '%".$username_keyword."%' AND `c`.`totalscore` > $score AND `c`.`level`=5 ) UNION (
                
                SELECT `a`.`username` `username`, `b`.`testcase` `testcase`, ROUND(`c`.`totalscore`*0.1) `award` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b`, `adabr_scoreboard` `c` WHERE `a`.`testcase_id` = `b`.`id` AND `c`.`username` = `a`.`username` AND `c`.`username` = '$last_attacker'  AND `c`.`username` LIKE '%".$username_keyword."%' AND `c`.`level`=5
                
                 ) LIMIT $offset, $len";
                
                if($username_keyword == '%'){
                    $sql = "( SELECT `a`.`username` `username`, `b`.`testcase` `testcase`, ROUND(`c`.`totalscore`*0.1) `award` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b`, `adabr_scoreboard` `c` WHERE `a`.`testcase_id` = `b`.`id` AND `c`.`username` = `a`.`username` AND `c`.`username` != '$username' AND `c`.`username` LIKE '%' AND `c`.`totalscore` > $score AND `c`.`level`=5 ) UNION ( 
                    
                    SELECT `a`.`username` `username`, `b`.`testcase` `testcase`, ROUND(`c`.`totalscore`*0.1) `award` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b`, `adabr_scoreboard` `c` WHERE `a`.`testcase_id` = `b`.`id` AND `c`.`username` = `a`.`username` AND `c`.`username` = '$last_attacker' AND `c`.`level`=5
                    
                     ) LIMIT $offset, $len";
                    
                }
        
        }
        else{
        
        
                $sql = "( SELECT `a`.`username` `username`, `b`.`testcase` `testcase`, ROUND(`c`.`totalscore`*0.1) `award` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b`, `adabr_scoreboard` `c` WHERE `a`.`testcase_id` = `b`.`id` AND `c`.`username` = `a`.`username` AND `c`.`username` != '$username' AND `c`.`username` LIKE '%".$username_keyword."%' AND `c`.`totalscore` > $score AND `c`.`level`=5 ) LIMIT $offset, $len";
                
                if($username_keyword == '%'){
                    $sql = "( SELECT `a`.`username` `username`, `b`.`testcase` `testcase`, ROUND(`c`.`totalscore`*0.1) `award` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b`, `adabr_scoreboard` `c` WHERE `a`.`testcase_id` = `b`.`id` AND `c`.`username` = `a`.`username` AND `c`.`username` != '$username' AND `c`.`username` LIKE '%' AND `c`.`totalscore` > $score AND `c`.`level`=5 ) LIMIT $offset, $len";
                    
                }
        
        
        
        }
        
        
        //echo "<br/>".$sql;
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    public function adabr_level4_valid_challenge($target_username, $score, $last_attacker = ""){
        $score -= 300;
        
        
        if($target_username == $last_attacker && $last_attacker != "")
            return true;
        
        //echo "LAST : ".$last_attacker;
        
        $target_username = mysqli_real_escape_string($this->db, $target_username);
        
        $sql = "SELECT COUNT(*) `result` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b`, `adabr_scoreboard` `c` WHERE `a`.`testcase_id` = `b`.`id` AND `c`.`username` = `a`.`username` AND `c`.`username` = '$target_username' AND `c`.`totalscore` > $score AND `c`.`level`=5";
        //echo $sql;
        
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        if($row['result'] == 1){
            return true;
        }
        
        return false;
    }
    
    public function adabr_level4_detail($username){
        $username = mysqli_real_escape_string($this->db, $username);
        
        $sql = "SELECT `a`.`username` `username`, `b`.`testcase` `testcase`, ROUND(`c`.`totalscore`*0.1) `award` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b`, `adabr_scoreboard` `c` WHERE `a`.`testcase_id` = `b`.`id` AND `c`.`username` = `a`.`username` AND `c`.`username` = '$username'";
        //echo "<br/>".$sql;
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
    
    public function adabr_level4_showtestcase($username){
        $username = mysqli_real_escape_string($this->db, $username);
        
        $sql = "SELECT `b`.`testcase` `testcase` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b` WHERE `a`.`testcase_id` = `b`.`id` AND `a`.`username` = '$username'";
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
        
        $row = mysqli_fetch_array($result);
        $val = json_decode($row['testcase']);
        
        //for($i = 1; $i <= 300; $i++){
            //echo $val[$i - 1]."\n";
        //}
        
        return $val;
    }
    
    public function adabr_cut_10p_score($username){
        $username = mysqli_real_escape_string($this->db, $username);
        
        $value = 0;
        if($this->valid($username)){
            $sql = "SELECT `totalscore` * 0.1 `score` FROM `adabr_scoreboard` where `username` = '$username'";
            //echo $sql."<br/>";
            $result = mysqli_query($this->db, $sql);
            $row = mysqli_fetch_array($result);
            $value = $row['score'];
            
            $sql = "UPDATE `adabr_scoreboard` SET `totalscore` = `totalscore` - ".$value." WHERE `username` = '$username'";
            //echo $sql."<br/>";
            $result = mysqli_query($this->db, $sql);
        }
        else{
            //echo "No user exists with such testcase. Contact administrator if you see this message.";
        }
        
        return $value;
    }
    
    public function adabr_add_score($username, $val){
        $username = mysqli_real_escape_string($this->db, $username);
        
        if($this->valid($username)){
            $sql = "UPDATE `adabr_scoreboard` SET `totalscore` = `totalscore` + ".$val." WHERE `username` = '$username'";
            //echo $sql."<br/>";
            $result = mysqli_query($this->db, $sql);
        }
    }
    
    public function adabr_set_transaction($from, $to, $amount, $testcase_id){
        $from = mysqli_real_escape_string($this->db, $from);
        $to = mysqli_real_escape_string($this->db, $to);
        
        $sql = "INSERT INTO `adabrlevel4_transaction` (`from`, `to`, `amount`, `testcase`) VALUES ('$from', '$to', '".$amount."', '".$testcase_id."')";
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
    }
    
    public function getTestcaseID($username){
        $username = mysqli_real_escape_string($this->db, $username);
        
        if($this->getLevel($username) == 5){
            $sql = "SELECT `testcase_id` FROM `adabrlevel4_board` WHERE `username` = '$username'";
            $result = mysqli_query($this->db, $sql);
            $row = mysqli_fetch_array($result);
            return $row['testcase_id'];
            
        }
        return 0;
    }
    
    public function ifScorePresent($username, $level){
        $username = mysqli_real_escape_string($this->db, $username);
        
        $sql = "SELECT COUNT(*) `value` FROM `adabr_details` WHERE `username` = '$username' AND `lev".$level."` > 0";
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        if($row['value'] == 1)
            return true;
        return false;
    }
    
    public function getTransaction($username, $offset = 0, $len = 0){
        $username = mysqli_real_escape_string($this->db, $username);
        
        $sql = "select * from `adabrlevel4_transaction` where `from` = '$username' OR `to` = '$username' order by `timestamp` desc limit ".$offset.", ".$len;
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
        
        
        $value = [];
        $i = 0;
        while($row = mysqli_fetch_array($result)){
        //for($i = 0; $i < $len; $i++){
            $i++;
            $val = [];
            $val['from'] = $row['from'];
            $val['to'] = $row['to'];
            $val['amount'] = $row['amount'];
            $val['testcase'] = $row['testcase'];
            $val['timestamp'] = $row['timestamp'];
            
            $value[] = $val;
        }
        for( ; $i < $len; $i++){
            $val = [];
            $val['from'] = '';
            $val['to'] = '';
            $val['amount'] = '';
            $val['testcase'] = '';
            $val['timestamp'] = '';
            
            $value[] = $val;
        }
        return $value;
    }
    
    public function adabr_level4_getLastAttack($username){
        $username = mysqli_real_escape_string($this->db, $username);
        
        $sql = "select * from `adabrlevel4_transaction` where `from` = '$username' order by `timestamp` desc";
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        return $row;
        
        //$value = $this->getTransaction($username, 0, 1);
        //return $value[0];
    }
    
    public function resubmitDifference($username){
        $username = mysqli_real_escape_string($this->db, $username);
        
        $sql = "SELECT COUNT(*) `value` FROM `adabrlevel4_board` WHERE `username` = '$username'";
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        if( $row['value'] == 1 ){
            $sql = "SELECT CURRENT_TIMESTAMP - `timestamp` AS `value` FROM `adabrlevel4_board` `a`, `adabrlevel4_testcase` `b` WHERE `a`.`testcase_id` = `b`.`id` AND `a`.`username` = '$username'";
            $result = mysqli_query($this->db, $sql);
            $row = mysqli_fetch_array($result);
            
            return $row['value'];
        }
        else
            return -1;
    }
    
    public function gameEnded(){
        $sql = "SELECT `status` FROM `adabr_switch` LIMIT 1";
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        if($row['status'] == 2)
            return true;
        return false;
    }
    
    public function gameLive(){
        $sql = "SELECT `status` FROM `adabr_switch` LIMIT 1";
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        if($row['status'] == 1)
            return true;
        return false;
    }
    
    public function changePassword($username, $password){
        $username = mysqli_real_escape_string($this->db, $username);
        $password = mysqli_real_escape_string($this->db, $password);
        
        $sql = "UPDATE `adabr_scoreboard` SET `password` = '$password' WHERE `username` = '$username'";
        $result = mysqli_query($this->db, $sql);
    }
}

$Database = new Database_class('localhost', 'root', 'pritam@123', 'gourav1');

$gameLive = $Database->gameLive();
$gameEnded = $Database->gameEnded();

if(!$gameLive){
    if(!$gameEnded){
        header("location: will_start.php");
    }
    else{
        header("location: gamefinished.php");
    }
}

//echo $Database->resubmitDifference('cppxaxa');
//$Database->banUsername('hermoine');

/*
if(isset($_REQUEST['register']) && isset($_REQUEST['username']) && $_REQUEST['username'] != '' && isset($_REQUEST['password']) && $_REQUEST['password'] != ''){
    $Database->updateUser($_REQUEST['username'], $_REQUEST['password']);
}
*/

//$arr = $Database->getLeaderboard(10);
//
//for($i = 0; $i < 10; $i++){
//    echo $arr[$i]['username']." ".$arr[$i]['totalscore']." ".$arr[$i]['level']."</br>";
//}


//$Database->updateScore('cppxaxa', 2);
//echo $Database->authenticate('cppxaxa', 'pritam');

/*
$username = 'cppxaxa';
$password = 'pritam';
if(! $Database->valid($username))
    $Database->updateUser($username, $password);
*/

//echo $Database->getLevel('cppxaxa');

?>
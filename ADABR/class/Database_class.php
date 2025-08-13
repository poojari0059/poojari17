<?php

class Database_class
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
    
    
    
    public function adabr_level4_akela_case(){
        $sql = "SELECT `b`.`testcase` `testcase` FROM `adabrlevel4_testcase` `b` WHERE `b`.`id` = 106";
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
        
        $row = mysqli_fetch_array($result);
        $val = json_decode($row['testcase']);
        
        //for($i = 1; $i <= 300; $i++){
            //echo $val[$i - 1]."\n";
        //}
        
        return $val;
    }
    
    
    
    
    /*
    public function adabr_level4_showtestcase_akela(){
        $sql = "SELECT `b`.`testcase` `testcase` FROM `adabrlevel4_testcase` `b` WHERE `b`.`id` = 106";
        
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
        
        $row = mysqli_fetch_array($result);
        $val = json_decode($row['testcase']);
        
        
        //for($i = 1; $i <= 300; $i++){
            //echo $val[$i - 1]."<br>";
        //}
        
        
        return $val;
    }*/
    
    public function did_you_ever_cracked_akela($username){
        $sql = "SELECT COUNT(*) `count` FROM `adabrlevel4_transaction` WHERE `from` = 'akelazzz80@gmail.com' AND `to` = '$username'";
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        
        //echo "COUNT : ".$row['count'];
        
        if($row['count'] != 0)
            return true;
        else
            return false;
    }
    
    public function did_you_ever_cracked_abhi($username){
        $sql = "SELECT COUNT(*) `count` FROM `adabrlevel4_transaction` WHERE `from` = 'jabhinav11@gmail.com' AND `to` = '$username'";
        //echo $sql;
        $result = mysqli_query($this->db, $sql);
        $row = mysqli_fetch_array($result);
        
        //echo "COUNT : ".$row['count'];
        
        if($row['count'] != 0)
            return true;
        else
            return false;
    }
    
    
    public function adabr_level4_showtestcase_akela(){
        $r = "3 8 12 16 20 24 28 32 36 40 44 48 52 56 60 64 68 72 76 80 84 88 92 96 100 104 108 112 116 120 124 128 132 136 140 144 148 152 156 160 164 168 172 176 180 184 188 192 196 200 204 208 212 216 220 224 228 232 236 240 244 248 252 256 260 264 268 272 276 280 284 288 292 296 300 304 308 312 316 320 324 328 332 336 340 344 348 352 356 360 364 368 372 376 380 384 388 392 396 400 404 408 412 416 420 424 428 432 436 440 444 448 452 456 460 464 468 472 476 480 484 488 492 496 0 4 8 12 16 20 24 28 32 36 40 44 48 52 56 60 64 68 72 76 80 84 88 92 96 100 104 108 112 116 120 124 128 132 136 140 144 148 152 156 160 164 168 172 176 180 184 188 192 196 200 204 208 212 216 220 224 228 232 236 240 244 248 252 256 260 264 268 272 276 280 284 288 292 296 300 304 308 312 316 320 324 328 332 336 340 344 348 352 356 360 364 368 372 376 380 384 388 392 396 400 404 408 412 416 420 424 428 432 436 440 444 448 452 456 460 464 468 472 476 480 484 488 492 496 0 4 8 12 16 20 24 28 32 36 40 44 48 52 56 60 64 68 72 76 80 84 88 92 96 100 104 108 112 116 120 124 128 132 136 140 144 148 152 156 160 164 168 172 176 180 184 188 192 196 200 ";
        $val = explode(" ", $r);
        
        return $val;
    }
    
    public function adabr_level4_showtestcase_abhi(){
        $r = "28 21 42 63 72 73 94 107 116 144 159 146 165 188 0 19 38 45 60 88 89 110 123 116 141 146 167 176 17 0 19 38 61 76 87 90 105 120 148 157 146 167 176 12 29 38 51 45 92 87 106 121 136 139 158 165 180 23 28 45 38 51 64 81 98 111 105 152 155 174 165 9 8 31 42 53 83 64 81 98 127 132 149 158 171 165 25 24 47 58 53 76 83 102 113 111 132 149 174 187 3 20 29 42 42 85 92 83 102 113 128 151 162 173 171 3 20 45 58 71 72 89 102 102 145 128 151 162 189 1 16 35 46 42 71 88 105 102 123 140 149 162 162 18 1 16 35 62 69 84 95 106 102 139 156 149 162 191 15 20 37 35 46 69 84 111 122 121 136 155 166 162 10 31 20 37 62 67 80 97 127 106 137 152 171 166 6 9 24 39 37 78 67 80 97 114 135 140 157 187 166 6 25 40 39 58 77 84 99 97 114 135 156 173 182 6 19 28 56 39 74 93 84 99 126 129 144 159 189 182 6 19 44 53 58 79 88 116 99 142 129 144 175 178 2 17 32 60 53 74 95 104 105 126 139 148 176 191 15 2 17 32 51 70 77 92 120 121 142 155 148 173 178 10 23 49 32 51 70 93 108 119 122 137 152 180 189 9 26 23 44 61 70 83 77 124 119 138 153 168 ";
        $val = explode(" ", $r);
        
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
    
    public function add1900($username){
        $username = mysqli_real_escape_string($this->db, $username);
        
        if($this->valid($username)){
            $sql = "UPDATE `adabr_scoreboard` SET `totalscore` = `totalscore` + 1900 WHERE `username` = '$username'";
            //echo $sql."<br/>";
            $result = mysqli_query($this->db, $sql);
        }
    }
    
    public function add100($username){
        $username = mysqli_real_escape_string($this->db, $username);
        
        if($this->valid($username)){
            $sql = "UPDATE `adabr_scoreboard` SET `totalscore` = `totalscore` + 100 WHERE `username` = '$username'";
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
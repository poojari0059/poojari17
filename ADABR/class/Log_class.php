<?php

class Log_class{
    private $db;
    
    public function __construct($host, $username, $password, $db){
        $this->db = mysqli_connect($host, $username, $password, $db);
        
        if(!$this->db)
            echo "Database failure";
    }
    
    
    public function _log($username, $game, $text, $level, $qno, $parameter, $result){
        $sql = "INSERT INTO `adabr_log` (`username`, `game`, `text`, `level`, `qno`, `parameter`, `result`, `timestamp`) VALUES ('".$username."', '".$game."', '".$text."', '".$level."', '".$qno."', '".$parameter."', '".$result."', CURRENT_TIMESTAMP)";
        $result = mysqli_query($this->db, $sql);
    }
    
    
    //      LOGIN
    
    public function log_adabr_login($username, $parameter, $level, $result = 'true'){
        $this->_log($username, 'adabr', 'login', $level, '', $parameter, $result);
    }
    
    public function log_adaprime_login($username, $parameter, $level, $qno = '', $result = 'true'){
        $this->_log($username, 'adaprime', 'login', $level, $qno, $parameter, $result);
    }
    
    public function log_adabr_login_failed($username, $parameter){
        $this->_log($username, 'adabr', 'login', '0', '0', $parameter, 'false');
    }
    
    public function log_adaprime_login_failed($username, $parameter){
        $this->_log($username, 'adaprime', 'login', '0', '0', $parameter, 'false');
    }
    
    public function log_adabr_logout($username, $level){
        $this->_log($username, 'adabr', 'logout', $level, '', $username, 'true');
    }
    
    public function log_adaprime_logout($username, $level, $qno = ''){
        $this->_log($username, 'adabr', 'login', $level, $qno, $username, 'true');
    }
    
    
    
    //      GAME PLAY
    
    public function log_adabr_play($username, $level){
        $this->_log($username, 'adabr', 'play', $level, '1', $level, 'true');
    }
    
    public function log_adaprime_play($username, $level, $qno){
        $this->_log($username, 'adaprime', 'play', $level, $qno, $level, 'true');
    }
    
    public function log_adabr_win($username, $level){
        $this->_log($username, 'adabr', 'win', $level, '1', $level, 'true');
    }
    
    public function log_adabr_fail($username, $level){
        $this->_log($username, 'adabr', 'fail', $level, '1', $level, 'true');
    }
    
    public function log_adaprime_win($username, $level, $qno){
        $this->_log($username, 'adaprime', 'win', $level, $qno, $level, 'true');
    }
    
    public function log_adaprime_fail($username, $level, $qno){
        $this->_log($username, 'adaprime', 'fail', $level, $qno, $level, 'true');
    }
    
    public function log_adabr_level_up($username, $new_level){
        $this->_log($username, 'adabr', 'level_up', $new_level, '', $new_level, 'true');
    }
    
    public function log_adabr_level_denied($username, $new_level){
        $this->_log($username, 'adabr', 'level_denied', $new_level, '', $new_level, 'false');
    }
    
    public function log_adaprime_level_up($username, $new_level){
        $this->_log($username, 'adaprime', 'level_up', $new_level, '', $new_level, 'true');
    }
    
    public function log_adaprime_level_denied($username, $new_level){
        $this->_log($username, 'adaprime', 'level_denied', $new_level, '', $new_level, 'false');
    }
    
}

$Log = new Log_class('localhost', 'root', 'pritam@123', 'gourav1');

//$Log->_log('pranay', 'adaprime', 'login', '1', '1', 'pranay', 'true');
/*
    $Log->log_adaprime_login('pranay', '', 1, 1);
    $Log->log_adaprime_play('pranay', 1, 1);
    $Log->log_adabr_login('cppxaxa', '', 2);
    $Log->log_adaprime_win('pranay', 1, 1);
    $Log->log_adaprime_level_up('pranay', 2);
    $Log->log_adaprime_level_denied('pranay', 4);
    $Log->log_adaprime_fail('pranay', 1, 2);
    $Log->log_adaprime_logout('pranay', 1, 1);
    $Log->log_adabr_logout('cppxaxa', 2);
    $Log->log_adabr_login_failed('adassadas', 'adasdasd');
*/
//echo $Database->authenticate('cppxaxa', 'pritam');

/*
$username = 'cppxaxa';
$password = 'pritam';
if(! $Database->valid($username))
    $Database->updateUser($username, $password);
*/

//echo $Database->getLevel('cppxaxa');

?>
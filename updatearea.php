<?php
include 'class/Update_class.php'
?>
<html>
<script src="ADAPRIME/js/jquery.min.js" ></script>
<script>

$(document).ready(function(){
    $("#up").hover(function(){
        $("#di").fadeIn();
    }, function(){
		$("#di").hide();
	});
});
</script>
<style>
.update{
    width:100px;
    height:55px;
    text-align:center;
    position:fixed;
    top:40%;
    padding:5px;
    color:#167ac6;
    cursor:pointer;
    position: fixed;
    right: 0px;
    background:rgba(0,12,25,.7);
    border:3px solid #167ac6;
    z-index:5;
    border-bottom-left-radius:15px;
    border-top-left-radius:15px;
    box-shadow:0px 3px 20px 3px rgba(0,0,0,0.7);
} 
.update:hover{
    width:300px;
    height: 540px;
    max-height: 100%;
    background: transparent rgba(0,0,0,0.7);
    max-width: 100%;
    color:white;
    border:3px solid white;
    float:left;
    position: fixed;
    top:15%;
    right: 0px;
    z-index: 5;
    font-size:20px;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out;
    box-shadow:-3px 10px 35px 10px rgba(0,0,0,0.7);
}

@media (min-height:300px) and (max-height:640px) {
    
    .update{
        width:75px;
        height:45px;
        text-align:center;
        position:fixed;
        top:40%;
        font-size:12px;
        padding:5px;
        color:#167ac6;
        cursor:pointer;
        position: fixed;
        right: 0px;
        background:rgba(0,12,25,0.7);
        border:2.5px solid #167ac6;
        z-index:5;
        border-bottom-left-radius:15px;
        border-top-left-radius:15px;
        box-shadow:0px 3px 20px 3px rgba(0,0,0,0.7);
    } 
    .update:hover{
        width:260px;
        height: 400px;
        background: transparent rgba(0,0,0,0.7);
        max-width: 100%;
        color:white;
        border:3px solid white;
        float:left;
        position: fixed;
        top:10%;
        right: 0px;
        z-index: 5;
        font-size:20px;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
        box-shadow:-3px 10px 35px 10px rgba(0,0,0,0.7);
    }
}

/*updates style ends here*/

</style>
<div class="update" id="up" style="font-family: arial;">ADAVENTURE UPDATES    
		<div style=" color: white; font-family:arial; text-color:blue; font-size:18px; display: none;" id="di" >
    
    <?php



    $len = 10;
    $list = $Update->getTextList( $len );
    
    //echo "<table>\n";
    
    echo '<div style="margin-top: 50px; background-color:rgba(0, 0, 0, 0.4); margin:3px; height: 2px; margin-bottom: 20px; "></div>';
    
    for($i = 0; $i < $len; $i++){
        if($list[$i] != "")
            echo '<div style="margin-top: 50px; font-size: 16px; background-color:rgba(255,255,255,0.1);  margin:8px; padding:3px; ">'.$list[$i]."</div>";
    }
    
    //echo "</table>\n";
    
    ?>
    </div>
</div>
</html>

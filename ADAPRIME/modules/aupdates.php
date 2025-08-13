<?php include '../class/Update_class.php'; ?>
<div class="update" id="up" style="font-family: arial; font-size:13px;">ADAVENTURE UPDATES    
		<div style=" color: white; font-family:arial; text-color:blue; font-size:17px; display: none;" id="di" >
        <?php
            $len = 10;
            $list = $Update->getTextList( $len );
            echo '<div style="margin-top: 50px; background-color:rgba(0, 0, 0, 0.4); margin:3px; height: 2px; margin-bottom: 20px; "></div>';

            for($i = 0; $i < $len; $i++){
                if($list[$i] != "")
                    echo '<div style="margin-top: 50px; font-size: 16px; background-color:rgba(255,255,255,0.1);  margin:8px; padding:3px; ">'.$list[$i]."</div>";
            }
        ?>
    </div>
</div>
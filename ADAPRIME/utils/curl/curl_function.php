 <?php
function curl_function($ret){
 /*$ret =  '{
                message   : {
					status_code : 200,
                    user_id : 1234,
                    user_fullname : John
                }
            }';*/
            //$str=
			$len=0;
			$inv="\"";
			$str = "";
			for($i = 0; $i < count(1000); $i++){
				$str .= " ";
			}
			
			$j=0;
			$fin="";
			//echo $j;
		    while($len<strlen($ret)){
			   
				if($ret[$len]=='_' || ($ret[$len]!='{' && $ret[$len]!='}' && ((ord($ret[$len])>=97 && ord($ret[$len]<=122)) || (ord($ret[$len])>=65 && ord($ret[$len]<=90)))))
				   {
					   $str[$j]=$inv;
					   $j++;
					   $str[$j]=$ret[$len];
					   $j++;
					   $len++;
					   while($ret[$len]=='_' || ((ord($ret[$len])>=97 && ord($ret[$len]<=122)) || (ord($ret[$len])>=65 && ord($ret[$len]<=90)))){
						  $str[$j]=$ret[$len];
					      $j++;
					      $len++;
					   }
					   $str[$j]=$inv;
					   $j++;
			       }
				  else{ 
				  //echo $ret[$len];
				  $str[$j]=$ret[$len];
				  $j++;
				  $len++;
				  }					
			
			}
			for($i=0;$i<$j;$i++)
			{
				$fin=$fin.$str[$i];
			}
			return $fin;
}
   ?>         
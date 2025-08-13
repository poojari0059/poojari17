<script src="ADAPRIME/js/jquery.min.js"></script>
<script src="ADAPRIME/js/bootstrap.min.js"></script>
<script src="ADAPRIME/js/scripts.js"></script>
<script>
var picCount=0;
var picArray= ["ADAPRIME/images/sponsordo.png","ADAPRIME/images/sponsorbh.png"]
var linkArray= ["https://www.digitalocean.com/","http://www.bluehost.in/"]
function nextPic() {
picCount=(picCount+1<picArray.length)? picCount+1 : 0;
var build='<div style="color:#83A2F9; float:left; font-family:cursive;">Presented By:</div><a target="_blank" href="'+linkArray[picCount]+'"><img style="width:100%;" src="'+picArray[picCount]+'" ></a>';
document.getElementById("imgHolder").innerHTML=build;
setTimeout('nextPic()',2000)
}
</script>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Adaventure'17</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/pure-min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" />

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

  </head>
  <body onload="setTimeout('nextPic()',2000)">
    <div class="container">
      <div class="sky">
        <div class="stars"></div>
        <div class="stars1"></div>
        <div class="stars2"></div>
        <div class="shooting-stars"></div>
      </div>
    </div>
      
      
    
    <div class="container-fluid">
    
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-inverse" style="background-color:rgba(13, 16, 22,0.9); margin-bottom:0px;">
                  <div class="container-fluid mytnav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#"><img src="images/ada.png" id="adaimage"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                          <li><a target="blank" href="https://www.pragyan.org/17/home/" class="navmenu"><b>PRAGYAN'17</b></a></li>
                          <li data-toggle="modal" data-target="#prmodal"><a href="#" class="navmenu">Adaventure Prime Leaderboard</a></li> 
                          <li data-toggle="modal" data-target="#myModal"><a href="#" class="navmenu">Break-n Ride Leaderboard</a></li>
                        </ul>
                    </div>
                  </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div id="imgHolder" style=" width:200px; max-width:50%; height:33px; right:30px; float:right;"> 
                <div style="color:#83A2F9; float:left; font-family:cursive;">Presented By:</div>           
                <a target="_blank" href="https://www.digitalocean.com/"><img style="width:100%;" src="ADAPRIME/images/sponsordo.png" ></a>
              </div>                     
            </div>
        </div>
    
    
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div style="background:white; top:50px; height:300px; border-radius:10px;">
                      <h1 style="color:red; position:relative; margin-top:100px;">ADAVENTURE ENDED!!</h1>
                      <center><h2 style="color:green;">Final leaderboard will be updated soon.</h2></center>
                    </div>
            
                </div>
            </div>
            
            <div class="col-md-3">
            </div>
        </div>
        
    </div>
  </body>
</html>


        <div class="modal fade" id="prmodal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header" style="">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"><caption><h3 align="center"> ADAVENTURE PRIME<br>LEADERBOARD</h3></caption></h4>
                    <li data-toggle="modal" data-target="#golfModal" style="top:-10px; position:relative; float:left;"><a href="#" class="navmenu">Codeslash Leaderboard</a></li>
                    <li data-toggle="modal" data-target="#crazyModal" style="top:-10px; position:relative; float:right"><a href="#" class="navmenu">Crazy Leaderboard</a></li>
                </div>
                <div class="modal-body">
                  <iframe src="../lead_prime.php" style="border: none; overflow: hidden; position: relative; width: 100%; height: 470px;">Your browser don't support iframe</iframe>
                </div>
              </div>
            </div>
        </div>
        
        <?php include 'adaprimecodegolfleader.php'; ?>
        <?php include 'adaprimecrazyleader.php'; ?>
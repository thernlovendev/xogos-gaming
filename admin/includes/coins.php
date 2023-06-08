<div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Coins Available</h5>
                <h3 class="card-title text-bold"><i class="tim-icons icon-coins text-info"></i><?php echo $_SESSION['total_coins']; ?></h3>
              </div>
            </div>
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Welcome</h5>
                <h3 class="card-title"><?php echo $_SESSION['firstname']; ?></h3>
              </div>
              <div class="card-body" style="height:150px">
                <div class="chart-area">
                <img src="./assets/img/avatars/<?php echo $_SESSION['img']; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
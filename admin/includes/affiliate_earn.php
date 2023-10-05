<style>

.card {
  position: relative;
  background-size: cover;
  background-position: center;
}

.card .overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Black with 50% opacity */
  z-index: 1; /* Ensure the overlay is above other elements */
}

.card-body {
  position: relative;
}


</style>

<div class="col-lg-4">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-category">Amount Earned</h5>
        <h3 class="card-title text-bold"><i class="tim-icons icon-coins text-info"></i>100</h3>
      </div>
    </div>    
</div>
<div class="col-lg-4">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-category">Total Recruits</h5>
        <h3 class="card-title text-bold"><i class="tim-icons icon-coins text-info"></i>100</h3>
      </div>
    </div>    
</div>
<div class="col-lg-4">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-category">New Recruits</h5>
        <h3 class="card-title text-bold"><i class="tim-icons icon-coins text-info"></i>3</h3>
      </div>
    </div>    
</div>


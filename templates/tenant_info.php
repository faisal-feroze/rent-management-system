<?php include('backend/dbc.php');?>

<div class="form-row">
  <div class="form-group col-md-6">
    <form class="" action="home.php" method="GET">
      <button class="btn btn-secondary btn-lg t_nav_b" type="submit" name="act" value="add_tenant">Add Tenant</button>
    </form>
  </div>
  <div class="form-group col-md-6">
    <form class="" action="home.php" method="GET">
      <button class="btn btn-secondary btn-lg t_nav_b" type="submit" name="act" value="map_tenant">Map Tenant</button>
    </form>
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-6">
    <form class="" action="home.php" method="GET">
      <button class="btn btn-secondary btn-lg t_nav_b" type="submit" name="act" value="show_tenant">Show All Tenant</button>
    </form>
  </div>

  <div class="form-group col-md-6">
    <form class="" action="home.php" method="GET">
      <button class="btn btn-secondary btn-lg t_nav_b" type="submit" name="act" value="release_tenant">Release Tenant</button>
    </form>
  </div>
</div>

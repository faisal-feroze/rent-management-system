
<?php include('backend/dbc.php');?>

<div class="rent_template dashboard">
  <p class="content_page_title">Dashboard</p>

  <?php
     $sql = "SELECT * FROM generate_bill WHERE (status = 'not_received' OR status = 'to_be_received') AND (ses_id = '{$_SESSION['id']}')";
     $result = mysqli_query($conn,$sql);
     $bill_to_received = mysqli_num_rows($result);

     $sql = "SELECT * FROM building_info WHERE ses_id = '{$_SESSION['id']}'";
     $result = mysqli_query($conn,$sql);
     $building_count = mysqli_num_rows($result);

     $sql = "SELECT * FROM flat_info WHERE ses_id = '{$_SESSION['id']}'";
     $result = mysqli_query($conn,$sql);
     $flat_count = mysqli_num_rows($result);

     $sql = "SELECT * FROM tenant_flat_map WHERE status = 'mapped' AND ses_id = '{$_SESSION['id']}'";
     $result = mysqli_query($conn,$sql);
     $mapped_tenant = mysqli_num_rows($result);

     $sql = "SELECT * FROM tenant_info WHERE ses_id = '{$_SESSION['id']}'";
     $result = mysqli_query($conn,$sql);
     $tenant_no = mysqli_num_rows($result);

   ?>

  <div class="dash_wrapper form-row">
    <div class="col-md-6 dash_col">
      <a href="home.php?act=received_bill">
        <div class="dash_cont">
          <?php echo"$bill_to_received"; ?> Generated Bill To Received
        </div>
      </a>
    </div>

    <div class="col-md-6 dash_col">
      <a href="home.php?act=add_building">
        <div class="dash_cont">
          <?php echo"$building_count"; ?> Total Buildings You Own
        </div>
      </a>
    </div>

    <div class="col-md-6 dash_col">
      <a href="home.php?act=add_flat">
        <div class="dash_cont">
          <?php echo"$flat_count"; ?> Total Flat You Own
        </div>
      </a>
    </div>

    <div class="col-md-6 dash_col">
      <a href="home.php?act=release_tenant">
        <div class="dash_cont">
          <?php echo"$mapped_tenant"; ?> Total Tenant Living In Flat You Own
        </div>
      </a>
    </div>

    <div class="col-md-6 dash_col">
      <a href="home.php?act=show_tenant">
        <div class="dash_cont">
          <?php echo"$tenant_no"; ?> Total Tenant
        </div>
      </a>
    </div>

  </div>










</div>

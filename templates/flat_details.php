<?php include('backend/dbc.php');?>
<?php

$flat_id = $_GET['flat_id'];

 ?>

<div class="rent_template flat_detail">
  <p class="content_page_title">Flat Detail</p>
  <div class="building_info">

    <form action="backend/form_handel.php" method="post" id='update_flat'>
      <input type="hidden" name="f_id" value="<?php echo $flat_id;?>">
      <?php

      $sql2 = "SELECT * FROM flat_info WHERE id = '$flat_id'";
         $result2 = mysqli_query($conn,$sql2);
         while($row2 = mysqli_fetch_assoc($result2)){
           $b_id = $row2['building_id'];
           $flat_no = $row2['flat_no'];
           $floor = $row2['floor_no'];
           $square_feet = $row2['square_feet'];
           $bed = $row2['bedrooms'];
           $bathroom = $row2['bathrooms'];
           $dining = $row2['dining'];
           $drawing = $row2['drawing'];
           $balcony = $row2['balcony'];
           $electric_meter = $row2['electric_meter_no'];
           $water_meter = $row2['water_meter_no'];
           $electric_ac = $row2['electricity_ac'];
           $rent = $row2['flat_rent'];
         ?>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="">Building</label>
          <select class="form-control" name='buliding'>
            <?php
            $sql1 = "SELECT * FROM building_info WHERE id = '$b_id'";
               $result1 = mysqli_query($conn,$sql1);
               while($row1 = mysqli_fetch_assoc($result1)){
               echo"
                 <option value='".$row1['id']."'>".$row1['name']." ".$row1['building_no']." ".$row1['area']." ".$row1['post_office']."</option>
                 ";
               }
            ?>
            <!-- <option value='0'>Building Name</option> -->
            <?php
            $sql = "SELECT * FROM building_info WHERE id != '$b_id'";
               $result = mysqli_query($conn,$sql);
               while($row = mysqli_fetch_assoc($result)){
               echo"
                 <option value='".$row['id']."'>".$row['name']." ".$row['building_no']." ".$row['area']." ".$row['post_office']."</option>
                 ";
               }
            ?>

          </select>
        </div>

        <div class="col-md-4 mb-3">
          <label for="">Flat Code Number</label>
          <input type="text" class="form-control" id="" name="flat_no" placeholder="Flat Code Number" value="<?php echo $flat_no;?>">
        </div>

        <div class="col-md-4 mb-3">
          <label for="">Square Feet</label>
          <input type="number" class="form-control" id="" name="feet" placeholder="Square Feet" min="0" value="<?php echo $square_feet;?>">
        </div>

        <!-- <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="" name="f_name" placeholder="Flat Name" required>
        </div> -->

      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="">Floor</label>
          <input type="text" class="form-control" id="" name="floor" placeholder="Flat Floor" value="<?php echo $floor;?>">
        </div>

        <div class="col-md-4 mb-3">
          <label for="">Bedrooms</label>
          <input type="number" class="form-control" id="" name="bed" placeholder="Bedrooms Number" min="0" value="<?php echo $bed;?>">
        </div>

        <div class="col-md-4 mb-3">
          <label for="">Dining</label>
          <input type="number" class="form-control" id="" name="dinning" placeholder="Dining Room Number" min="0" value="<?php echo $dining;?>">
        </div>
      </div>

      <div class="form-row">

        <div class="col-md-4 mb-3">
          <label for="">Bathrooms</label>
          <input type="number" class="form-control" id="" name="bathroom" placeholder="Bathrooms Number" min="0" value="<?php echo $bathroom;?>">
        </div>

        <div class="col-md-4 mb-3">
          <label for="">Balcony</label>
          <input type="number" class="form-control" id="" name="balcony" placeholder="Balcony Number" min="0" value="<?php echo $balcony;?>">
        </div>

        <div class="col-md-4 mb-3">
          <label for="">Drawing Room</label>
          <input type="number" class="form-control" id="" name="drawing" placeholder="Drawing Room Number" min="0" value="<?php echo $drawing;?>">
        </div>
      </div>

      <div class="form-row">

        <div class="col-md-4 mb-3">
          <label for="">Electric Meter Number</label>
          <input type="text" class="form-control" id="" name="electric_meter" placeholder="Electric Meter Number" value="<?php echo $electric_meter;?>">
        </div>

        <div class="col-md-4 mb-3">
          <label for="">Water Meter Number</label>
          <input type="text" class="form-control" id="" name="water_meter" placeholder="Water Meter Number" value="<?php echo $water_meter;?>">
        </div>

        <div class="col-md-4 mb-3">
          <label for="">Electricity A/C number</label>
          <input type="text" class="form-control" id="" name="electricity_ac" placeholder="Electricity A/C number" value="<?php echo $electric_ac;?>">
        </div>

        <div class="col-md-4 mb-3">
          <label for="">Flat Rent Bill</label>
          <input type="number" class="form-control" min="0" id="" name="flat_rent" placeholder="Flat Rent Bill" value="<?php echo $rent;?>">
        </div>

      </div>

      <!-- <button class="btn btn-primary" type="submit">Submit form</button> -->
      <button class="btn btn-primary" name="flat_update" id='flat_update_btn'>Update Flat</button>
      <!-- <input id='flat_update_btn' class="btn btn-primary" type="submit" name="flat_update" value="Update Flat"> -->
  <?php  }
    ?>
    </form>
 </div>
</div>

<!-- <script>

$('#flat_update_btn').click(function(){

  $.ajax({
          url: '../backend/ajax_handle.php',
          type: 'post',
          data: $("#update_flat").serialize(),
          dataType: 'html',
          success: function(response){
            // $('.'+fid+' .h_id').val(response);
             console.log(response);
             alert('Successfully Updated.');
           }
      });


});

</script> -->

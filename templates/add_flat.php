<?php include('backend/dbc.php');?>

<div class="rent_template r_building">
  <p class="content_page_title">Add Flat</p>
  <div class="building_info">
    <form action="backend/form_handel.php" method="post">
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <select class="form-control" name='buliding' required>
            <option value='0'>Building Name</option>
            <?php
            $sql = "SELECT * FROM building_info WHERE ses_id = '{$_SESSION['id']}'";
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
          <input type="text" class="form-control" id="" name="flat_no" placeholder="Flat Code Number" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="number" class="form-control" id="" name="feet" placeholder="Square Feet" min="0" required>
        </div>

        <!-- <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="" name="f_name" placeholder="Flat Name" required>
        </div> -->

      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="" name="floor" placeholder="Flat Floor" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="number" class="form-control" id="" name="bed" placeholder="Bedrooms Number" min="0" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="number" class="form-control" id="" name="dinning" placeholder="Dining Room Number" min="0" required>
        </div>
      </div>

      <div class="form-row">

        <div class="col-md-4 mb-3">
          <input type="number" class="form-control" id="" name="bathroom" placeholder="Bathrooms Number" min="0" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="number" class="form-control" id="" name="balcony" placeholder="Balcony Number" min="0" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="number" class="form-control" id="" name="drawing" placeholder="Drawing Room Number" min="0" required>
        </div>
      </div>

      <div class="form-row">

        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="" name="electric_meter" placeholder="Electric Meter Number" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="" name="water_meter" placeholder="Water Meter Number" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="" name="electricity_ac" placeholder="Electricity A/C number" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="number" class="form-control" min="0" id="" name="flat_rent" placeholder="Flat Rent Bill" required>
        </div>

      </div>
      <input type="hidden" name="ses_id" value="<?php echo $_SESSION['id'];?>">
      <!-- <button class="btn btn-primary" type="submit">Submit form</button> -->
      <input class="btn btn-primary" type="submit" name="flat_add" value="ADD Flat">

    </form>
 </div>

 <div class="show_all_flat">
   <table class="table table-striped">
     <thead class="thead-dark">
       <tr>
         <th scope="col">SL#</th>
         <th scope="col">Building Name</th>
         <th scope="col">Flat No</th>
         <th scope="col">Square Feet</th>
         <th scope="col">Floor</th>
         <th scope="col">Monthly Rent</th>
         <th scope="col">See Details to Update</th>
       </tr>
     </thead>
     <tbody>

      <?php
       $sql = "SELECT * FROM flat_info WHERE ses_id = '{$_SESSION['id']}'";
          $result = mysqli_query($conn,$sql);
          $i = 1;
          while($row = mysqli_fetch_assoc($result)){
            $building_bid = $row['building_id'];
          echo"
             <tr class='set_".$row['id']."'>
               <th scope='row'>".$i."</th> ";
               $sql2 = "SELECT * FROM building_info WHERE id = '$building_bid'";
                  $result2 = mysqli_query($conn,$sql2);
                  while($row2 = mysqli_fetch_assoc($result2)){
                    $b_name = $row2['name'];
                    $b_no = $row2['building_no'];
                    $b_area = $row2['area'];
                  }
          echo"
               <td>".$b_name." ".$b_no." ".$b_area."</td>
               <td>".$row['flat_no']."</td>
               <td>".$row['square_feet']."</td>
               <td>".$row['floor_no']."</td>
               <td>".$row['flat_rent']."</td>
               <td>
                <input type='hidden' value='".$row['id']."'>
                <a id='f_d_id' class='btn btn-primary' href='home.php?act=flat_detail&&flat_id=".$row['id']."'>Detail</a>
               </td>
             </tr>
            ";

            $i++;
          }
       ?>
     </tbody>
   </table>

 </div>
</div>

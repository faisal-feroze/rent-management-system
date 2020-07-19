
<?php include('backend/dbc.php');?>
<div class="rent_template r_building">
  <p class="content_page_title">Add Building</p>
  <div class="building_info">
    <form action="backend/form_handel.php" method="post" enctype="multipart/form-data">
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="validationDefault01" name="b_name" placeholder="Building Name" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="validationDefault02" name="b_no" placeholder="Building Number" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="validationDefault02" name="area" placeholder="Area/Road No" required>
        </div>

      </div>
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="validationDefault03" name="post_office" placeholder="Post Office" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="validationDefault03" name="district" placeholder="District" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="validationDefault05" name="zip" placeholder="ZIP Code" required>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="" name="owner" placeholder="Owner Name" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" id="" name="owner_mobile" placeholder="Owner Mobile" required>
        </div>

        <div class="col-md-4 mb-3">
          <input type="file" name="logo">
        </div>
      </div>
      <!-- <button class="btn btn-primary" type="submit">Submit form</button> -->
      <!-- <input type='hidden' name='ses_id' value='<?php //echo $_SESSION['id'];?>'> -->
      <input class="btn btn-primary" type="submit" name="building_add" value="Submit">
    </form>

  </div>

  <div class="show_all_building">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">SL#</th>
          <th scope="col">Building Name</th>
          <th scope="col">Building Number</th>
          <th scope="col">Area/Road No</th>
          <th scope="col">Post Office</th>
          <th scope="col">District</th>
          <th scope="col">ZIP Code</th>
          <th scope="col">Owner Name</th>
          <th scope="col">Mobile</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php

        $sql = "SELECT * FROM building_info WHERE ses_id = '{$_SESSION['id']}'";
           $result = mysqli_query($conn,$sql);
           $i=1;
           while($row = mysqli_fetch_assoc($result)){
           echo"
              <tr class='b_update set_".$row['id']."'>
               <form action='backend/form_handel.php' method='post'>
                <th scope='row'>".$i."</th>
                <input type='hidden' name='b_id' value='".$row['id']."'>
                <td><input type='text' name='b_name' value='".$row['name']."'></td>
                <td><input type='text' name='b_no' value='".$row['building_no']."'></td>
                <td><input type='text' name='b_area' value='".$row['area']."'></td>
                <td><input type='text' name='b_po' value='".$row['post_office']."'></td>
                <td><input type='text' name='b_dis' value='".$row['district']."'></td>
                <td><input type='text' name='b_zip' value='".$row['zip']."'></td>
                <td><input type='text' name='b_owner' value='".$row['owner']."'></td>
                <td><input type='text' name='b_mobile' value='".$row['owner_mobile']."'></td>

                <td><input class='btn btn-primary' type='submit' name='update_building' value='Update'></td>
              </form>
              </tr>
             ";
             $i++;
           }

        ?>


      </tbody>
    </table>

  </div>





</div>

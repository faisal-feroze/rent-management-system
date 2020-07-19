<?php include('backend/dbc.php');?>

<div class="rent_template release">
  <p class="content_page_title">Release Tenant</p>
  <div class="release_tenant">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">SL#</th>
          <th scope="col">Building Name</th>
          <th scope="col">Flat Info</th>
          <th scope="col">Tenant Info</th>
          <th scope="col">Leaving Reason</th>
          <th scope="col">Release Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
           $sql = "SELECT * FROM tenant_flat_map WHERE status = 'mapped' AND ses_id = '{$_SESSION['id']}' ";
           $result = mysqli_query($conn,$sql);
           $i = 1;
           while($row = mysqli_fetch_assoc($result)){
             $building_id = $row['building_id'];
             $flat_id = $row['flat_id'];
             $tenant_id = $row['tenant_id'];

             echo"
               <tr class=''>
                 <th scope='row'>".$i."</th>
              ";

             $sql1 = "SELECT * FROM building_info WHERE id = '$building_id' ";
             $result1 = mysqli_query($conn,$sql1);
             while($row1 = mysqli_fetch_assoc($result1)){
               $building_name = $row1['name'];
               $building_no   = $row1['building_no'];

             }

             echo"
                 <td scope='row'>".$building_no.", ".$building_name."</td>
              ";


              $sql2 = "SELECT * FROM flat_info WHERE id = '$flat_id' ";
              $result2 = mysqli_query($conn,$sql2);
              while($row2 = mysqli_fetch_assoc($result2)){
                $flat_no = $row2['flat_no'];
                $floor   = $row2['floor_no'];

              }

              echo"
                  <td scope='row'>".$flat_no.", ".$floor." Floor</td>
               ";

               $sql3 = "SELECT * FROM tenant_info WHERE id = '$tenant_id' ";
               $result3 = mysqli_query($conn,$sql3);
               while($row3 = mysqli_fetch_assoc($result3)){
                 $name = $row3['name'];
                 $mobile   = $row3['mobile'];

               }



               echo"
                   <td scope='row'>Name: ".$name.", Mobile: ".$mobile."</td>
                   <form class='' action='backend/form_handel.php' method='post'>
                     <input type='hidden' name='tenant_map_id' value='".$row['id']."'>
                     <td><input name='reason' class='form-control' type='text' required></td>
                     <td><input name='release_date' class='form-control' type='date' required></td>
                     <td><input class='btn btn-primary' type='submit' name='release_tenant' value='Release'></td>
                   </form>


                ";

            $i++;
           }

         ?>

      </tbody>
    </table>

  </div>
</div>

<?php include('backend/dbc.php');?>

<div class="rent_template release">
  <p class="content_page_title">Show All Tenant</p>
  <div class="show_tenant">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">SL#</th>
          <th scope="col">Name</th>
          <th scope="col">Mobile</th>
          <th scope="col">DoB</th>
          <th scope="col">Maritial Status</th>
          <th scope="col">Permanent Address</th>
          <th scope="col">Religion</th>
          <th scope="col">Email</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
           $sql = "SELECT * FROM tenant_info WHERE ses_id = '{$_SESSION['id']}'";
           $result = mysqli_query($conn,$sql);
           $i = 1;
           while($row = mysqli_fetch_assoc($result)){
             $t_id = $row['id'];

             $sql1 = "SELECT * FROM tenant_flat_map WHERE tenant_id = '$t_id' ";
             $result1 = mysqli_query($conn,$sql1);
             $rowcount1 = mysqli_num_rows($result1);
             if($rowcount1>0){
             while($row1 = mysqli_fetch_assoc($result1)){
               $status = $row1['status'];
             }
            }

            else{
              $status = 'not mapped yet';
            }


             echo"
               <tr class=''>
                 <th scope='row'>".$i."</th>
                 <td scope='row'>".$row['name']."</td>
                 <td scope='row'>".$row['mobile']."</td>
                 <td scope='row'>".$row['t_dob']."</td>
                 <td scope='row'>".$row['maritial_status']."</td>
                 <td scope='row'>".$row['permanent_address']."</td>
                 <td scope='row'>".$row['religion']."</td>
                 <td scope='row'>".$row['mail']."</td>
                 <td scope='row'>".$status."</td>
                 <td scope='row'>
                    <form action='home.php?act=tenant_detail' method='post'>
                      <input type='hidden' name='tenant_id' value='".$t_id."'>
                      <input class='btn btn-primary' type='submit' name='tenant_detail' value='Detail'>
                    </form>
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

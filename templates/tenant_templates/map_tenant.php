<?php include('backend/dbc.php');?>

<div class="rent_template r_building">
  <p class="content_page_title">Map Tenant</p>
  <div class="tenant_map">



    <form action="backend/form_handel.php" method="post">

        <div class="mb-3">
          <select class="form-control s_building" name='buliding' required>
            <option value=''>Building</option>
            <?php
            $sql = "SELECT * FROM building_info WHERE ses_id = '{$_SESSION['id']}'";
               $result = mysqli_query($conn,$sql);
               //$building_id = $row['id'];
               while($row = mysqli_fetch_assoc($result)){
               echo"
                 <option value='".$row['id']."'>".$row['name']." ".$row['building_no']." ".$row['area']." ".$row['post_office']."</option>
                 ";
               }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <select class="form-control" name='flat' id="s_flat" required>
            <option value=''>Flat Info, Select Building First</option>
          </select>

        </div>

        <div class="mb-3">
          <select class="form-control s_tenant" name='tenant' required>
            <option value=''>Select Tenant</option>
            <?php
            //$sql = "SELECT * FROM tenant_info";
            $sql = "SELECT * FROM `tenant_info` WHERE id NOT IN
            (SELECT tenant_id FROM `tenant_flat_map` WHERE (status = 'mapped' OR status  = 'released') AND (ses_id = '{$_SESSION['id']}'))
            AND ses_id = '{$_SESSION['id']}'";

               $result = mysqli_query($conn,$sql);
               //$building_id = $row['id'];
               while($row = mysqli_fetch_assoc($result)){
               echo"
                 <option value='".$row['id']."'>Name: ".$row['name']." Mobile: ".$row['mobile']."
                 Maritial Status: ".$row['maritial_status']." Religion: ".$row['religion']."</option>
                 ";
               }
            ?>
          </select>
        </div>

        <!-- <div class="mb-3">
          <input placeholder="Tenant Living Date" name="tenant_living_date" class="form-control" type="text" onfocus="(this.type='date')" id="date">
        </div> -->
        <input class="btn btn-primary" type="submit" name="map_tenant" value="Map Tenant">

    </form>

    <div class="show_all_tenant_mmap">
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">SL#</th>
            <th scope="col">Building Info</th>
            <th scope="col">Flat Info</th>
            <th scope="col">Tenant Info</th>
            <th scope="col">Statut</th>
            <th scope="col">Tenant Living Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM tenant_flat_map WHERE ses_id = '{$_SESSION['id']}'";
          $result = mysqli_query($conn,$sql);
          $i = 1;
          while($row = mysqli_fetch_assoc($result)){
            $t_id = $row['tenant_id'];
            $b_id = $row['building_id'];
            $f_id = $row['flat_id'];

            $sql1 = "SELECT * FROM building_info WHERE id = '$b_id' ";
            $result1 = mysqli_query($conn,$sql1);
            while($row1 = mysqli_fetch_assoc($result1)){
              $b_name = $row1['name'];
              $b_no = $row1['building_no'];
              $area = $row1['area'];
            }

            $sql2 = "SELECT * FROM flat_info WHERE id = '$f_id' ";
            $result2 = mysqli_query($conn,$sql2);
            while($row2 = mysqli_fetch_assoc($result2)){
              $f_no = $row2['flat_no'];
              $floor = $row2['floor_no'];
            }

            $sql3 = "SELECT * FROM tenant_info WHERE id = '$t_id' ";
            $result3 = mysqli_query($conn,$sql3);
            while($row3 = mysqli_fetch_assoc($result3)){
              $t_name = $row3['name'];
              $mobile = $row3['mobile'];
            }

            echo"
              <tr class=''>
                <th scope='row'>".$i."</th>
                <td scope='row'>".$b_name.",".$b_no.",".$area."</td>
                <td scope='row'>".$floor." floor, ".$f_no."</td>
                <td scope='row'>".$t_name.", mobile: ".$mobile."</td>
                <td scope='row'>".$row['status']."</td>
                <td scope='row'>".$row['living_date']."</td>
             </tr>
             ";

           $i++;
          }

           ?>
        </tbody>
      </table>
    </div>

    <script>

    $(document).ready(function(){
    $(".s_building").change(function(){
        var building_id = $(".s_building option:selected").val();
        $.ajax({
            type: "POST",
            url: "backend/ajax_handle.php",
            data: { building_id_map : building_id }
        }).done(function(data){
            $("#s_flat").html(data);
            console.log(data);
        });
    });
});


    </script>



 </div>
</div>

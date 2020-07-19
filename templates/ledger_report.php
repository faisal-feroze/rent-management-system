<?php include('backend/dbc.php');?>

<div class="rent_template r_building">
  <p class="content_page_title">Report</p>

  <div class="report_filter">
    <form id="search_report" action="" method="">
      <input type="hidden" name="filter_report" value="1">
      <div class="form-group">
        <select class="form-control s_building" name='f_tenant' id="f_tenant">
          <option value=''>Choose Flat</option>
          <?php

           $sql6 = "SELECT DISTINCT tenant_id FROM generate_bill WHERE ses_id = '{$_SESSION['id']}'";
           $result6 = mysqli_query($conn,$sql6);
           while($row6 = mysqli_fetch_assoc($result6)){
             $t_id = $row6['tenant_id'];
             // $building_id = $row6['buidling_id'];
             // $f_id = $row6['flat_id'];

               $sql7 = "SELECT * FROM tenant_flat_map WHERE tenant_id = '$t_id'";
               $result7 = mysqli_query($conn,$sql7);
               while($row7 = mysqli_fetch_assoc($result7)){
                 $b_id = $row7['building_id'];
                 $f_id = $row7['flat_id'];
               }

               $sql7 = "SELECT * FROM flat_info WHERE id = '$f_id'";
               $result7 = mysqli_query($conn,$sql7);
               while($row7 = mysqli_fetch_assoc($result7)){
                 $f_name = $row7['flat_no'];
                 $floor = $row7['floor_no'];
                 $f_sq = $row7['square_feet'];
               }

               $sql7 = "SELECT * FROM building_info WHERE id = '$b_id'";
               $result7 = mysqli_query($conn,$sql7);
               while($row7 = mysqli_fetch_assoc($result7)){
                 $b_name = $row7['name'];
                 $b_no = $row7['building_no'];
                 $b_area = $row7['area'];
               }

               $sql7 = "SELECT * FROM tenant_info WHERE id = '$t_id'";
               $result7 = mysqli_query($conn,$sql7);
               while($row7 = mysqli_fetch_assoc($result7)){
                 $t_name = $row7['name'];
                 $t_mobile = $row7['mobile'];
               }

               echo"<option value='".$t_id."'>".$f_name.", ".$floor." floor, ".$b_name." ".$b_no." ".$b_area.", Tenant: ".$t_name." ".$t_mobile."</option>";

         }

       ?>

        </select>
      </div>

      <!-- <div class="form-group">
        <select class="form-control s_building" name='f_tenant' id="f_tenant">
          <option value=''>Choose Tenant</option>
          <?php
              // $sql8 = "SELECT * FROM tenant_flat_map";
              // $result8 = mysqli_query($conn,$sql8);
              // while($row8 = mysqli_fetch_assoc($result8)){
              //   $t_id = $row8['tenant_id'];
              //     $sql9 = "SELECT * FROM tenant_info WHERE id = '$t_id'";
              //     $result9 = mysqli_query($conn,$sql9);
              //     while($row9 = mysqli_fetch_assoc($result9)){
              //       $t_name = $row9['name'];
              //       $t_mobile = $row9['mobile'];
              //     }
              //     echo"<option value='".$t_id."'>".$t_name.", Mobile: ".$t_mobile."</option>";
              // }
           ?>
        </select>
      </div>

      <div class="form-group">
        <select class="form-control s_building" name='f_month' id="f_month">
          <option value=''>Select Month</option>
          <option value='1'>January</option>
          <option value='2'>February</option>
          <option value='3'>March</option>
          <option value='4'>April</option>
          <option value='5'>May</option>
          <option value='6'>June</option>
          <option value='7'>July</option>
          <option value='8'>August</option>
          <option value='9'>September</option>
          <option value='10'>October</option>
          <option value='11'>November</option>
          <option value='12'>December</option>
        </select>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Date From:</label>
          <input type="date" class="form-control"  name="date_from" id="date_from">
        </div>
        <div class="form-group col-md-6">
          <label for="">Date To:</label>
          <input type="date" class="form-control"  name="date_to" id="date_to">
        </div>
      </div> -->

      <div class="" style="margin-bottom: 10px;">
        <!-- <input id="filter_rep" class="btn btn-primary" type="submit" name="filter_rep" value="Search"> -->
        <button id="filter_rep" type="button" class="btn btn-primary">Search</button>
      </div>

    </form>
  </div>










  <div class="show_all_report">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">SL#</th>
          <th scope="col">Building</th>
          <th scope="col">Flat</th>
          <th scope="col">Tenant</th>
          <th scope="col">Year</th>
          <th scope="col">Month</th>
          <th scope="col">Rent</th>
          <th scope="col">Water</th>
          <th scope="col">Electricity</th>
          <th scope="col">Gas</th>
          <th scope="col">Others</th>
          <th scope="col">Due</th>
          <th scope="col">Total</th>
          <th scope="col">Receive</th>
          <th scope="col">Date</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="searchFromAjax">

       <?php
        $sql = "SELECT * FROM generate_bill WHERE ses_id = '{$_SESSION['id']}'";
           $result = mysqli_query($conn,$sql);
           $i = 1;
           while($row = mysqli_fetch_assoc($result)){
             $building_id = $row['buidling_id'];
             $Flat_id = $row['flat_id'];
             $tenant_id = $row['tenant_id'];
             $gen_bill__id = $row['id'];
             $month = $row['g_b_month'];
           echo"
              <tr class='set_".$row['id']."'>

                <th scope='row'>".$i."</th> ";

                $sql2 = "SELECT * FROM building_info WHERE id = '$building_id'";
                   $result2 = mysqli_query($conn,$sql2);
                   while($row2 = mysqli_fetch_assoc($result2)){
                     $b_name = $row2['name'];
                     $b_no = $row2['building_no'];
                     $b_area = $row2['area'];
                   }
           echo"
                <td>".$b_name." ".$b_no."</td>";

                $sql3 = "SELECT * FROM flat_info WHERE id = '$Flat_id'";
                   $result3 = mysqli_query($conn,$sql3);
                   while($row3 = mysqli_fetch_assoc($result3)){
                     $flat_no = $row3['flat_no'];
                     $floor_no = $row3['floor_no'];
                   }

          echo"
              <td>".$flat_no." ".$floor_no." floor</td>";


              $sql4 = "SELECT * FROM tenant_info WHERE id = '$tenant_id'";
                 $result4 = mysqli_query($conn,$sql4);
                 while($row4 = mysqli_fetch_assoc($result4)){
                   $tenant_name = $row4['name'];
                   $tenant_mobile = $row4['mobile'];
                 }

          echo"
              <td>".$tenant_name." Mobile:".$tenant_mobile."</td>";




          echo"
                <td>".$row['g_b_year']."</td> ";

              switch ($month) {

                  case 1:
                      $month_name = 'January';
                      break;
                  case 2:
                      $month_name = 'February';
                      break;
                  case 3:
                      $month_name = 'March';
                      break;
                  case 4:
                      $month_name = 'April';
                      break;
                  case 5:
                      $month_name = 'May';
                      break;
                  case 6:
                      $month_name = 'June';
                      break;
                  case 7:
                      $month_name = 'July';
                      break;
                  case 8:
                      $month_name = 'August';
                      break;
                  case 9:
                      $month_name = 'September';
                      break;
                  case 10:
                      $month_name = 'October';
                      break;
                  case 11:
                      $month_name = 'November';
                      break;
                  case 12:
                      $month_name = 'December';
                      break;
                  default:
                      echo "";
               }

              echo"
                <td>".$month_name."</td>
                <td>".$row['rent_bill']."</td>
                <td>".$row['water_bill']."</td>
                <td>".$row['electric_bill']."</td>
                <td>".$row['gas_bill']."</td>
                <td>".$row['other_bill']."</td>
                <td>".$row['due_bill']."</td>
                <td>".$row['total_bill']."</td>
                ";


            $sql5 = "SELECT * FROM receive_bill WHERE gen_bill_id = '$gen_bill__id'";
               $result5 = mysqli_query($conn,$sql5);
               $rowcount = mysqli_num_rows($result5);
               if($rowcount>0){
                 while($row5 = mysqli_fetch_assoc($result5)){
                   $received = $row5['received'];
                   $received_date = $row5['received_date'];
                 }
                echo"
                   <td>".$received."</td>

                   <td>".$received_date."</td>";
              }

              else{
                $received = "N/A";
                $received_date = "N/A";
                echo"
                   <td>".$received."</td>
                   <td>".$received_date."</td>";
              }

              //if($row['status'] == 'to_be_received'){
                echo"
                  <td><a href='home.php?act=to_be_paid_report&&gen_id=".$row['id']."
                  &&b_name=".$b_name."&&b_no=".$b_no."&&flat=".$flat_no."&&floor=".$floor_no."
                  &&t_name=".$tenant_name."&&t_mobile=".$tenant_mobile."&&year=".$row['g_b_year']."
                  &&month=".$month_name."&&received=".$received."&&status=".$row['status']."
                  &&date=".$received_date."&&total=".$row['total_bill']."&&due=".$row['due_bill']."'>
                  ".$row['status']."</a></td>
                ";
            //  }

              // else{
              //   echo"
              //       <td>".$row['status']."</td>";
              //
              // }

              ?>

              <td>

                <form target="_blank" class='' action='reports/ledger_report.php' method='post'>
                  <input type='hidden' name="g_id" value="<?php echo $row['id'];?>">
                  <input type='hidden' name="b_area" value="<?php echo $b_area;?>">
                  <input type='hidden' name="building_name" value="<?php echo $b_name;?>">
                  <input type='hidden' name="building_no" value="<?php echo $b_no;?>">
                  <input type='hidden' name="flat_no" value="<?php echo $flat_no;?>">
                  <input type='hidden' name="floor_no" value="<?php echo $floor_no;?>">
                  <input type='hidden' name="tenant_name" value="<?php echo $tenant_name;?>">
                  <input type='hidden' name="tenant_mobile" value="<?php echo $tenant_mobile;?>">
                  <input type='hidden' name="year" value="<?php echo $row['g_b_year'];?>">
                  <input type='hidden' name="month" value="<?php echo $month_name;?>">
                  <input type='hidden' name="rent" value="<?php echo $row['rent_bill'] ;?>">
                  <input type='hidden' name="water" value="<?php echo $row['water_bill'] ;?>">
                  <input type='hidden' name="electric" value="<?php echo $row['electric_bill'];?>">
                  <input type='hidden' name="gas" value="<?php echo $row['gas_bill'];?>">
                  <input type='hidden' name="other" value="<?php echo $row['other_bill'];?>">
                  <input type='hidden' name="due" value="<?php echo $row['due_bill'];?>">
                  <input type='hidden' name="total" value="<?php echo $row['total_bill'];?>">
                  <input type='hidden' name="total_without_rent" value="<?php echo $row['total_without_rent'] ;?>">
                  <input type='hidden' name="received" value="<?php echo $received;?>">
                  <input type='hidden' name="received_date" value="<?php echo $received_date;?>">
                  <input type='hidden' name="status" value="<?php echo $row['status'];?>">
                  <input type='hidden' name="gen_date" value="<?php echo $row['g_b_date'];?>">
                  <input class='btn btn-primary' type='submit' name='print' value='Print'>
                </form>

              </td>


        </tr>

      <?php  $i++; }
    // ends while ............
        ?>

      </tbody>
    </table>

  </div>

</div>


<script>


$('#filter_rep').click(function () {
    //var flat = $("#f_flat option:selected").val();
    var tenant = $("#f_tenant option:selected").val();
    // var month = $("#f_month option:selected").val();
    // var date_from = $("#date_from").val();
    // var date_to = $("#date_to").val();
    var dataString = $("#search_report").serialize();
    console.log(dataString);

    if(!tenant){
      alert("Please provide at least one values");
      return false;
    }

    else {
        //return false;
        $.ajax({
                url: 'backend/ajax_handle.php',
                type: 'post',
                data: dataString,
                dataType: 'html',
            }).done(function(data){
                //$("#gen_bill_tenant").html(data);
                console.log(data);
                $('#searchFromAjax').html(data);
            });
    }


});


</script>

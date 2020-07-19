<?php include('backend/dbc.php');?>

<div class="rent_template receive_bill">
  <p class="content_page_title"> Receive Bill </p>


  <div class="show_all_bills">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">SL#</th>
          <th scope="col">Building</th>
          <th scope="col">Flat</th>
          <th scope="col">Tenant</th>
          <th scope="col">Year</th>
          <th scope="col">Month</th>
          <th scope="col">Total Bill</th>
          <th scope="col">Received Amount</th>
          <th scope="col">Receive</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php

        $sql = "SELECT * FROM generate_bill WHERE (status = 'not_received' OR status = 'to_be_received') AND (ses_id = '{$_SESSION['id']}')";
           $result = mysqli_query($conn,$sql);
           $rowcount = mysqli_num_rows($result);
           $i = 1;
           if($rowcount>0){
           while($row = mysqli_fetch_assoc($result)){
             $month_no = $row['g_b_month'];

             if($month_no == 1){
               $month_name = 'January';
             }

             else if($month_no == 2){
               $month_name = 'February';
             }

             else if($month_no == 3){
               $month_name = 'March';
             }

             else if($month_no == 4){
               $month_name = 'April';
             }

             else if($month_no == 5){
               $month_name = 'May';
             }

             else if($month_no == 6){
               $month_name = 'June';
             }

             else if($month_no == 7){
               $month_name = 'July';
             }

             else if($month_no == 8){
               $month_name = 'August';
             }

             else if($month_no == 9){
               $month_name = 'September';
             }

             else if($month_no == 10){
               $month_name = 'October';
             }

             else if($month_no == 11){
               $month_name = 'November';
             }

             else if($month_no == 12){
               $month_name = 'December';
             }


           echo"
            <tr class='received_bill_".$row['id']."'>

              <th scope='row'>".$i."</th>
              ";

              $building_id = $row['buidling_id'];
              $flat_id = $row['flat_id'];
              $tenant_id =$row['tenant_id'];

              $sql1 = "SELECT * FROM building_info WHERE id = '$building_id'";
                 $result1 = mysqli_query($conn,$sql1);
                 $rowcount1 = mysqli_num_rows($result1);
                 if($rowcount1>0){
                   while($row1 = mysqli_fetch_assoc($result1)){
                    echo" <td>".$row1['building_no']." ".$row1['name']."</td>";
                   }
                 }

               $sql2 = "SELECT * FROM flat_info WHERE id = '$flat_id'";
                  $result2 = mysqli_query($conn,$sql2);
                  $rowcount2 = mysqli_num_rows($result2);
                  if($rowcount2>0){
                    while($row2 = mysqli_fetch_assoc($result2)){
                     echo" <td>".$row2['floor_no']." floor, ".$row2['flat_no']."</td>";
                    }
                  }

              $sql3 = "SELECT * FROM tenant_info WHERE id = '$tenant_id'";
                 $result3 = mysqli_query($conn,$sql3);
                 $rowcount3 = mysqli_num_rows($result3);
                 if($rowcount3>0){
                   while($row3 = mysqli_fetch_assoc($result3)){
                    echo" <td>".$row3['name'].", Mobile: ".$row3['mobile']."</td>";
                   }
                 }

          echo" <td>".$row['g_b_year']."</td>
                <td>".$month_name."</td>
                <td>".$row['total_bill']."</td>
                <form class='' action='backend/form_handel.php' method='POST'>
                  <input type='hidden' name='gen_id' value='".$row['id']."'>
                  <input type='hidden' name='building_id' value='".$building_id."'>
                  <input type='hidden' name='flat_id' value='".$flat_id."'>
                  <input type='hidden' name='tenant_id' value='".$tenant_id."'>
                  <input type='hidden' name='year' value='".$row['g_b_year']."'>
                  <input type='hidden' name='month' value='".$month_no."'>
                  <input type='hidden' name='total' id='total_bill' value='".$row['total_bill']."'>
                  <input type='hidden' name='to_be_received' id='to_be_received' value='".$row['to_be_received']."'>
                  <td>".$row['to_be_received']."</td>
                  <td><input type='number' id='received' name='receive' value='' required></td>
                  <td><input type='date' name='date' required></td>
                  <td><input class='btn btn-primary' type='submit' name='received_bill' value='Received'></td>
                </form>
              </tr>
             ";
             $i++;
           }
         }

        ?>

      </tbody>
    </table>

    <script>
    $(document).ready(function(){

      $("#received").keyup(function(){
          var received = parseInt($("#received").val());
          var to_be_received = parseInt($("#to_be_received").val());
          var total = parseInt($("#total_bill").val());

          var total_received = received + to_be_received;

          if(total_received > total){
              $(':input[type="submit"]').prop('disabled', true);
          }

          else{
            $(':input[type="submit"]').prop('disabled', false);
          }


      });


    });

    </script>




  </div>


</div>

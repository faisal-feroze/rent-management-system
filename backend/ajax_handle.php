<?php
include('dbc.php');

if(isset($_POST['name'])){
  if($_POST['name']=='update_settings'){

    $water = $_POST['water'];
    $gas = $_POST['gas'];
    $other = $_POST['other'];
    $id = $_POST['id'];
    $ses_id = $_POST['ses_id'];

    $sql = "UPDATE settings SET water_bill = '$water', gas_bill = '$gas', other_bill = '$other'
            WHERE id = '$id' AND ses_id ='$ses_id'";
    $result = mysqli_query($conn,$sql);
    echo $bill;
  }

  elseif($_POST['name']=='insert_settings'){

    $water = $_POST['water'];
    $gas = $_POST['gas'];
    $other = $_POST['other'];
    $id = $_POST['id'];
    $ses_id = $_POST['ses_id'];

    $query = "INSERT INTO settings(ses_id,water_bill,gas_bill,other_bill)
              VALUES('$ses_id','$water','$gas','$other')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die('query failed'.mysqli_error($conn));
    }

  }



}


if(isset($_POST['building_id'])){
//SELECT * FROM `tenant_info` WHERE id NOT IN (SELECT tenant_id FROM `tenant_flat_map` WHERE status = 'mapped' OR status  = 'released'
  $b_id = $_POST['building_id'];
  //$sql = "SELECT * FROM flat_info WHERE building_id = '$b_id'";
  $sql = "SELECT * FROM `flat_info` WHERE `building_id` = '$b_id' AND id IN (SELECT flat_id FROM `tenant_flat_map` WHERE status = 'mapped') ";
     $result = mysqli_query($conn,$sql);
     $rowcount = mysqli_num_rows($result);
     if($rowcount>0){
       echo "<option value=''>Showing All Results ........</option>";
       while($row = mysqli_fetch_assoc($result)){
       echo"
         <option value='".$row['id']."'>Flat no: ".$row['flat_no']." Floor: ".$row['floor_no']." Square Feet: ".$row['square_feet']."
         Bedrooms: ".$row['bedrooms']."</option>
         ";
       }
     }
     else{
        echo "<option value=''>No Flat is Vacant</option>";
     }


}


if(isset($_POST['building_id_map'])){
//SELECT * FROM `tenant_info` WHERE id NOT IN (SELECT tenant_id FROM `tenant_flat_map` WHERE status = 'mapped' OR status  = 'released'
  $b_id = $_POST['building_id_map'];
  //$sql = "SELECT * FROM flat_info WHERE building_id = '$b_id'";
  $sql = "SELECT * FROM `flat_info` WHERE `building_id` = '$b_id' AND id NOT IN (SELECT flat_id FROM `tenant_flat_map` WHERE status = 'mapped') ";
     $result = mysqli_query($conn,$sql);
     $rowcount = mysqli_num_rows($result);
     if($rowcount>0){
       echo "<option value=''>Showing All Results ........</option>";
       while($row = mysqli_fetch_assoc($result)){
       echo"
         <option value='".$row['id']."'>Flat no: ".$row['flat_no']." Floor: ".$row['floor_no']." Square Feet: ".$row['square_feet']."
         Bedrooms: ".$row['bedrooms']."</option>
         ";
       }
     }
     else{
        echo "<option value=''>No Flat is Vacant</option>";
     }


}


if(isset($_POST['flat_id'])){

  $flat_id = $_POST['flat_id'];
  $sql = "SELECT tenant_id FROM tenant_flat_map WHERE flat_id = '$flat_id' AND status = 'mapped' ";
     $result = mysqli_query($conn,$sql);
     $rowcount12 = mysqli_num_rows($result);
     if($rowcount12>0){
       while($row = mysqli_fetch_assoc($result)){
         $tenant_id = $row['tenant_id'];
       }

       $sql2 = "SELECT * FROM tenant_info WHERE id = '$tenant_id'";
       $result2 = mysqli_query($conn,$sql2);
       $rowcount = mysqli_num_rows($result2);
       if($rowcount>0){
         echo "<option value=''>Showing All Results .......</option>";
         while($row2 = mysqli_fetch_assoc($result2)){
         echo"
           <option value='".$row2['id']."'>Name: ".$row2['name']."
           Mobile: ".$row2['mobile']." Father's Name: ".$row2['father_name']."
           Maritial Status: ".$row2['maritial_status']." Religion: ".$row2['religion']."</option>
           ";
         }
       }

       else{
         echo "<option value=''>No Results Found</option>";
       }
     }

     else{
       echo "<option value=''>No Results Found</option>";
     }


}

if(isset($_POST['gen_bill_as_month'])){
  $tenant_id = $_POST['tenant_id'];
  $flat_id = $_POST['flat'];
  $year = $_POST['year'];

  $sql2 = "SELECT MAX(g_b_month) FROM generate_bill WHERE flat_id = '$flat_id' AND tenant_id = '$tenant_id'
          AND g_b_year ='$year' ";
  $result2 = mysqli_query($conn,$sql2);
  $rowcount = mysqli_num_rows($result2);
  $row = mysqli_fetch_assoc($result2);
  $check = $row['MAX(g_b_month)'];

  //echo json_encode($see);
  if(is_null($check)){

    $sql4 = "SELECT * FROM flat_info WHERE id = '$flat_id'";
    $result4 = mysqli_query($conn,$sql4);

    while($row4 = mysqli_fetch_assoc($result4)){
      $rent_bill = $row4['flat_rent'];
      $data['due'] = 0;
      // $data['due_in'] = 'N/A';
      // $data['month_name'] = 'N/A';
      // $data['month_val'] = -1;
      $data['rent'] = $rent_bill;
      echo json_encode($data);
    }


  }
// if row count ends

  else{

        $sql2 = "SELECT MAX(g_b_month) FROM generate_bill WHERE flat_id = '$flat_id' AND tenant_id = '$tenant_id'
                AND g_b_year ='$year' ";

        $result2 = mysqli_query($conn,$sql2);
        $rowcount = mysqli_num_rows($result2);
        while($row2 = mysqli_fetch_assoc($result2)){
          $prev_month = $row2['MAX(g_b_month)'];
          $next_month = $row2['MAX(g_b_month)'] + 1;
          $month_name = "";

          if($next_month > 12){
            $next_month = 1;
          }

          switch ($next_month) {

            case 1:
                $data['month_val'] = $next_month;
                $month_name = 'January';
                $data['month_name'] = $month_name;
                break;
            case 2:
                $data['month_val'] = $next_month;
                $month_name = 'February';
                $data['month_name'] = $month_name;
                break;
            case 3:
                $data['month_val'] = $next_month;
                $month_name = 'March';
                $data['month_name'] = $month_name;
                //echo json_encode($data);
                break;
            case 4:
                $data['month_val'] = $next_month;
                $month_name = 'April';
                $data['month_name'] = $month_name;
                break;
            case 5:
                $data['month_val'] = $next_month;
                $month_name = 'May';
                $data['month_name'] = $month_name;
                break;
            case 6:
                $data['month_val'] = $next_month;
                $month_name = 'June';
                $data['month_name'] = $month_name;
                break;
            case 7:
                $data['month_val'] = $next_month;
                $month_name = 'July';
                $data['month_name'] = $month_name;
                break;
            case 8:
                $data['month_val'] = $next_month;
                $month_name = 'August';
                $data['month_name'] = $month_name;
                break;
            case 9:
                $data['month_val'] = $next_month;
                $month_name = 'September';
                $data['month_name'] = $month_name;
                break;
            case 10:
                $data['month_val'] = $next_month;
                $month_name = 'October';
                $data['month_name'] = $month_name;
                break;
            case 11:
                $data['month_val'] = $next_month;
                $month_name = 'November';
                $data['month_name'] = $month_name;
                break;
            case 12:
                $data['month_val'] = $next_month;
                $month_name = 'December';
                $data['month_name'] = $month_name;
                break;
            default:
                echo "<option value='".$next_month."'>No month found!</option>";
         }
    // switch ends
        }
    // while ends

    // pull rent bill from the flat info
    $sql4 = "SELECT * FROM flat_info WHERE id = '$flat_id'";
    $result4 = mysqli_query($conn,$sql4);

      while($row4 = mysqli_fetch_assoc($result4)){
        $rent_bill = $row4['flat_rent'];
        $data['rent'] = $rent_bill;
      }



    $sql3 = "SELECT * FROM receive_bill WHERE flat_id = '$flat_id' AND tenant_id = '$tenant_id' AND year = '$year' And month ='$prev_month'";
    $result3 = mysqli_query($conn,$sql3);
    $rowcount3 = mysqli_num_rows($result3);
    if($rowcount3>0){
      while($row3 = mysqli_fetch_assoc($result3)){
        $due = $row3['due'];
        $gen_bil_id = $row3['id'];

        $data['due'] = $due;
        echo json_encode($data);

      }
    }

    else{
      //$pre_received_month = $prev_month - 1;
      $sql4 = "SELECT * FROM generate_bill WHERE flat_id = '$flat_id' AND tenant_id = '$tenant_id' AND g_b_year = '$year' And g_b_month ='$prev_month'";
      $result4 = mysqli_query($conn,$sql4);
      $rowcount4 = mysqli_num_rows($result4);
      if($rowcount4>0){
        while($row4 = mysqli_fetch_assoc($result4)){
          //$due = $row4['total_bill'];
          $gen_bil_id = $row4['id'];
          $total_bills = $row4['total_bill'];
          $to_be_received = $row4['to_be_received'];
          $due = $total_bills - $to_be_received;
          $data['due_in'] = $month_name;
          $data['due'] = $due;
          echo json_encode($data);

        }
      }

    }



  }



}
// if isset ends


if(isset($_POST['filter_report'])){

  $t_id = $_POST['f_tenant'];
  //echo"<p> ".$t_id." </p>";

          $sql = "SELECT * FROM generate_bill WHERE tenant_id = '$t_id' ";
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


              echo"
                <td>

                  <form target='_blank' class='' action='reports/ledger_report.php' method='post'>
                    <input type='hidden' name='building_name' value=".$b_name.">
                    <input type='hidden' name='building_no' value=".$b_no.">
                    <input type='hidden' name='flat_no' value=".$flat_no.">
                    <input type='hidden' name='floor_no' value=".$floor_no.">
                    <input type='hidden' name='tenant_name' value=".$tenant_name.">
                    <input type='hidden' name='tenant_mobile' value=".$tenant_mobile.">
                    <input type='hidden' name='year' value=".$row['g_b_year'].">
                    <input type='hidden' name='month' value=".$month_name.">
                    <input type='hidden' name='rent' value=".$row['rent_bill'].">
                    <input type='hidden' name='water' value=".$row['water_bill'].">
                    <input type='hidden' name='electric' value=".$row['electric_bill'].">
                    <input type='hidden' name='gas' value=".$row['gas_bill'].">
                    <input type='hidden' name='other' value=".$row['other_bill'].">
                    <input type='hidden' name='due' value=".$row['due_bill'].">
                    <input type='hidden' name='total' value=".$row['total_bill'].">
                    <input type='hidden' name='total_without_rent' value=".$row['total_without_rent'].">
                    <input type='hidden' name='received' value=".$received.">
                    <input type='hidden' name='received_date' value=".$received_date.">
                    <input type='hidden' name='status' value=".$row['status'].">
                    <input type='hidden' name='gen_date' value=".$row['g_b_date'].">
                    <input class='btn btn-primary' type='submit' name='print' value='Print'>
                  </form>

                </td>


          </tr>
        ";
       $i++; }
      // ends while ............



}

 ?>

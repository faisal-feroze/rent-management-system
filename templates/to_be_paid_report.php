<?php
include('backend/dbc.php');

$gen_id = $_GET['gen_id'];
$building_name = $_GET['b_name'];
$building_no = $_GET['b_no'];
$flat = $_GET['flat'];
$floor = $_GET['floor'];
$tenant = $_GET['t_name'];
$mobile = $_GET['t_mobile'];
$year = $_GET['year'];
$month = $_GET['month'];
$received_bills = $_GET['received'];
$status = $_GET['status'];
$date = $_GET['date'];
$total_bills = $_GET['total'];
$due_bills = $_GET['due'];
?>

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
        <th scope="col">Total</th>
        <!-- <th scope="col">Due</th> -->
        <th scope="col">Received Amount</th>
        <th scope="col">Now Due</th>
        <th scope="col">Status</th>
        <th scope="col">Received Date</th>
      </tr>
    </thead>
    <tbody>


<?php
$sql = "SELECT * FROM to_be_received WHERE gen_id = '$gen_id'";
   $result = mysqli_query($conn,$sql);
   $rowcount = mysqli_num_rows($result);
   $i = 1;
   if($rowcount>0){ // total er por due <td> ".$due_bills." </td>
     while($row = mysqli_fetch_assoc($result)){
       echo "
       <tr class='report_".$row['id']."'>
         <th scope='row'>".$i."</th>
         <td> ".$building_name." </td>
         <td> ".$flat." </td>
         <td> ".$tenant." </td>
         <td> ".$year." </td>
         <td> ".$month." </td>
         <td> ".$row['total']." </td>

         <td> ".$row['to_be_received']." </td>
         <td> ".$row['now_due']." </td>
         <td> ".$status." </td>
         <td> ".$row['to_be_received_date']." </td>
        </tr>
       ";
       $i++;
     }
  }

  else{

    if ( filter_var($received_bills, FILTER_VALIDATE_INT) === false ) {
      $now_due = "N/A";
    }
    else{
      $now_due = $total_bills - $received_bills;
    }
    // total er por due   <td> ".$due_bills." </td>
    echo "
    <tr class='report_'>
      <th scope='row'>".$i."</th>
      <td> ".$building_name." </td>
      <td> ".$flat." </td>
      <td> ".$tenant." </td>
      <td> ".$year." </td>
      <td> ".$month." </td>
      <td> ".$total_bills." </td>

      <td> ".$received_bills." </td>
      <td>".$now_due."</td>
      <td> ".$status." </td>
      <td> ".$date." </td>
     </tr>
    ";
    $i++;
  }

 ?>

</tbody>
</table>

</div>

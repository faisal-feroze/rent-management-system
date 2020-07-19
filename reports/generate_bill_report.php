<?php
include('../backend/dbc.php');
//require('../fpdf17/fpdf.php');

if(isset($_GET['gbd'])){

 $gbd = $_GET['gbd'];
 $t_id = $_GET['t_id'];
 $month = $_GET['month'];

$sql = "SELECT * FROM generate_bill WHERE g_b_date = '$gbd' AND tenant_id = '$t_id' AND g_b_month = '$month'";
//$sql = "SELECT * FROM generate_bill WHERE g_b_date = '03/04/2020' AND tenant_id = 1 AND g_b_month = 9 ";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
  $gen_bill_id = $row['id'];
  $b_id = $row['buidling_id'];
  $f_id = $row['flat_id'];
  $water = $row['water_bill'];
  $gas = $row['gas_bill'];
  $electric = $row['electric_bill'];
  $rent = $row['rent_bill'];
  $other = $row['other_bill'];
  $due = $row['due_bill'];
  $total = $row['total_bill'];
  $total_without_rent = $total - $rent;
  $note = $row['note'];
}

$sql1 = "SELECT * FROM building_info WHERE id = '$b_id'";
$result1 = mysqli_query($conn,$sql1);
while($row1 = mysqli_fetch_assoc($result1)){
  $b_name = $row1['name'];
  $b_no = $row1['building_no'];
  $b_area = $row1['area'];
  $b_po = $row1['post_office'];
  $b_dis = $row1['district'];
  $b_zip = $row1['zip'];
}


$sql2 = "SELECT * FROM flat_info WHERE id = '$f_id'";
$result2 = mysqli_query($conn,$sql2);
while($row2 = mysqli_fetch_assoc($result2)){
  $f_no = $row2['flat_no'];
  $floor = $row2['floor_no'];
}

include('../mpdf/vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf();

$mpdf->writeHTML('

<style>

.gen_pdf tr td{
  text-align: center;
  font-size: 16px;
  padding: 10px;
  font-family: nikosh;
}

.gen_pdf{
  border-bottom: 1px solid #000;
  border-top: 1px solid #000;
  padding: 10px 0px;
}

</style>


<div class="" style="text-align: center; padding: 5px;  margin-bottom: 15px;">
 <h1>Generated Bill Report</h1>
</div>

<table class="gen_pdf" style="width: 100%;">
 <tr>
   <td>'.$b_name.'</td>
   <td>'.$b_name.'</td>
 </tr>

 <tr>
   <td>'.$b_no.' '.$b_area.' '.$b_po.'</td>
   <td>'.$b_no.' '.$b_area.' '.$b_po.'</td>
 </tr>

 <tr>
   <td>'.$b_dis.' - '.$b_zip.'</td>
   <td>'.$b_dis.' - '.$b_zip.'</td>
 </tr>

 <tr>
   <td>Rent Recipt</td>
   <td>Rent Recipt</td>
 </tr>



 <tr>
   <td>Month: '.$month.'</td>
   <td>Month: '.$month.'</td>
 </tr>

 <tr>
   <td>'.$f_no.', '.$floor.' floor</td>
   <td>'.$f_no.', '.$floor.' floor</td>
 </tr>

</table>

<table class="gen_pdf" style="width: 100%; margin: auto; border: none;">
 <tr>
   <td>Gas</td>
   <td>'.$gas.'</td>
   <td>Gas</td>
   <td>'.$gas.'</td>
 </tr>

 <tr>
   <td>Water</td>
   <td>'.$water.'</td>
   <td>Water</td>
   <td>'.$water.'</td>
 </tr>

 <tr>
   <td>Electricity</td>
   <td>'.$electric.'</td>
   <td>Electricity</td>
   <td>'.$electric.'</td>
 </tr>

 <tr>
   <td>others</td>
   <td>'.$other.'</td>
   <td>others</td>
   <td>'.$other.'</td>
 </tr>

 <tr>
   <td>Due</td>
   <td>'.$due.'</td>
   <td>Due</td>
   <td>'.$due.'</td>
 </tr>

 <tr>
   <td>Rent</td>
   <td>'.$rent.'</td>
   <td></td>
   <td></td>
 </tr>


 <tr>
   <td>Total Bill</td>
   <td>'.$total.'</td>
   <td>Total Bill (without rent)</td>
   <td>'.$total_without_rent.'</td>
 </tr>


</table>

<table class="gen_pdf" style="width: 100%; margin-top: 10px; border: none;">
 <tr>
   <td>Note: '.$note.'</td>
   <td>Note: '.$note.'</td>
 </tr>

 <tr>
   <td style="padding-top: 40px;">Signature</td>
   <td>Signature</td>
 </tr>

 <tr>
   <td>Date: '.$gbd.'</td>
   <td>Date: '.$gbd.'</td>
 </tr>
</table>


');

$mpdf->output();




}
?>

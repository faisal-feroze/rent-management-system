<?php

include('../backend/dbc.php');

if(isset($_POST['print'])){

$g_id = $_POST['g_id'];
$area = $_POST['b_area'];
$b_name = $_POST['building_name'];
$b_no= $_POST['building_no'];
$f_no= $_POST['flat_no'];
$floor= $_POST['floor_no'];
$t_name= $_POST['tenant_name'];
$t_mobile= $_POST['tenant_mobile'];
$year= $_POST['year'];
$month= $_POST['month'];
$rent= $_POST['rent'];
$water= $_POST['water'];
$electric= $_POST['electric'];
$gas= $_POST['gas'];
$other= $_POST['other'];
$total= $_POST['total'];
$total_without_rent = $_POST['total_without_rent'];
$received = $_POST['received'];
$received_date = $_POST['received_date'];
$status = $_POST['status'];
$gen_date = $_POST['gen_date'];
$due = $_POST['due'];



if(filter_var($received, FILTER_VALIDATE_INT) === false){
  $in_now_due = $received;
}

else{
  $in_now_due = $total - $received;
}



include('../mpdf/vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf();

$mpdf->writeHTML('

<style>
.l_bft {
 text-align: center;
 padding: 20px;
 border-bottom: 1px solid #000;
}

.l_table {
 width: 50%;
 margin: auto;
 padding-bottom: 10px;
 border-bottom: 1px solid #000;
 margin-bottom: 20px;
}

.l_table tr td, .l_table tr th {
 text-align: center;
 padding: 10px 0;
 font-size: 15px;
 font-family: nikosh;
}

p{
 font-size: 15px;
 font-family: nikosh;
}

h2{
 text-align: center;
 font-family: nikosh;
}

</style>

<h2 style="margin-bottom: 0px;">Ledger Report</h2>

<div class="l_bft">

  <p>'.$b_name.' '.$b_no.' '.$area.' </p>
  <p>'.$f_no.', '.$floor.' floor</p>
  <p>'.$t_name.', Mobile: '.$t_mobile.'</p>
  <p>Date: '.$gen_date.'</p>
  <p>Billing Month: '.$month.'</p>
  <p>Year: '.$year.'</p>

</div>

<h2>All Bills</h2>
<table class="l_table">
  <tr>
    <th>Bill Type</th>
    <th>Amount</th>
  </tr>

  <tr>
    <td>Rent Bill</td>
    <td>'.$rent.'</td>
  </tr>

  <tr>
    <td>Electricity Bill</td>
    <td>'.$electric.'</td>
  </tr>

  <tr>
    <td>Gas Bill</td>
    <td>'.$gas.'</td>
  </tr>

  <tr>
    <td>Water Bill</td>
    <td>'.$water.'</td>
  </tr>

  <tr>
    <td>Others Bill</td>
    <td>'.$other.'</td>
  </tr>

  <tr>
    <td>Previous Due Bill</td>
    <td>'.$due.'</td>
  </tr>

  <tr>
    <td>Total Bill</td>
    <td>'.$total.'</td>
  </tr>

  <tr>
    <td>Received</td>
    <td>'.$received.'</td>
  </tr>

  <tr>
    <td>Now Due</td>
    <td>'.$in_now_due.'</td>
  </tr>

  <tr>
    <td>Status</td>
    <td>'.$status.'</td>
  </tr>

  <tr>
    <td>Received Date</td>
    <td>'.$received_date.'</td>
  </tr>

</table>


');



$mpdf->output();

}
?>

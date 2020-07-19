<?php
// include('vendor/autoload.php');
//
// $eng = "eng valu";
// $bng = "বাংলা কথা";
//
// $mpdf = new \Mpdf\Mpdf();
//
// $mpdf->writeHTML('
//
// <h1>Heading </h1>
// <p>paragragh</p>
// <p style="font-family: nikosh">বাংলা hello </p>
//
// <p style="font-family: nikosh"> '.$eng.' </p>
//
// <p style="font-family: nikosh"> '.$bng.'  </p>
//
// ');
//
//
// $mpdf->output();







 ?>

 <style>
 .l_bft {
	text-align: center;
	padding: 20px;
	border-bottom: 1px solid #000;
	margin-bottom: 10px;
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
  font-size: 20px;
}

p{
  font-size: 20px;
}

h1{
  text-align: center;
}

 </style>

 <h1>Ledger Report</h1>

 <div class="l_bft">

   <p>960/ East Shewrapara</p>
   <p>5-A, 5th floor</p>
   <p>Faisal, Mobile: 01675187137</p>
   <p>Date: 30/3/2020</p>
   <p>Billing Month: April</p>
   <p>Year: 2020</p>

 </div>

 <h1>All Bills</h1>
 <table class="l_table">
   <tr>
     <th>Bill Type</th>
     <th>Amount</th>
   </tr>

   <tr>
     <td>Rent Bill</td>
     <td>22323</td>
   </tr>

   <tr>
     <td>Electricity Bill</td>
     <td>2323</td>
   </tr>

   <tr>
     <td>Gas Bill</td>
     <td></td>
   </tr>

   <tr>
     <td>Water Bill</td>
     <td></td>
   </tr>

   <tr>
     <td>Others Bill</td>
     <td></td>
   </tr>

   <tr>
     <td>Previous Due Bill</td>
     <td></td>
   </tr>

   <tr>
     <td>Total Bill</td>
     <td></td>
   </tr>

   <tr>
     <td>Received</td>
     <td></td>
   </tr>

   <tr>
     <td>Now Due</td>
     <td></td>
   </tr>

   <tr>
     <td>Status</td>
     <td></td>
   </tr>

   <tr>
     <td>Received Date</td>
     <td></td>
   </tr>

 </table>



 <h1>Till now received bill for month April</h1>
 <table class="l_table">
   <tr>
     <th>Total</th>
     <th>Received</th>
     <th>Now Due</th>
     <th>Received Date</th>
   </tr>

   <tr>
     <td>12121</td>
     <td>121</td>
     <td>21</td>
     <td>22323</td>
   </tr>


 </table>

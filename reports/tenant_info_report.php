<?php
include('../backend/dbc.php');
if(isset($_POST['print_tenant'])){
  $tenant_id = $_POST['print_tenant_id'];

  $sql = "SELECT * FROM tenant_info WHERE id = '$tenant_id'";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result)){
    $tetant_name            = $row['name'];
    $tetant_father          = $row['father_name'];
    $tetant_mother          = $row['mother_name'];
    $tetant_dob             = $row['t_dob'];
    $tetant_maritial        = $row['maritial_status'];
    $tetant_per_address     = $row['permanent_address'];
    $tetant_occupation_add  = $row['occupation_address'];
    $tetant_religion        = $row['religion'];
    $tetant_education       = $row['education'];
    $tetant_mobile          = $row['mobile'];
    $tetant_mail            = $row['mail'];
    $tetant_nid             = $row['t_nid'];
    $tetant_passport        = $row['passport'];
    $emergency_name         = $row['emergency_name'];
    $emergency_address      = $row['emergency_address'];
    $emergency_relation     = $row['emergency_relation'];
    $emergency_mobile       = $row['emergency_mobile'];
    $homeworker_name        = $row['homeworker_name'];
    $homeworker_nid         = $row['homeworker_nid'];
    $homeworker_mobile      = $row['homeworker_mobile'];
    $homeworker_address     = $row['homeworker_address'];
    $driver_name            = $row['driver_name'];
    $driver_nid             = $row['driver_nid'];
    $driver_mobile          = $row['driver_mobile'];
    $driver_address         = $row['driver_address'];
    $pre_landlord_name      = $row['pre_landlord_name'];
    $pre_landlord_address   = $row['pre_landlord_address'];
    $pre_landlord_mobile    = $row['pre_landlord_mobile'];
    $leaving_reason         = $row['leaving_reason'];
    $new_landlord_name      = $row['new_landlord_name'];
    $new_landlord_mobile    = $row['new_landlord_mobile'];
    $start_living_date      = $row['start_living_date'];

  }

include('../mpdf/vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf();

$mpdf->writeHTML('
<div class="pdf_wraper tenant_details_report">


  <table class="lcr" style="width: 100%; margin-bottom: 30px;">
    <tr>
      <td style="border: 1px solid #000; width: 150px; padding: 40px 20px; border-radius: 30%; text-align: center;">
        <div style="font-size: 18px; font-family: nikosh; width: 10px;">
          ভাড়াটিয়ার এককপি পাসপোর্ট সাইজ ছবি
        </div>
      </td>

      <td style="width: 40px; padding: 0 20px; vertical-align: top; padding-top: 10px;">
          <img src="../images/dmp.png" width="60px" />
      </td>

      <td>
         <span style="font-size: 26px; font-family: nikosh; font-weight: bold;">ঢাকা মেট্রোপলিটন পুলিশ</span> <br>
         <span style="font-size: 18px; font-family: nikosh;">বিভাগঃ</span> <br>
         <span style="font-size: 18px; font-family: nikosh;">থানাঃ</span> <br><br>
         <p style="font-size: 24px; font-family: nikosh; font-weight: bold; text-align: center; padding-left: 90px; border-bottom: 1px solid #000;">
            ভাড়াটিয়া নিবন্ধ ফরম
         </p>
      </td>

      <td style="border: 1px solid #000; padding: 10px;">
        <p style="font-size: 18px; font-family: nikosh;">ফ্ল্যাট/তলাঃ <span class="value"> </span></p>
        <p style="font-size: 18px; font-family: nikosh;">বাড়ী/হোলডিং: <span class="value"> </span></p>
        <p style="font-size: 18px; font-family: nikosh;">রাস্তাঃ <span class="value"> </span></p>
        <p style="font-size: 18px; font-family: nikosh;">এলাকাঃ <span class="value"> </span></p>
        <p style="font-size: 18px; font-family: nikosh;">পোস্ট কোডঃ <span class="value"> </span></p>

      </td>
    </tr>
  </table>

  <p><span class="f_title">১. ভাড়াটীয়া/বাড়িয়ালার নাম:</span> <span class="value">'.$tetant_name.'</span> </p>

  <table class="sideByside">
    <tr>
      <td><span class="f_title">২. পিতার নাম:</span> <span class="value">'.$tetant_father.'</span></td>
      <td class="sec_val"><span class="f_title_2">মাতার নাম:</span> <span class="value">'.$tetant_mother.'</span></td>
    </tr>
  </table>

  <p><span class="f_title">৩. বৈবাহিক অবস্থা:</span> <span class="value">'.$tetant_maritial.'</span> </p>
  <p><span class="f_title">৪. স্থায়ী ঠিকানা:</span> <span class="value">'.$tetant_per_address.'</span> </p>
  <p><span class="f_title">৫. পেশা ও প্রতিষ্ঠান/কর্মস্থলের ঠিকানা:</span> <span class="value">'.$tetant_occupation_add.'</span> </p>

  <table class="sideByside" style="width: 100%;">
    <tr>
      <td><span class="f_title">৬. ধর্ম:</span> <span class="value">'.$tetant_religion.'</span></td>
      <td class="sec_val"><span class="f_title_2">শিক্ষাগত যোগ্যতা:</span> <span class="value">'.$tetant_education.'</span></td>
    </tr>
  </table>

  <table class="sideByside">
    <tr>
      <td><span class="f_title">৭. মোবাইল:</span> <span class="value">'.$tetant_mobile.'</span></td>
      <td class="sec_val"><span class="f_title_2">ই-মেইল:</span> <span class="value">'.$tetant_mail.'</span></td>
    </tr>
  </table>

  <p><span class="f_title">৮. জাতীয় পরিচয়পত্রের নম্বর:</span> <span class="value">'.$tetant_nid.'</span> </p>
  <p><span class="f_title">৯. পাসপোর্ট নম্বর (যদি থাকে):</span> <span class="value">'.$tetant_passport.'</span> </p>
  <p><span class="f_title">১০. জরুরি যোগাযোগ:</span> </p>

  <table class="sideByside">
    <tr>
      <td><span class="f_title">নাম:</span> <span class="value">'.$emergency_name.'</span></td>
      <td class="sec_val"><span class="f_title_2">সম্পর্ক:</span> <span class="value">'.$emergency_relation.'</span></td>
    </tr>
    <tr>
      <td><span class="f_title">ঠিকানা:</span> <span class="value">'.$emergency_address.'</span></td>
      <td class="sec_val"><span class="f_title_2">মোবাইল</span> <span class="value">'.$emergency_mobile.'</span></td>
    </tr>
  </table>


  <table class="sideByside">
    <tr>
      <td><span class="f_title">১২. গৃহকর্মীর নাম:</span> <span class="value">'.$homeworker_name.'</span></td>>
      <td class="sec_val"><span class="f_title_2">জাতীয় পরিচয়পত্রের নম্বর:</span> <span class="value">'.$homeworker_nid.'</span></td>
    </tr>
    <tr>
      <td><span class="f_title">মোবাইল:</span> <span class="value">'.$homeworker_mobile.'</span></td>
      <td class="sec_val"><span class="f_title_2">স্থায়ী ঠিকানা:</span> <span class="value">'.$homeworker_address.'</span></td>
    </tr>
  </table>

  <table class="sideByside">
    <tr>
      <td><span class="f_title">১৩. ড্রাইভারের নাম:</span> <span class="value">'.$driver_name.'</span></td>
      <td class="sec_val"><span class="f_title_2">জাতীয় পরিচয়পত্রের নম্বর:</span> <span class="value">'.$driver_nid.'</span></td>
    </tr>
    <tr>
      <td><span class="f_title">মোবাইল:</span> <span class="value">'.$driver_mobile.'</span></td>
      <td class="sec_val"><span class="f_title_2">স্থায়ী ঠিকানা</span> <span class="value">'.$driver_address.'</span></td>
    </tr>
  </table>

  <table class="sideByside">
    <tr>
      <td><span class="f_title">১৪. পূর্ববর্তীর বাড়িওয়ালার নাম:</span> <span class="value">'.$pre_landlord_name.'</span></td>
      <td class="sec_val"><span class="f_title_2">মোবাইল:</span> <span class="value">'.$pre_landlord_mobile.'</span></td>
    </tr>
  </table>

  <p><span class="f_title">ঠিকানা:</span> <span class="value">'.$pre_landlord_address.'</span></p>
  <p><span class="f_title">১৫. পূর্ববর্তীর বাসা ছাড়ার কারন:</span> <span class="value">'.$leaving_reason.'</span></p>

  <table class="sideByside">
    <tr>
      <td><span class="f_title">১৬. বর্তমান বাড়িওয়ালার নাম:</span> <span class="value">'.$new_landlord_name.'</span></td>
      <td class="sec_val"><span class="f_title_2">মোবাইল:</span> <span class="value">'.$new_landlord_mobile.'</span></td>
    </tr>
  </table>

  <p><span class="f_title">১৭. বর্তমান বাড়িতে কোন তারিখ থেকে বসবাস:</span> <span class="value">'.$start_living_date.'</span></p>

  <table class="sideByside" style="margin-top: 20px;">
    <tr>
      <td style="width: 50%; text-align: center;"><p>তারিখ</p></td>
      <td style="width: 50%; text-align: center;"><p>ভাড়াটিয়ার স্বাক্ষর</p></td>
    </tr>
  </table>

</div>

<style>

.pdf_wraper{
  font-family: nikosh;
}

.pdf_wraper p{
  margin: 0;
  margin-bottom: 10px;
}

.pdf_wraper p{
  font-family: nikosh;
}

.pdf_wraper span{
  font-family: nikosh;
}

.f_left{
  float: left;
}

.f_right{
  float: right;
}

.tts p {
	float: left;
	width: 50%;
}

.tts::after{
  clear:both;
}

.em, .same_format_pdf,.same_format_pdf_sing{
  display: flex;

}

.sideByside{
  width: 100%;
}

.sideByside td{
  border: none;
  padding: 5px 0;
  font-family: nikosh;
}

.famTbl{
  width: 100%;
   border-collapse: collapse;
}

.famTbl th, .famTbl td{
  border: 1px solid #000;
  padding: 8px;
  font-family: nikosh;
}



</style>
');


$mpdf->output();

}
 ?>


 <!-- <p><span class="f_title">১১. পরিবার/মেসের সদস্যের বিবরণ:</span> </p>

 <div class="">
   <table class="famTbl">
     <tr>
       <th>ক্রঃনং</th>
       <th>নাম</th>
       <th>সম্পর্ক</th>
       <th>বয়স</th>
       <th>পেশা</th>
       <th>মোবাইল</th>
     </tr>
     <tr>
       <td>১</td>
       <td>ফয়সাল</td>
       <td>ভাই</td>
       <td>12</td>
       <td></td>
       <td>01675187137</td>
     </tr>
   </table>
 </div> -->

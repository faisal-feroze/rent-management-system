<?php include('backend/dbc.php');?>

<?php

if(isset($_POST['tenant_detail'])){
  $tenant_id = $_POST['tenant_id'];

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


  // $sql1 = "SELECT * FROM tenant_family_info WHERE tenant_id = '$tenant_id'";
  // $result1 = mysqli_query($conn,$sql1);
  // $arr_count = 0;
  // $rowcount = mysqli_num_rows($result1);
  // if($rowcount > 0){
  //   while($row1 = mysqli_fetch_assoc($result1)){
  //     $fam_name_arr[$arr_count] = $row1['fam_name'];
  //     $fam_age_arr[$arr_count] = $row1['fam_age'];
  //     $fam_occupation_arr[$arr_count] = $row1['fam_occupation'];
  //     $fam_mobile_arr[$arr_count] = $row1['fam_mobile'];
  //
  //   }
  // }
?>


<div class="rent_template release">
  <p class="content_page_title">Tenant Detail</p>
  <div class="show_tenant">

    <form action="backend/form_handel.php" method="post">
      <input type="hidden" name="tenant_id" value="<?php echo $tenant_id;?>">
      <div class="r_info basic">
        <p class="form_head_title alert alert-dark">Basic Info</p>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="">Name</label>
            <input type="text" class="form-control" id="" name="tanent_name" value="<?php echo $tetant_name;?>">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Father's Name</label>
            <input type="text" class="form-control" id="" name="tenant_father_name" value="<?php echo $tetant_father;?>">
          </div>

          <div class="form-group col-md-6">
            <label for="">Mother's Name</label>
            <input type="text" class="form-control" id="" name="tenant_mother_name" value="<?php echo $tetant_mother;?>" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Date of Birth</label>
            <input type="date" class="form-control" id="" name="tenant_dob" value="<?php echo $tetant_dob;?>">
          </div>

          <div class="form-group col-md-6">
            <label for="">Maritial Status</label>
            <!-- <input type="text" class="form-control" id="" name="tenant_maritial_status" value="<?php //echo $tetant_maritial;?>"> -->
            <select id="" class="form-control" name="tenant_maritial_status" required>
              <option value="<?php echo $tetant_maritial;?>" selected><?php echo $tetant_maritial;?></option>
              <option value="married">Married</option>
              <option value="single">Single</option>
              <option value="widowed">Widowed</option>
              <option value="divorced">Divorced</option>
              <option value="separated">Separated</option>
            </select>
          </div>

        </div>

        <div class="form-group">
          <label for="">Permanent Address</label>
          <input type="text" class="form-control" id="" name="tenant_per_address" value="<?php echo $tetant_per_address;?>">
        </div>

        <div class="form-group">
          <label for="">Occupation and Address</label>
          <input type="text" class="form-control" id="" name="tenant_occupation_add" value="<?php echo $tetant_occupation_add;?>">
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="">Religion</label>
            <!-- <input type="text" class="form-control" id="" name="tenant_religion" value="<?php //echo $tetant_religion;?>"> -->
            <select id="" class="form-control" name="tenant_religion" required>
              <option value="<?php echo $tetant_religion;?>" selected><?php echo $tetant_religion;?></option>
              <option value="Islam">Islam</option>
              <option value="Hinduism">Hinduism</option>
              <option value="Chirstianity">Chirstianity</option>
              <option value="Buddhism">Buddhism</option>
              <option value="Tribal">Tribal</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div class="form-group col-md-4">
            <label for="">Education</label>
            <input type="text" class="form-control" id="" name="tenant_education" value="<?php echo $tetant_education;?>">
          </div>

          <div class="form-group col-md-4">
            <label for="">Mobile</label>
            <input type="text" class="form-control" id="" name="tenant_mobile" value="<?php echo $tetant_mobile;?>">
          </div>
        </div>

        <div class="form-row">

          <div class="form-group col-md-4">
            <label for="">E-mail</label>
            <input type="email" class="form-control" id="" name="tenant_mail" value="<?php echo $tetant_mail;?>">
          </div>

          <div class="form-group col-md-4">
            <label for="">NID</label>
            <input type="text" class="form-control" id="" name="tenant_nid" value="<?php echo $tetant_nid;?>">
          </div>

          <div class="form-group col-md-4">
            <label for="">Passport</label>
            <input type="text" class="form-control" id="" name="tenant_passport" value="<?php echo $tetant_passport;?>">
          </div>
        </div>
    </div>
    <!--******************************** Basic info ends ********************************* -->

    <div class="r_info emergency">
      <p class="form_head_title alert alert-dark">Emergency Communication</p>

      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" id="" name="emergency_name" value="<?php echo $emergency_name;?>">
      </div>

      <div class="form-group">
        <label for="">Address</label>
        <input type="text" class="form-control" id="" name="emergency_address" value="<?php echo $emergency_address;?>">
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="">Relation</label>
          <input type="text" class="form-control" id="" name="emergency_relation" value="<?php echo $emergency_relation;?>">
        </div>

        <div class="form-group col-md-6">
          <label for="">Mobile</label>
          <input type="text" class="form-control" id="" name="emergency_mobile" value="<?php echo $emergency_mobile;?>">
        </div>
      </div>
    </div>
    <!--******************************** Emergency info ends ********************************* -->

    <div class="r_info family">
      <p class="form_head_title alert alert-dark">Family/Mess Member Info</p>
      <div class="member_of_family">
        <?php
        $sql1 = "SELECT * FROM tenant_family_info WHERE tenant_id = '$tenant_id'";
        $result1 = mysqli_query($conn,$sql1);
        $arr_count = 0;
        $rowcount = mysqli_num_rows($result1);
        if($rowcount > 0){
          $count = 0;
          while($row1 = mysqli_fetch_assoc($result1)){
            $fam_name_arr[$arr_count] = $row1['fam_name'];
            $fam_age_arr[$arr_count] = $row1['fam_age'];
            $fam_occupation_arr[$arr_count] = $row1['fam_occupation'];
            $fam_mobile_arr[$arr_count] = $row1['fam_mobile'];
            $fam_relation_arr[$arr_count] = $row1['fam_relation'];
            $count = $arr_count+1;
         ?>
         <div class="fam_member row<?php echo $count;?>">

           <div class="form-row">
             <div class="form-group col-md-3">
               <label for="">Name</label>
               <input type="text" class="form-control" id="" value="<?php echo $fam_name_arr[$arr_count];?>" name="fname[]">
             </div>

             <div class="form-group col-md-2">
               <label for="">Relation</label>
               <input type="text" class="form-control" id="" value="<?php echo $fam_relation_arr[$arr_count];?>" name="frelation[]">
             </div>

             <div class="form-group col-md-1">
               <label for="">Age</label>
               <input type="text" class="form-control" id="" value="<?php echo $fam_age_arr[$arr_count];?>" name="fage[]">
             </div>

             <div class="form-group col-md-2">
               <label for="">Occupation</label>
               <input type="text" class="form-control" id="" value="<?php echo $fam_occupation_arr[$arr_count];?>" name="foccupation[]">
             </div>

             <div class="form-group col-md-2">
               <label for="">Mobile</label>
               <input type="text" class="form-control all_mobile" id="" value="<?php echo $fam_mobile_arr[$arr_count];?>" name="fphone[]">
             </div>

             <div class="form-group col-md-1">
              <?php
                // if($count == 1){
                //   echo" <button type='button' name='add' id='addfm' class='btn btn-primary'>Add Member</button>";
                // }
                //
                // else{
                //  echo "<button type='button' name='add' id='".$count."' class='btn btn_remove btn-danger'>Remove Member</button>";
                // }
              ?>
              <input type="hidden" name="fam_mem_id[]" value="<?php echo $row1['id'];?>">
             </div>

           </div>
         </div>


      <?php $arr_count++; }
        } ?>

      </div>
    </div>

    <!--******************************** Family info ends ********************************* -->


    <div class="r_info homeworker">
      <p class="form_head_title alert alert-dark">Homeworker Info</p>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="">Name</label>
              <input type="text" class="form-control" id="" value="<?php echo $homeworker_name;?>" name="homeworker_name">
            </div>

            <div class="form-group col-md-3">
              <label for="">NID</label>
              <input type="text" class="form-control" id="" value="<?php echo $homeworker_nid;?>" name="homeworker_nid">
            </div>

            <div class="form-group col-md-3">
              <label for="">Mobile</label>
              <input type="text" class="form-control" id="" value="<?php echo $homeworker_mobile;?>" name="homeworker_mobile">
            </div>

            <div class="form-group col-md-3">
              <label for="">Address</label>
              <input type="text" class="form-control" id="" value="<?php echo $homeworker_address;?>" name="homeworker_address">
            </div>

          </div>
    </div>

    <!--******************************** Homeworker info ends ********************************* -->


    <div class="r_info driver">
      <p class="form_head_title alert alert-dark">Driver Info</p>
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="">Name</label>
              <input type="text" class="form-control" id="" value="<?php echo $driver_name;?>" name="driver_name">
            </div>

            <div class="form-group col-md-3">
              <label for="">NID</label>
              <input type="text" class="form-control" id="" value="<?php echo $driver_nid;?>" name="driver_nid">
            </div>

            <div class="form-group col-md-3">
              <label for="">Mobile</label>
              <input type="text" class="form-control" id="" value="<?php echo $driver_mobile;?>" name="driver_mobile">
            </div>

            <div class="form-group col-md-3">
              <label for="">Address</label>
              <input type="text" class="form-control" id="" value="<?php echo $driver_address;?>" name="driver_address">
            </div>

          </div>
    </div>

    <!--******************************** Driver info ends ********************************* -->


    <div class="r_info pre_land_lord">
      <p class="form_head_title alert alert-dark">Previous Landlord Info</p>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="">Previous Landlord Name</label>
              <input type="text" class="form-control" id="" value="<?php echo $pre_landlord_name;?>" name="pre_landlord_name">
            </div>

            <div class="form-group col-md-4">
              <label for="">Address</label>
              <input type="text" class="form-control" id="" value="<?php echo $pre_landlord_address;?>" name="pre_landlord_address">
            </div>

            <div class="form-group col-md-4">
              <label for="">Mobile</label>
              <input type="text" class="form-control" id="" value="<?php echo $pre_landlord_mobile;?>" name="pre_landlord_mobile">
            </div>
          </div>
          <div class="form-group">
            <label for="">Reason for Leaving</label>
            <input type="text" class="form-control" id="" value="<?php echo $leaving_reason;?>" name="reason_leaving_pre_house">
          </div>
    </div>

    <!--******************************** Previous Landlord info ends ********************************* -->

    <div class="r_info present_land_lord">
      <p class="form_head_title alert alert-dark">Present Landlord Info</p>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Name</label>
              <input type="text" class="form-control" id="" value="<?php echo $new_landlord_name;?>" name="new_landlord_name">
            </div>

            <div class="form-group col-md-6">
              <label for="">Mobile</label>
              <input type="text" class="form-control" id="" value="<?php echo $new_landlord_mobile;?>" name="new_landlord_mobile">
            </div>
          </div>
          <div class="form-group">
            <?php

            $sql3 = "SELECT * FROM tenant_flat_map WHERE tenant_id = '$tenant_id'";
            $result3 = mysqli_query($conn,$sql3);
            $rowcount3 = mysqli_num_rows($result3);
            if($rowcount3 > 0){
              while($row3 = mysqli_fetch_assoc($result3)){
                $living_date = $row3['living_date'];
              }
            }
             ?>
            <label for="">Living Date</label>
            <input type="date" class="form-control" id="" value="<?php echo $living_date;?>" name="start_living_date">
          </div>
    </div>

    <!--******************************** Present Landlord info ends ********************************* -->


      <div class="t_info_btn">
        <input class="btn btn-primary" type="submit" name="tanent_update" value="Update">
        <!-- <button type="submit" class="btn btn-primary">Submit Form</button> -->
      </div>

    </form>

    <form target="_blank" class="p_tenanat" action="reports/tenant_info_report.php" method="post">
      <input type="hidden" name="print_tenant_id" value="<?php echo $tenant_id;?>">
      <input class="btn btn-primary" type="submit" name="print_tenant" value="Print">
    </form>

  </div>
</div>

<script>

 $(document).ready(function(){
 	var i= <?php echo $arr_count;?>;
  console.log(i);
 	$('#addfm').click(function(){
    i++;
    var append_code = '<div class="fam_member row'+i+'">'+
      '<div class="form-row">'+
        '<div class="form-group col-md-3">'+
          '<input type="text" class="form-control" id="" placeholder="Name" name="fname[]">'+
        '</div>'+
        '<div class="form-group col-md-2">'+
          '<input type="text" class="form-control" id="" placeholder="Relation" name="frelation[]">'+
        '</div>'+
        '<div class="form-group col-md-1">'+
          '<input type="text" class="form-control" id="" placeholder="Age" name="fage[]">'+
        '</div>'+
        '<div class="form-group col-md-2">'+
          '<input type="text" class="form-control" id="" placeholder="Occupation" name="foccupation[]">'+
        '</div>'+
        '<div class="form-group col-md-2">'+
          '<input type="text" class="form-control all_mobile" id="" placeholder="Mobile, e.g: +8801...." name="fphone[]">'+
        '</div>'+
        '<div class="form-group col-md-1">'+
          '<button type="button" name="add" id="'+i+'" class="btn btn_remove btn-danger">Remove Member</button>'+
        '</div>'+
      '</div>'+
    '</div>';

    $('.member_of_family').append(append_code);

 	});



 	$(document).on('click', '.btn_remove', function(){
 		var button_id = $(this).attr("id");
 		$('.row'+button_id+'').remove();

 	});

  var valid_nid ;
  var valid_phone ;

  $('.all_nid').keyup(function(){
    var nid = $(this).val();
    var nid_len = nid.length;
    //console.log(nid_len);
    if(nid_len == 10 || nid_len == 13 || nid_len == 17 || nid_len == 0){
      //console.log('Valid');
      //$('#addtenant').prop('disabled', false);
      $(this).removeClass('nid_active');
      valid_nid = true;
    }

    else{
      //console.log('INValid');
      $(this).addClass('nid_active');
      //$('#addtenant').prop('disabled', true);
      valid_nid = false;
    }
  });


  $('.all_mobile').keyup(function(){
    var mobile = $(this).val();
    var mobile_len = mobile.length;
    if(mobile_len == 14){
      var mob_val = mobile.slice(0,5);
      if(mob_val == "+8801"){
          console.log(mob_val);
          $(this).removeClass('nid_active');
          valid_phone = true;
      }
      else{
        $(this).addClass('nid_active');
        valid_phone = false;
      }
    }

    else if (mobile_len == 0) {
      $(this).removeClass('nid_active');
      valid_phone = true;
    }

    else{
      $(this).addClass('nid_active');
      valid_phone = false;
    }


  });




  $('#addTenantForm').on('submit', function () {
      // if($('.all_nid').val() == ""){
      //     //$('#errormessage').html("Please provide at least an email ");
      //     alert("Please provide at least an email");
      //     return false;
      // }
      if(valid_nid == false){
        alert("Please provide a valid NID");
        return false;
      }
      else if (valid_phone == false) {
        alert("Please provide a valid Mobile Number");
        return false;
      }
      else {
          return true;
      }
  });






 });

</script>



<?php
} // end of if isset
?>

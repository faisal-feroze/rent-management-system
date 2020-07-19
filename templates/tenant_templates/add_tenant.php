<?php include('backend/dbc.php');?>


<div class="rent_template r_tenant">
  <p class="content_page_title">Tenant Information</p>
  <form id="addTenantForm" action="backend/form_handel.php" method="post" onSubmit="return checkform()">
    <div class="r_info basic">
      <p class="form_head_title alert alert-dark">Basic Info</p>
      <div class="form-row">
        <div class="form-group col-md-12">
          <input type="text" class="form-control" id="" name="tanent_name" placeholder="Name" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <input type="text" class="form-control" id="" name="tenant_father_name" placeholder="Father's Name" required>
        </div>

        <div class="form-group col-md-6">
          <input type="text" class="form-control" id="" name="tenant_mother_name" placeholder="Mother's Name" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <!-- <input type="text" class="form-control" name="" value="Date of Birth" readonly>
          <input type="date" class="form-control" id="" name="tenant_dob" placeholder="Date of Birth"> -->
          <input placeholder="Date of Birth" name="tenant_dob" class="form-control" type="text" onfocus="(this.type='date')" id="date" required>
        </div>

        <div class="form-group col-md-6">
          <select id="" class="form-control" name="tenant_maritial_status" required>
            <option selected>Maritial Status</option>
            <option value="married">Married</option>
            <option value="single">Single</option>
            <option value="widowed">Widowed</option>
            <option value="divorced">Divorced</option>
            <option value="separated">Separated</option>
          </select>
        </div>

      </div>

      <div class="form-group">
        <input type="text" class="form-control" id="" name="tenant_per_address" placeholder="Permanent Address" required>
      </div>

      <div class="form-group">
        <input type="text" class="form-control" id="" name="tenant_occupation_add" placeholder="Occupation and Address of Company" required>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <select id="" class="form-control" name="tenant_religion" required>
            <option selected>Religion</option>
            <option value="Islam">Islam</option>
            <option value="Hinduism">Hinduism</option>
            <option value="Chirstianity">Chirstianity</option>
            <option value="Buddhism">Buddhism</option>
            <option value="Tribal">Tribal</option>
            <option value="Other">Other</option>
          </select>
        </div>

        <div class="form-group col-md-4">
          <input type="text" class="form-control" id="" name="tenant_education" placeholder="Educational Status" required>
        </div>

        <div class="form-group col-md-4">
          <input type="text" class="form-control all_mobile" id="" name="tenant_mobile" placeholder="Mobile, e.g: +8801...." required>
        </div>
      </div>

      <div class="form-row">

        <div class="form-group col-md-4">
          <input type="email" class="form-control" id="" name="tenant_mail" placeholder="E-mail">
        </div>

        <div class="form-group col-md-4">
          <input type="text" class="form-control all_nid" id="nid" name="tenant_nid" placeholder="National ID" required>
        </div>

        <div class="form-group col-md-4">
          <input type="text" class="form-control" id="" name="tenant_passport" placeholder="Passport No">
        </div>
      </div>
  </div>
  <!--******************************** Basic info ends ********************************* -->

  <div class="r_info emergency">
    <p class="form_head_title alert alert-dark">Emergency Communication</p>

    <div class="form-group">
      <input type="text" class="form-control" id="" name="emergency_name" placeholder="Name">
    </div>

    <div class="form-group">
      <input type="text" class="form-control" id="" name="emergency_address" placeholder="Address">
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <input type="text" class="form-control" id="" name="emergency_relation" placeholder="Relation">
      </div>

      <div class="form-group col-md-6">
        <input type="text" class="form-control all_mobile" id="" name="emergency_mobile" placeholder="Mobile, e.g: +8801.....">
      </div>
    </div>
  </div>
  <!--******************************** Emergency info ends ********************************* -->

  <div class="r_info family">
    <p class="form_head_title alert alert-dark">Family/Mess Member Info</p>
    <div class="member_of_family">
      <div class="fam_member">

        <div class="form-row">
          <div class="form-group col-md-3">
            <input type="text" class="form-control" id="" placeholder="Name" name="fname[]">
          </div>

          <div class="form-group col-md-2">
            <input type="text" class="form-control" id="" placeholder="Relation" name="frelation[]">
          </div>

          <div class="form-group col-md-1">
            <input type="text" class="form-control" id="" placeholder="Age" name="fage[]">
          </div>

          <div class="form-group col-md-2">
            <input type="text" class="form-control" id="" placeholder="Occupation" name="foccupation[]">
          </div>

          <div class="form-group col-md-2">
            <input type="text" class="form-control all_mobile" id="" placeholder="Mobile, e.g:+8801....." name="fphone[]">
          </div>

          <div class="form-group col-md-1">
            <button type="button" name="add" id="addfm" class="btn btn-primary">Add Member</button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!--******************************** Family info ends ********************************* -->


  <div class="r_info homeworker">
    <p class="form_head_title alert alert-dark">Homeworker Info</p>
        <div class="form-row">
          <div class="form-group col-md-3">
            <input type="text" class="form-control" id="" placeholder="Name" name="homeworker_name">
          </div>

          <div class="form-group col-md-3">
            <input type="text" class="form-control all_nid" id="" placeholder="NID" name="homeworker_nid">
          </div>

          <div class="form-group col-md-3">
            <input type="text" class="form-control all_mobile" id="" placeholder="Mobile, e.g:+8801....." name="homeworker_mobile">
          </div>

          <div class="form-group col-md-3">
            <input type="text" class="form-control" id="" placeholder="Address" name="homeworker_address">
          </div>

        </div>
  </div>

  <!--******************************** Homeworker info ends ********************************* -->


  <div class="r_info driver">
    <p class="form_head_title alert alert-dark">Driver Info</p>
        <div class="form-row">
          <div class="form-group col-md-3">
            <input type="text" class="form-control" id="" placeholder="Name" name="driver_name">
          </div>

          <div class="form-group col-md-3">
            <input type="text" class="form-control all_nid" id="" placeholder="NID" name="driver_nid">
          </div>

          <div class="form-group col-md-3">
            <input type="text" class="form-control all_mobile" id="" placeholder="Mobile, e.g: +8801......" name="driver_mobile">
          </div>

          <div class="form-group col-md-3">
            <input type="text" class="form-control" id="" placeholder="Address" name="driver_address">
          </div>

        </div>
  </div>

  <!--******************************** Driver info ends ********************************* -->


  <div class="r_info pre_land_lord">
    <p class="form_head_title alert alert-dark">Previous Landlord Info</p>
        <div class="form-row">
          <div class="form-group col-md-4">
            <input type="text" class="form-control" id="" placeholder="Name" name="pre_landlord_name">
          </div>

          <div class="form-group col-md-4">
            <input type="text" class="form-control" id="" placeholder="Address" name="pre_landlord_address">
          </div>

          <div class="form-group col-md-4">
            <input type="text" class="form-control all_mobile" id="" placeholder="Mobile, e.g: +8801...." name="pre_landlord_mobile">
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="" placeholder="Reason for leaving privious home" name="reason_leaving_pre_house">
        </div>
  </div>

  <!--******************************** Previous Landlord info ends ********************************* -->

  <div class="r_info present_land_lord">
    <p class="form_head_title alert alert-dark">Present Landlord Info</p>
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="text" class="form-control" id="" placeholder="Name" name="new_landlord_name" value="<?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?>">
          </div>

          <div class="form-group col-md-6">
            <input type="text" class="form-control all_mobile" id="" value="<?php echo $_SESSION['mobile']; ?>" placeholder="Mobile, e.g: +8801....." name="new_landlord_mobile">
          </div>
        </div>
        <div class="form-group">
          <label for="">Starting Date of Living</label>
          <input type="date" class="form-control" id="" placeholder="Starting Date of living current home" name="start_living_date" required>
        </div>
  </div>

  <!--******************************** Present Landlord info ends ********************************* -->


    <div class="t_info_btn">
      <input id="addtenant" class="btn btn-primary" type="submit" name="tanent_info" value="Submit Form">
      <!-- <button type="submit" class="btn btn-primary">Submit Form</button> -->
    </div>

  </form>
</div>

<script>
 $(document).ready(function(){
 	var i=1;
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

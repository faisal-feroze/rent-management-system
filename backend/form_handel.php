<?php session_start();
include('dbc.php');

if(isset($_POST['building_add'])){

  $b_name   = $_POST['b_name'];
  $b_no     = $_POST['b_no'];
  $area     = $_POST['area'];
  $po       = $_POST['post_office'];
  $district = $_POST['district'];
  $zip      = $_POST['zip'];
  $owner    = $_POST['owner'];
  $mobile = $_POST['owner_mobile'];
  //$ses_id = $_POST['ses_id'];

  $logo = $_FILES['logo']['name']; //isset($_FILES['logo']) && $_FILES['logo'] != ""

if(!empty($logo)){
  //$logo = $_FILES['logo']['name'];
  $tempname = $_FILES['logo']['tmp_name'];
  $target_dir = "../images/".$logo;

  $file_ext=strtolower(end(explode('.',$_FILES['logo']['name'])));
  $extensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }

    else{
      $query = "INSERT INTO building_info(ses_id,name,building_no,area,post_office,district,zip,owner,owner_mobile,logo)
                VALUES('{$_SESSION['id']}','$b_name','$b_no','$area','$po','$district','$zip','$owner','$mobile','$logo')";

      $result = mysqli_query($conn,$query);
      if(!$result){
          die('query failed'.mysqli_error($conn));
      }

      move_uploaded_file($tempname,$target_dir);
      //move_uploaded_file($_FILES[" myimage "][" tmp_name "], "$folder".$_FILES[" myimage "][" name "]);



      header('location:../home.php?act=add_building');

    }
}

else{
  $query = "INSERT INTO building_info(ses_id,name,building_no,area,post_office,district,zip,owner,owner_mobile)
            VALUES('{$_SESSION['id']}','$b_name','$b_no','$area','$po','$district','$zip','$owner','$mobile')";

  $result = mysqli_query($conn,$query);
  if(!$result){
      die('query failed'.mysqli_error($conn));
  }
  header('location:../home.php?act=add_building');

}


}


else if(isset($_POST['flat_add'])){

  $building_id = $_POST['buliding'];
  $flat_no     = $_POST['flat_no'];
  //$flat_name = $_POST['f_name'];
  $floor       = $_POST['floor'];
  $bed         = $_POST['bed'];
  $dinning     = $_POST['dinning'];
  $sq          = $_POST['feet'];
  $bathroom    = $_POST['bathroom'];
  $balcony     = $_POST['balcony'];
  $drawing     = $_POST['drawing'];
  $electric_meter = $_POST['electric_meter'];
  $water_meter = $_POST['water_meter'];
  $electric_ac = $_POST['electricity_ac'];
  $flat_rent = $_POST['flat_rent'];


  $query = "INSERT INTO flat_info(ses_id,building_id,flat_no,floor_no,square_feet,bedrooms,bathrooms,
            dining,drawing,balcony,electric_meter_no,water_meter_no,electricity_ac,flat_rent)
            VALUES('{$_SESSION['id']}','$building_id','$flat_no','$floor','$sq','$bed','$bathroom','$dinning',
            '$drawing','$balcony','$electric_meter','$water_meter','$electric_ac','$flat_rent')";
  $result = mysqli_query($conn,$query);
  if(!$result){
      die('query failed'.mysqli_error($conn));
  }

  header('location:../home.php?act=add_flat');

  echo $building_id;
  echo $flat_no;
}

else if(isset($_POST['tanent_info'])){

  $tetant_name            = $_POST['tanent_name'];
  $tetant_father          = $_POST['tenant_father_name'];
  $tetant_mother          = $_POST['tenant_mother_name'];
  $tetant_dob             = $_POST['tenant_dob'];
  $tetant_maritial        = $_POST['tenant_maritial_status'];
  $tetant_per_address     = $_POST['tenant_per_address'];
  $tetant_occupation_add  = $_POST['tenant_occupation_add'];
  $tetant_religion        = $_POST['tenant_religion'];
  $tetant_education       = $_POST['tenant_education'];
  $tetant_mobile          = $_POST['tenant_mobile'];
  $tetant_mail            = $_POST['tenant_mail'];
  $tetant_nid             = $_POST['tenant_nid'];
  $tetant_passport        = $_POST['tenant_passport'];
  $emergency_name         = $_POST['emergency_name'];
  $emergency_address      = $_POST['emergency_address'];
  $emergency_relation     = $_POST['emergency_relation'];
  $emergency_mobile       = $_POST['emergency_mobile'];
  $homeworker_name        = $_POST['homeworker_name'];
  $homeworker_nid         = $_POST['homeworker_nid'];
  $homeworker_mobile      = $_POST['homeworker_mobile'];
  $homeworker_address     = $_POST['homeworker_address'];
  $driver_name            = $_POST['driver_name'];
  $driver_nid             = $_POST['driver_nid'];
  $driver_mobile          = $_POST['driver_mobile'];
  $driver_address         = $_POST['driver_address'];
  $pre_landlord_name      = $_POST['pre_landlord_name'];
  $pre_landlord_address   = $_POST['pre_landlord_address'];
  $pre_landlord_mobile    = $_POST['pre_landlord_mobile'];
  $leaving_reason         = $_POST['reason_leaving_pre_house'];
  $new_landlord_name      = $_POST['new_landlord_name'];
  $new_landlord_mobile    = $_POST['new_landlord_mobile'];
  $start_living_date      = $_POST['start_living_date'];

  $fam_mem = 0;
  if (isset($_POST["fname"]) && is_array($_POST["fname"])){
      $input_array_name = array_filter($_POST["fname"]);
      foreach($input_array_name as $field_value){
          $fname_arr[$fam_mem] = $field_value;
          $fam_mem++;
      }
    $fam_mem = 0;
  }

  if (isset($_POST["fage"]) && is_array($_POST["fage"])){
      $input_array_age = array_filter($_POST["fage"]);
      foreach($input_array_age as $field_value){
          $fage_arr[$fam_mem] = $field_value;
          $fam_mem++;
      }
    $fam_mem = 0;
  }

  if (isset($_POST["foccupation"]) && is_array($_POST["foccupation"])){
      $input_array_occupation = array_filter($_POST["foccupation"]);
      foreach($input_array_occupation as $field_value){
          $fage_occupation[$fam_mem] = $field_value;
          $fam_mem++;
      }
    $fam_mem = 0;
  }

  if (isset($_POST["fphone"]) && is_array($_POST["fphone"])){
      $input_array_phone = array_filter($_POST["fphone"]);
      foreach($input_array_phone as $field_value){
          $fage_phone[$fam_mem] = $field_value;
          $fam_mem++;
      }
    $fam_mem = 0;
  }

  if (isset($_POST["frelation"]) && is_array($_POST["frelation"])){
      $input_array_relation = array_filter($_POST["frelation"]);
      foreach($input_array_relation as $field_value){
          $fage_relation[$fam_mem] = $field_value;
          $fam_mem++;
      }
    $fam_mem = 0;
  }



  $query = "INSERT INTO tenant_info(
    ses_id,name,father_name,mother_name,t_dob,maritial_status,permanent_address,occupation_address,religion,education,
    mobile,mail,t_nid,passport,emergency_name,emergency_address,emergency_relation,emergency_mobile,
    homeworker_name,homeworker_nid,homeworker_mobile,homeworker_address,driver_name,driver_nid,driver_mobile,
    driver_address,pre_landlord_name,pre_landlord_address,pre_landlord_mobile,leaving_reason,
    new_landlord_name,new_landlord_mobile,start_living_date)
    VALUES('{$_SESSION['id']}','$tetant_name','$tetant_father','$tetant_mother','$tetant_dob','$tetant_maritial','$tetant_per_address',
    '$tetant_occupation_add','$tetant_religion','$tetant_education','$tetant_mobile','$tetant_mail','$tetant_nid',
    '$tetant_passport','$emergency_name','$emergency_address',
    '$emergency_relation','$emergency_mobile','$homeworker_name','$homeworker_nid','$homeworker_mobile',
    '$homeworker_address','$driver_name','$driver_nid','$driver_mobile',
    '$driver_address','$pre_landlord_name','$pre_landlord_address','$pre_landlord_mobile','$leaving_reason',
    '$new_landlord_name','$new_landlord_mobile','$start_living_date')";

    $result = mysqli_query($conn,$query);
    if(!$result){
        die('query failed'.mysqli_error($conn));
    }

    $sql3 = "SELECT id FROM tenant_info WHERE name = '$tetant_name' AND mobile = '$tetant_mobile'";
       $result3 = mysqli_query($conn,$sql3);
       while($row3 = mysqli_fetch_assoc($result3)){
        $tenant_id =  $row3['id'];
      }

    //echo count($fname_arr);

    for($c=0; $c<count($fname_arr); $c++){
      // $family_member_name = $fname_arr[$c];
      // $family_member_age = $fage_arr[$c];
      // $family_member_occupation = $fage_occupation[$c];
      // $family_member_phone = $fage_phone[$c];

      if(!empty($fname_arr[$c])){
        $family_member_name = $fname_arr[$c];
      }
      else{
        $family_member_name = '';
      }

      if(!empty($fage_arr[$c])){
        $family_member_age = $fage_arr[$c];
      }
      else{
        $family_member_age = '';
      }

      if(!empty($fage_occupation[$c])){
        $family_member_occupation = $fage_occupation[$c];
      }
      else{
        $family_member_occupation = '';
      }

      if(!empty($fage_phone[$c])){
        $family_member_phone = $fage_phone[$c];
      }
      else{
        $family_member_phone = '';
      }

      if(!empty($fage_phone[$c])){
        $family_member_relation = $fage_relation[$c];
      }
      else{
        $family_member_relation = '';
      }

      $sql2 = "INSERT INTO tenant_family_info( tenant_id , fam_name , fam_relation, fam_age , fam_occupation , fam_mobile )
      VALUES ('$tenant_id','$family_member_name','$family_member_relation','$family_member_age','$family_member_occupation','$family_member_phone')";
      $result2 = mysqli_query($conn,$sql2);
      if(!$result2){
         die('query failed'.mysqli_error($conn));
     }
    }

  header('location:../home.php?act=tenant_info');

}

else if(isset($_POST['map_tenant'])){
  $building_id = $_POST['buliding'];
  $flat_id     = $_POST['flat'];
  $tanent_id   = $_POST['tenant'];
  //$living_date = $_POST['tenant_living_date'];
  $today = date("d-m-Y");
  $status = 'mapped';

  $query = "INSERT INTO tenant_flat_map(ses_id,building_id,flat_id,tenant_id,status,living_date)
            VALUES('{$_SESSION['id']}','$building_id','$flat_id','$tanent_id','$status','$today')";
  $result = mysqli_query($conn,$query);
  if(!$result){
      die('query failed'.mysqli_error($conn));
  }

  header('location:../home.php?act=map_tenant');


}


  else if(isset($_POST['generate_bill'])){

    $building_id = $_POST['buliding'];
    $flat_id = $_POST['flat'];
    $tenant_id = $_POST['tenant'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $prev_month = $month - 1;
    $generate_bill_date = date("d/m/Y");
    $water = $_POST['g_water'];
    $gas = $_POST['g_gas'];
    $electric = $_POST['g_electric'];
    $rent = $_POST['g_rent'];
    $other = $_POST['g_other'];
    $due = $_POST['g_due'];
    $total = $_POST['g_total'];
    $total_without_rent = $total - $rent;
    $status = 'not_received';
    $note = $_POST['note'];


    $query = "INSERT INTO generate_bill(ses_id,buidling_id, flat_id, tenant_id, g_b_year, g_b_month,
              g_b_date, water_bill, gas_bill, electric_bill, rent_bill, other_bill, due_bill, total_bill,
              total_without_rent, status, note)
              VALUES('{$_SESSION['id']}','$building_id','$flat_id','$tenant_id','$year','$month','$generate_bill_date','$water',
              '$gas','$electric','$rent','$other','$due','$total','$total_without_rent','$status','$note')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die('query failed'.mysqli_error($conn));
    }

    if(isset($_POST['due_in'])){
      $due_in = 'due_in_'.$_POST['due_in'];

      $sql = "UPDATE generate_bill SET status = '$due_in'
              WHERE flat_id = '$flat_id' AND tenant_id ='$tenant_id' AND g_b_year ='$year' AND g_b_month ='$prev_month' AND ses_id ='{$_SESSION['id']}'";
      $result = mysqli_query($conn,$sql);

    }
    // else{
    //   $due_in = "";
    // }
    //
    // if (!empty($due_in)) {
    //   echo $status = 'due_in_'.$due_in.'';
    // }
    //
    // else{
    //   echo $status = 'not_received';
    // }


    header('location:../home.php?act=gen_bill&&gbd='.$generate_bill_date.'&&t_id='.$tenant_id.'&&month='.$month.'');

  }


  else if(isset($_POST['received_bill'])){

    $_generate_id = $_POST['gen_id'];
    $building_id = $_POST['building_id'];
    $flat_id = $_POST['flat_id'];
    $tenant_id = $_POST['tenant_id'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $total = $_POST['total'];
    $received = $_POST['receive'];
    $to_be_received = $_POST['to_be_received'];
    $total_received = $received + $to_be_received;
    $due = $total - $total_received;
    //$received_bill_date = date("d/m/Y");
    $received_bill_date = $_POST['date'];


    if($total == $total_received){

      $query = "INSERT INTO receive_bill(ses_id,gen_bill_id, building_id , flat_id, tenant_id , year,
                month, total, received, due, received_date)
                VALUES('{$_SESSION['id']}','$_generate_id','$building_id','$flat_id','$tenant_id','$year','$month','$total',
                '$total_received','$due','$received_bill_date')";

      $result = mysqli_query($conn,$query);
      if(!$result){
          die('query failed'.mysqli_error($conn));
      }

      $query2 = "INSERT INTO to_be_received(ses_id,gen_id, total , to_be_received, now_due , to_be_received_date)
                VALUES('{$_SESSION['id']}','$_generate_id','$total','$received','$due','$received_bill_date')";

      $result2 = mysqli_query($conn,$query2);
      if(!$result2){
          die('query failed'.mysqli_error($conn));
      }

      $sql = "UPDATE generate_bill SET status = 'received' WHERE id = '$_generate_id'";
      $result = mysqli_query($conn,$sql);

      header('location:../home.php?act=received_bill');

    }

    else if($total > $total_received){

      $query = "INSERT INTO to_be_received(ses_id,gen_id, total , to_be_received, now_due , to_be_received_date)
                VALUES('{$_SESSION['id']}','$_generate_id','$total','$received','$due','$received_bill_date')";

      $result = mysqli_query($conn,$query);
      if(!$result){
          die('query failed'.mysqli_error($conn));
      }

      $sql = "UPDATE generate_bill SET status = 'to_be_received', to_be_received = '$total_received' WHERE id = '$_generate_id'";
      $result = mysqli_query($conn,$sql);

      header('location:../home.php?act=received_bill');

    }

  }


    else if(isset($_POST['release_tenant'])){

        $tanent_map_id = $_POST['tenant_map_id'];
        $release_date = $_POST['release_date'];
        $reason = $_POST['reason'];

        //$year = substr($release_date,6);


        $sql = "UPDATE tenant_flat_map SET status = 'released',release_date = '$release_date', leaving_reason ='$reason'
                WHERE id = '$tanent_map_id'";
        $result = mysqli_query($conn,$sql);

        header('location:../home.php?act=release_tenant');
    }


      else if(isset($_POST['update_building'])){

        $b_name = $_POST['b_name'];
        $b_no = $_POST['b_no'];
        $b_area = $_POST['b_area'];
        $b_po = $_POST['b_po'];
        $b_dist = $_POST['b_dis'];
        $b_zip = $_POST['b_zip'];
        $b_owner = $_POST['b_owner'];
        $b_mobile = $_POST['b_mobile'];
        $b_id = $_POST['b_id'];
        $ses_id = $_POST['ses_id'];

        $sql = "UPDATE building_info SET name = '$b_name',building_no = '$b_no',
                area = '$b_area',post_office = '$b_po',district = '$b_dist',
                zip = '$b_zip',owner = '$b_owner',owner_mobile = '$b_mobile'
                WHERE id = '$b_id'";
        $result = mysqli_query($conn,$sql); ?>

        <script>
          alert("Successfully Updated");
        </script>

      <?php
        header('location:../home.php?act=add_building');


      }

      else if(isset($_POST['flat_update'])){

        $building_id = $_POST['buliding'];
        $flat_no     = $_POST['flat_no'];
        $flat_id     = $_POST['f_id'];
        $floor       = $_POST['floor'];
        $bed         = $_POST['bed'];
        $dinning     = $_POST['dinning'];
        $sq          = $_POST['feet'];
        $bathroom    = $_POST['bathroom'];
        $balcony     = $_POST['balcony'];
        $drawing     = $_POST['drawing'];
        $electric_meter = $_POST['electric_meter'];
        $water_meter = $_POST['water_meter'];
        $electric_ac = $_POST['electricity_ac'];
        $flat_rent = $_POST['flat_rent'];

        $sql = "UPDATE flat_info SET building_id = '$building_id',flat_no = '$flat_no',
                floor_no = '$floor',square_feet = '$sq',bedrooms = '$bed',
                bathrooms = '$bathroom',dining = '$dinning',drawing = '$drawing',
                balcony = '$balcony',electric_meter_no = '$electric_meter',water_meter_no = '$water_meter',
                electricity_ac = '$electric_ac',flat_rent = '$flat_rent'
                WHERE id = '$flat_id'";
        $result = mysqli_query($conn,$sql);
      //  echo 'Falt updated'; ?>

      <script>
        alert('Update Successfully');
      </script>

    <?php    header('location:../home.php?act=flat_detail&&flat_id='.$flat_id.'');
      }


      else if(isset($_POST['tanent_update'])){

        $tetant_id              = $_POST['tenant_id'];
        $tetant_name            = $_POST['tanent_name'];
        $tetant_father          = $_POST['tenant_father_name'];
        $tetant_mother          = $_POST['tenant_mother_name'];
        $tetant_dob             = $_POST['tenant_dob'];
        $tetant_maritial        = $_POST['tenant_maritial_status'];
        $tetant_per_address     = $_POST['tenant_per_address'];
        $tetant_occupation_add  = $_POST['tenant_occupation_add'];
        $tetant_religion        = $_POST['tenant_religion'];
        $tetant_education       = $_POST['tenant_education'];
        $tetant_mobile          = $_POST['tenant_mobile'];
        $tetant_mail            = $_POST['tenant_mail'];
        $tetant_nid             = $_POST['tenant_nid'];
        $tetant_passport        = $_POST['tenant_passport'];
        $emergency_name         = $_POST['emergency_name'];
        $emergency_address      = $_POST['emergency_address'];
        $emergency_relation     = $_POST['emergency_relation'];
        $emergency_mobile       = $_POST['emergency_mobile'];
        $homeworker_name        = $_POST['homeworker_name'];
        $homeworker_nid         = $_POST['homeworker_nid'];
        $homeworker_mobile      = $_POST['homeworker_mobile'];
        $homeworker_address     = $_POST['homeworker_address'];
        $driver_name            = $_POST['driver_name'];
        $driver_nid             = $_POST['driver_nid'];
        $driver_mobile          = $_POST['driver_mobile'];
        $driver_address         = $_POST['driver_address'];
        $pre_landlord_name      = $_POST['pre_landlord_name'];
        $pre_landlord_address   = $_POST['pre_landlord_address'];
        $pre_landlord_mobile    = $_POST['pre_landlord_mobile'];
        $leaving_reason         = $_POST['reason_leaving_pre_house'];
        $new_landlord_name      = $_POST['new_landlord_name'];
        $new_landlord_mobile    = $_POST['new_landlord_mobile'];
        $start_living_date      = $_POST['start_living_date'];

        $fam_mem = 0;
        if (isset($_POST["fname"]) && is_array($_POST["fname"])){
            $input_array_name = array_filter($_POST["fname"]);
            foreach($input_array_name as $field_value){
                $fname_arr[$fam_mem] = $field_value;
                $fam_mem++;
            }
          $fam_mem = 0;
        }

        if (isset($_POST["fage"]) && is_array($_POST["fage"])){
            $input_array_age = array_filter($_POST["fage"]);
            foreach($input_array_age as $field_value){
                $fage_arr[$fam_mem] = $field_value;
                $fam_mem++;
            }
          $fam_mem = 0;
        }

        if (isset($_POST["foccupation"]) && is_array($_POST["foccupation"])){
            $input_array_occupation = array_filter($_POST["foccupation"]);
            foreach($input_array_occupation as $field_value){
                $fage_occupation[$fam_mem] = $field_value;
                $fam_mem++;
            }
          $fam_mem = 0;
        }

        if (isset($_POST["fphone"]) && is_array($_POST["fphone"])){
            $input_array_phone = array_filter($_POST["fphone"]);
            foreach($input_array_phone as $field_value){
                $fage_phone[$fam_mem] = $field_value;
                $fam_mem++;
            }
          $fam_mem = 0;
        }

        if (isset($_POST["frelation"]) && is_array($_POST["frelation"])){
            $input_array_relation = array_filter($_POST["frelation"]);
            foreach($input_array_relation as $field_value){
                $fage_relation[$fam_mem] = $field_value;
                $fam_mem++;
            }
          $fam_mem = 0;
        }

        if (isset($_POST["fam_mem_id"]) && is_array($_POST["fam_mem_id"])){
            $input_array_id = array_filter($_POST["fam_mem_id"]);
            foreach($input_array_id as $field_value){
                $fid_id[$fam_mem] = $field_value;
                $fam_mem++;
            }
          $fam_mem = 0;
        }


          $query = "UPDATE tenant_info SET name = '$tetant_name', father_name = '$tetant_father', mother_name = '$tetant_mother',
                    t_dob = '$tetant_dob', maritial_status = '$tetant_maritial', permanent_address = '$tetant_per_address',
                    occupation_address = '$tetant_occupation_add', religion = '$tetant_religion', education = '$tetant_education',
                    mobile = '$tetant_mobile', mail = '$tetant_mail', t_nid = '$tetant_nid', passport = '$tetant_passport',
                    emergency_name = '$emergency_name', emergency_address = '$emergency_address', emergency_relation = '$emergency_relation',
                    emergency_mobile = '$emergency_mobile', homeworker_name = '$homeworker_name', homeworker_nid = '$homeworker_nid',
                    homeworker_mobile = '$homeworker_mobile', homeworker_address = '$homeworker_address', driver_name = '$driver_name',
                    driver_nid = '$driver_nid', driver_mobile = '$driver_mobile', driver_address = '$driver_address', pre_landlord_name = '$pre_landlord_name',
                    pre_landlord_address = '$pre_landlord_address', pre_landlord_mobile = '$pre_landlord_mobile', leaving_reason = '$leaving_reason',
                    new_landlord_name = '$new_landlord_name', new_landlord_mobile = '$new_landlord_mobile', start_living_date = $start_living_date
                    WHERE id ='$tetant_id'";

          $result = mysqli_query($conn,$query);
          if(!$result){
              die('query failed'.mysqli_error($conn));
          }



          //echo count($fname_arr);

          for($c=0; $c<count($fname_arr); $c++){
            // $family_member_name = $fname_arr[$c];
            // $family_member_age = $fage_arr[$c];
            // $family_member_occupation = $fage_occupation[$c];
            // $family_member_phone = $fage_phone[$c];

            if(!empty($fname_arr[$c])){
              $family_member_name = $fname_arr[$c];
            }
            else{
              $family_member_name = '';
            }

            if(!empty($fage_arr[$c])){
              $family_member_age = $fage_arr[$c];
            }
            else{
              $family_member_age = '';
            }

            if(!empty($fage_occupation[$c])){
              $family_member_occupation = $fage_occupation[$c];
            }
            else{
              $family_member_occupation = '';
            }

            if(!empty($fage_phone[$c])){
              $family_member_phone = $fage_phone[$c];
            }
            else{
              $family_member_phone = '';
            }

            if(!empty($fage_phone[$c])){
              $family_member_relation = $fage_relation[$c];
            }
            else{
              $family_member_relation = '';
            }

            $change_in_id = $fid_id[$c];

            $sql2 = "UPDATE tenant_family_info SET fam_name =  '$family_member_name', fam_relation = '$family_member_relation',
                     fam_age = '$family_member_age', fam_occupation = '$family_member_occupation', fam_mobile = '$family_member_phone'
                     WHERE id = '$change_in_id'";

            $result2 = mysqli_query($conn,$sql2);
            if(!$result2){
               die('query failed'.mysqli_error($conn));
           }
          }

        header('location:../home.php?act=show_tenant');

      }




?>

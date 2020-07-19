<?php include('backend/dbc.php');?>
<div class="rent_template generate_bill">
  <p class="content_page_title"> Generate Bill </p>


  <form action="backend/form_handel.php" method="post">

      <div class="mb-3">
        <label for="">Select Building</label>

        <select class="form-control s_building" name='buliding' required>
          <option value=''>Select Building</option>
          <?php
          $sql = "SELECT * FROM building_info WHERE ses_id = '{$_SESSION['id']}'";
             $result = mysqli_query($conn,$sql);
             //$building_id = $row['id'];
             while($row = mysqli_fetch_assoc($result)){
             echo"
               <option value='".$row['id']."'>".$row['name']." ".$row['building_no']." ".$row['area']." ".$row['post_office']."</option>
               ";
             }
          ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="">Select Flat</label>
        <select class="form-control" name='flat' id="gen_bill_s_flat" required>
          <option value=''>Flat Info: Select Building First</option>
        </select>

      </div>

      <div class="mb-3">
        <label for="">Select Tenant</label>
        <select class="form-control s_tenant" name='tenant' id="gen_bill_tenant" required>
          <option value=''>Tenant Info: Select Building and Flat First</option>
          <?php
          ?>
        </select>
      </div>

      <div class="form-row">
        <div class="mb-3 col-md-6">
          <label for="">Year</label>
          <?php $year = date("Y");  ?>
          <input type="text" class="form-control" id="g_year" name="year" value="<?php echo $year; ?>" readonly>

          <!-- <select class="form-control year" name='year' id="" required>
            <option value='0'>Select Current Year</option>
            <option value='<?php //echo $year;?>'><?php// echo $year;?></option>
          </select> -->

        </div>

        <div class="mb-3 col-md-6">
          <label for="">Month</label>
          <select class="form-control month" name='month' id="gen_month" required>
            <option value=''>Select Month</option>
            <option value='1'>January</option>
            <option value='2'>February</option>
            <option value='3'>March</option>
            <option value='4'>April</option>
            <option value='5'>May</option>
            <option value='6'>June</option>
            <option value='7'>July</option>
            <option value='8'>August</option>
            <option value='9'>September</option>
            <option value='10'>October</option>
            <option value='11'>November</option>
            <option value='12'>December</option>
          </select>
        </div>
      </div>

      <?php

      $sql = "SELECT * FROM settings WHERE ses_id = '{$_SESSION['id']}'";
         $result = mysqli_query($conn,$sql);
         $rowcount = mysqli_num_rows($result);
         if($rowcount>0){
           while($row = mysqli_fetch_assoc($result)){

               $water_bill = $row['water_bill'];
               $gas_bill = $row['gas_bill'];
               $other_bill = $row['other_bill'];
           }
           $total_bill = $water_bill + $gas_bill + $other_bill;
         }
       ?>


      <div class="all_bills">
        <div class="form-row">
          <div class="mb-3 col-md-6">
            <label for="">Rent Bill</label>
            <input type="text" class="form-control" id="g_rent" name="g_rent" value="Choose Flat First" readonly>
          </div>

          <div class="mb-3 col-md-6">
            <label for="">Water Bill</label>
            <input type="text" class="form-control" id="g_water" name="g_water" value="<?php echo $water_bill; ?>" readonly>
          </div>
        </div>

        <div class="form-row">
          <div class="mb-3 col-md-6">
            <label for="">Gas Bill</label>
            <input type="text" class="form-control" id="g_gas" name="g_gas" value="<?php echo $gas_bill; ?>" readonly>
          </div>

          <div class="mb-3 col-md-6">
            <label for="">Others Bill</label>
            <input type="text" class="form-control" id="g_other" name="g_other" value="<?php echo $other_bill; ?>" readonly>
          </div>

          <div class="mb-3 col-md-6">
            <label for="">Electricity Bill</label>
            <input type="number" class="form-control" id="g_electric" name="g_electric" placeholder="add you bill" required>
          </div>

          <div class="mb-3 col-md-6">
            <label for="">Due Bill</label>
            <input type="text" class="form-control" id="g_due" name="g_due" value="0" placeholder="" readonly>
          </div>

          <div class="mb-3 col-md-6">
            <label for="">Total Bill</label>
            <input type="text" class="form-control" id="g_total" name="g_total" value="<?php echo $total_bill; ?>" readonly>
            <input type="hidden" id="g_total_hidden" name="" value="<?php echo $total_bill; ?>">
          </div>

          <div class="mb-3 col-md-6">
            <label for="">Note</label>
            <input type="text" class="form-control" id="note" name="note" value="">
            <!-- <input type="hidden" id="g_total_hidden" name="" value="<?php //echo $total_bill; ?>"> -->
          </div>

        </div>
      </div>
      <input type="hidden" name="due_in" id="due_in" value="">
      <input class="btn btn-primary" type="submit" name="generate_bill" value="Generate Bill">

      <!-- <div class="">
        <a class="btn btn-primary" href="#gen_bill_modal" rel="modal:open">Generate</a>
      </div>

      <div id="gen_bill_modal" class="modal">

        <div class="mb-3">
          <label for="">Water Bill</label>
          <input type="text" class="form-control" id="" name="b_no" placeholder="500" required>
        </div>

        <a href="#" rel="modal:close">sub</a>
      </div> -->

  </form>

  <?php

    if(isset($_GET['gbd'])){
      $gbd = $_GET['gbd'];
      $t_id = $_GET['t_id'];
      $month = $_GET['month'];
      ?>

      <div id="ex1" class="modal">
        <p>Bill Generation Completed. Click 'Detail' to see PDF.</p>
        <a href="home.php?act=gen_bill" id="close_modal" rel="modal:close"></a>
        <a href="reports/generate_bill_report.php?gbd=<?php echo $gbd;?>&&t_id=<?php echo $t_id;?>&&month=<?php echo $month;?>" id="pdf" target="_blank">Detail</a>
      </div>

      <p id="p_to_hidden"><a id="auto_modal" href="#ex1" rel="modal:open"></a></p>


      <script>

      $(document).ready(function() {
        $('#auto_modal').click();

        $('#pdf').click(function(){
          $('#close_modal').click();
          $('#p_to_hidden').hide();
        });
      });

      </script>


<?php  }

   ?>




  <script>

  $(document).ready(function(){

  $(".s_building").change(function(){
      var building_id = $(".s_building option:selected").val();
      $.ajax({
          type: "POST",
          url: "backend/ajax_handle.php",
          data: { building_id : building_id }
      }).done(function(data){
          $("#gen_bill_s_flat").html(data);
          //console.log(data);
      });
  });

  $("#gen_bill_s_flat").change(function(){
      var flat_id = $("#gen_bill_s_flat option:selected").val();
      $.ajax({
          type: "POST",
          url: "backend/ajax_handle.php",
          data: { flat_id : flat_id }
      }).done(function(data){
          $("#gen_bill_tenant").html(data);
          //console.log(data);
      });
  });

  var fixed_total = parseInt($("#g_total_hidden").val());
  var flexible_total;


  $("#gen_bill_tenant").change(function(){
      var flat_id = $("#gen_bill_s_flat option:selected").val();
      var tenant_id = $("#gen_bill_tenant option:selected").val();
      var year = $("#g_year").val();
      var gen_bill_month = 'flag';

      $.ajax({
          type: "POST",
          url: "backend/ajax_handle.php",
          dataType:"JSON",
          data: 'gen_bill_as_month='+gen_bill_month+'&flat='+flat_id+'&tenant_id='+tenant_id+'&year='+year
      }).done(function(data){
          //$("#gen_month").html(data);
          console.log(data);
          var month_value = data.month_val;
          var month_name = data.month_name;
          var due = data.due;
          var due_in = data.due_in;
          var rent_bill = data.rent;
          //console.log(data);

          if(month_value && month_name){
            var month_option = '<option value="'+month_value+'">'+month_name+'</option>';
            $("#gen_month").html(month_option);
          }

          else{
          var month_option ="<option value=''>Select Month</option>"+
            "<option value='1'>January</option>"+
            "<option value='2'>February</option>"+
            "<option value='3'>March</option>"+
            "<option value='4'>April</option>"+
            "<option value='5'>May</option>"+
            "<option value='6'>June</option>"+
            "<option value='7'>July</option>"+
            "<option value='8'>August</option>"+
            "<option value='9'>September</option>"+
            "<option value='10'>October</option>"+
            "<option value='11'>November</option>"+
            "<option value='12'>December</option>";
            $("#gen_month").html(month_option);
          }


          $("#g_due").val(due);
          $("#g_rent").val(rent_bill);

           fixed_total = fixed_total + parseInt(due) + parseInt(rent_bill);
           $("#g_total").val(fixed_total);

           if(due_in){
              $("#due_in").val(due_in);
           }

      });

      // var month = $("#gen_month option:selected").val();
      // console.log(month);


  });


  $("#g_electric").keyup(function(){

    var electric_bil = parseInt($("#g_electric").val());
    //var total_without_electric = parseInt($("#g_total_hidden").val());
    var total_without_electric = fixed_total;

    if(electric_bil){
      total = electric_bil + total_without_electric;
      $("#g_total").val(total);
    }
    else{
      $("#g_total").val(total_without_electric);
    }

  });



});


  </script>


</div>

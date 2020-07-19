<div class="rent_template r_settings">
  <p class="content_page_title"> Settings </p>

  <?php include('backend/dbc.php');?>

  <?php
  if(isset($_POST['setting_submit'])){
    if($_POST['name']=='update_settings'){

      $water = $_POST['water'];
      $gas = $_POST['gas'];
      $other = $_POST['other'];
      $id = $_POST['id'];
      $ses_id = $_POST['ses_id'];

      $sql = "UPDATE settings SET water_bill = '$water', gas_bill = '$gas', other_bill = '$other'
              WHERE id = '$id' AND ses_id ='$ses_id'";
      $result = mysqli_query($conn,$sql);
      //echo $bill;
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

   ?>

<form class='trr1' action='' method='post'>
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">SL#</th>
        <th scope="col">Bill Type</th>
        <th scope="col">Monthly Bill</th>
      </tr>
    </thead>
    <tbody>

  <?php

  $sql = "SELECT * FROM settings WHERE ses_id = '{$_SESSION['id']}'";
     $result = mysqli_query($conn,$sql);
     $rowcount = mysqli_num_rows($result);

     if($rowcount>0){
       $i=1;
      while($row = mysqli_fetch_assoc($result)){
          $id = $row['id'];
          $water = $row['water_bill'];
          $gas = $row['gas_bill'];
          $other = $row['other_bill'];

          // echo"
          //    <tr class='table_settings set_".$row['id']."'>
          //      <th scope='row'>".$i."</th>
          //      <td>".$row['bill_type']."</td>
          //      <td><form class='trr".$row['id']."' action='' method='post'><input class='h_id' type='hidden' value='".$row['id']."' name='id'> <input class='ses_id' type='hidden' value='".$_SESSION['id']."' name='sesid'><input type='text' class='bill_val' name='bill' value='".$row['bill']."'></td>
          //      <td class='mas_update_".$row['id']."'> <input class='btn btn-secondary' id='' type='button' name='setting_submit' value='Update'> </form></td>
          //    </tr>
          //   ";
          //  $i++;
      } ?>

      <tr class='table_settings set_'>
        <th scope='row'>1</th>
        <td>Water Bill</td>
        <td> <input type='text' class='water_val' name='water' value='<?php echo $water;?>'></td>
      </tr>

      <tr class='table_settings set_'>
        <th scope='row'>2</th>
        <td>Gas Bill</td>
        <td> <input type='text' class='gas_val' name='gas' value='<?php echo $gas;?>'></td>
      </tr>

      <tr class='table_settings set_'>
        <th scope='row'>3</th>
        <td>Other Bill</td>
        <td> <input type='text' class='other_val' name='other' value='<?php echo $other;?>'></td>
      </tr>

       </tbody>
    </table>
      <input class='' type='hidden' value='update_settings' name='name'>
      <input class='h_id' type='hidden' value='<?php echo $id;?>' name='id'>
      <input class='ses_id' type='hidden' value='<?php echo $_SESSION['id'];?>' name='ses_id'>
      <input class='btn btn-secondary up' id='' type='submit' name='setting_submit' value='Update'>
    </form>


  <?php   }

     else{?>
       <tr class='table_settings set_'>
         <th scope='row'>1</th>
         <td>Water Bill</td>
         <td> <input type='text' class='water_val' name='water' value='0'></td>
       </tr>

       <tr class='table_settings set_'>
         <th scope='row'>2</th>
         <td>Gas Bill</td>
         <td> <input type='text' class='gas_val' name='gas' value='0'></td>
       </tr>

       <tr class='table_settings set_'>
         <th scope='row'>3</th>
         <td>Other Bill</td>
         <td> <input type='text' class='other_val' name='other' value='0'></td>
       </tr>

        </tbody>
       </table>
       <input class='h_id' type='hidden' value='1' name='id'>
       <input class='h_id' type='hidden' value='insert_settings' name='name'>
       <input class='ses_id' type='hidden' value='<?php echo $_SESSION['id'];?>' name='ses_id'>
       <input class='btn btn-secondary in' id='' type='submit' name='setting_submit' value='Update'>
       </form>

    <?php }

  ?>

</div>


<script>

//$( document ).ready(function() {

// $(".btn ").click(function(){
//
//   var check = $(this).attr('class');
//   var cc = check.slice(17,20);
//
//   if(cc == "up"){
//     var ajax_recognize = 'update_settings';
//   }
//
//   else{
//     var ajax_recognize = 'insert_settings';
//   }
//
//
//
//   var id = $('.h_id').val();
//   var water = $('.water_val').val();
//   var gas = $('.gas_val').val();
//   var other = $('.other_val').val();
// 	var ses_id = $('.ses_id').val();
//
//   console.log(ses_id);
//   console.log(ajax_recognize);
//
//   $.ajax({
//           url: 'backend/ajax_handle.php',
//           type: 'post',
//           data: 'name='+ajax_recognize+'&id='+id+'&water='+water+'&ses_id='+ses_id+'&gas='+gas+'&other='+other,
//           dataType: 'html',
//           success: function(response){
//              $('.h_id').val(response);
//              // console.log(response);
// 						 console.log(response);
//              alert('Successfully Updated.');
//            }
//       });
//
//
// });
//
// });



</script>

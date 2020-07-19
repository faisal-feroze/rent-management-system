<?php session_start(); ?>

<?php

if($_SESSION['id'] != ''){

               if(isset($_SESSION['userid']) && $_SESSION['userid'] != ""){}

                   else{
                        header('Location:logout.php'); //redirect URL
                      }
              }

 else{
    header('Location:logout.php'); //redirect URL
  }


 ?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>


<main class="page-content">
  <div class="container-fluid">
    <?php
    if(isset($_GET['act'])){
      $tamplate = $_GET['act'];
      //echo "hello ".$tamplate;
      if($tamplate == 'add_flat'){
        include 'templates/add_flat.php';
      }

      else if($tamplate == 'gen_bill'){
        include 'templates/gen_bill.php';
      }

      else if($tamplate == 'settings'){
        include 'templates/settings.php';
      }

      else if($tamplate == 'add_building'){
        include 'templates/add_building.php';
      }

      else if($tamplate == 'tenant_info'){
        include 'templates/tenant_info.php';
      }

      else if($tamplate == 'received_bill'){
        include 'templates/received_bill.php';
      }

      else if($tamplate == 'ledger'){
        include 'templates/ledger_report.php';
      }

      else if($tamplate == 'to_be_paid_report'){
        include 'templates/to_be_paid_report.php';
      }

      else if($tamplate == 'dashboard'){
        include 'templates/dashboard.php';
      }

      else if($tamplate == 'flat_detail'){
        include 'templates/flat_details.php';
      }

      else if($tamplate == 'add_tenant'){
        include 'templates/tenant_templates/add_tenant.php';
      }

      else if($tamplate == 'map_tenant'){
        include 'templates/tenant_templates/map_tenant.php';
      }

      else if($tamplate == 'show_tenant'){
        include 'templates/tenant_templates/show_all_tenant.php';
      }

      else if($tamplate == 'release_tenant'){
        include 'templates/tenant_templates/release_tenant.php';
      }

      else if($tamplate == 'tenant_detail'){
        include 'templates/tenant_templates/tenant_detail.php';
      }

      else{
        echo "
        <div class='alert alert-danger' role='alert'>
          Page Not Found !!!
        </div>
        ";
      }
    }

    else{
      include 'templates/dashboard.php';
    }


     ?>

  </div>
</main>


<?php include 'footer.php'; ?>

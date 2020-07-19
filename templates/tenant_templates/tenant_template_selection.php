<?php

if(isset($_POST['add_tenant'])){
  include('add_tenant.php');
}

else if(isset($_POST['map_tenant'])){
  include('map_tenant.php');
}

else if(isset($_POST['release_tenant'])){
  include('release_tenant.php');
}

else if(isset($_POST['show_tenant'])){
  include('show_all_tenant.php');
}




 ?>

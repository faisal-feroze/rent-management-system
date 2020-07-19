<?php include 'header.php'; ?>
<?php include('backend/dbc.php'); ?>

<?php

if(isset($_POST['login'])){

$user = $_POST['user'];
$pass = $_POST['pass'];
$user_name = "";
$password = "";

$query = "SELECT * FROM users WHERE user ='$user' AND password='$pass' ";
$result = mysqli_query($conn,$query);

  while($row = mysqli_fetch_assoc($result)){
     $user_name = $row['user'];
     $password = $row['password'];
     $first_name = $row['first_name'];
     $last_name = $row['last_name'];
     $mobile = $row['mobile'];
     $id = $row['id'];
  }

  if($user_name == $user && $password == $pass){
     session_start();
     $_SESSION['userid'] =$user_name;
     $_SESSION['id'] = $id;
     $_SESSION['first_name'] =$first_name;
     $_SESSION['last_name'] =$last_name;
     $_SESSION['mobile'] = $mobile;

     // echo $_SESSION['id'];
     // echo $_SESSION['userid'];

    header('location:home.php');
  }

  else{
      echo'
      <script>
        alert("User Id or Password is incorrect");
      </script>';

  }

}

?>



<div class="rent_login">
  <div class="login_container">
    <form action="" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">User ID</label>
        <input type="text" class="form-control" name="user" aria-describedby="emailHelp" placeholder="user id" required>
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="pass" placeholder="Password" required>
      </div>
      <button type="submit" name="login" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<?php include 'footer.php'; ?>

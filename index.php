
<?php
include 'api/connection.php';
session_start();
if(isset($_POST['sub'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($con,"select * from login where username = '$username' and password = '$password'");
  $q = mysqli_fetch_assoc($query);


  if(mysqli_num_rows($query)>0){
    $data1 = $q['type'];
    if($data1=='admin'){
      $_SESSION['login_id'] = $q['login_id'];
      header("location:dashboard.php");
    }
    if($data1=='coo'){
      $_SESSION['login_id'] = $q['login_id'];
      $log = $q['login_id'];
      $sts = mysqli_query($con,"select status from coordinators");
      $st =mysqli_fetch_assoc($sts);
      if($st['status']=='1'){
            header("location:coo_dashboard.php");
      }
      else{
        echo "<script>alert('Waiting For Admin Approval');</script>";
      }
    }
    if($data1=='group'){
      $_SESSION['login_id'] = $q['login_id'];
      
            header("location:g_dashboard.php");
      
      
    }
  }
  
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Vali Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Project Tracking</h1>
      </div>
      <div class="login-box">
        <form class="login-form" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" required type="text" placeholder="username" name="username" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" required type="password" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="sub"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div><br>
        <center> <a href="register.php" style="text-align: right;">New Registration</a></center> 
        </form>
       
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>
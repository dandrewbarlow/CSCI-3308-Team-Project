<?php
  session_start();
  // Check if user is logged in
  include('includes/requireLogin.php');
?>
<!-- Webpage for resetting password -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reset Password | Pi In The Sky</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .container-fluid {
      padding-top: 70px;
      padding-bottom: 40px;
  }
  </style>
</head>
<body>

<div class="container-fluid" style="background-image: url('https://wallpaperscraft.com/image/spot_light_faded_dull_47522_2048x1152.jpg'); background-size: cover;">
  <h2 class="text-center">Reset Password</h2>

  <?php include('includes/errors.php') ?>
  
  <form class="form-horizontal" action="includes/reset_password.php" method="post">
    <div class="form-group">
      <label class="col-sm-2 control-label">Old Password</label>
      <div class="col-sm-10">
        <input class="form-control" id="password_old" name="password_old" type="password" placeholder="Click to enter old password...">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">New Password</label>
      <div class="col-sm-10">
        <input class="form-control" id="password_new1" name="password_new1" type="password" placeholder="Click to enter new password...">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Repeat New Password</label>
      <div class="col-sm-10">
        <input class="form-control" id="password_new2" name="password_new2" type="password" placeholder="Click to re-enter new password...">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="reset-password" class="btn btn-success">Submit</button>
      </div>
    </div>
  </form>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
</body>
</html>

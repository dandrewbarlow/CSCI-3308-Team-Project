<?php
  session_start();
  // Check if user is logged in
  include('includes/requireLogin');
  // Check if user is superuser
  if($_SESSION['superuser'] != 1){
    $_SESSION['msg']="You do not have privileges";
    header('location: ../index.php');
  }
  // Includes new user registration module
  include('includes/requireSuperuser.php');
  include('includes/register_user.php');
?>
<!-- Webpage for registering new user -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register | Pi In The Sky</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .container-fluid {
      padding-top: 70px;
      padding-bottom: 305px;
  }
  </style>
</head>
<body>

<div class="container-fluid" style="background-image: url('https://www.talonx.com/file/2013/09/polyagonal-web-design.jpg'); background-size: cover;">
  <h2 class="text-center">Register New User</h2>

  <?php include('includes/errors.php') ?>

  <form class="form-horizontal" action="register.php" method="post">
    <div class="form-group">
      <label class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
        <input class="form-control" id="name" name="name" type="text" placeholder="Click to enter name...">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input class="form-control" id="email" name="email" type="text" placeholder="Click to enter email...">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Username</label>
      <!--<li><a href="#" title="Username" data-toggle="popover" data-trigger="focus" data-placement="right" data-content="Make up a unique username that you will remember">?</a></li>-->
      <div class="col-sm-10">
        <input class="form-control" id="username" name="username" type="text" placeholder="Click to enter username...">  
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input class="form-control" id="password1" name="password1" type="password" placeholder="Click to enter password...">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Repeat Password</label>
      <div class="col-sm-10">
        <input class="form-control" id="password2" name="password2" type="password" placeholder="Click to re-enter password...">
      </div>
    </div>
    <div class="form-group">
      <label>Is the new user also a superuser?</label>
      <div class="col-sm-10">
        <input class="form-control" id="superuser" name="superuser" type="text" placeholder="Click to enter password...">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="register" class="btn btn-success">Submit</button>
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

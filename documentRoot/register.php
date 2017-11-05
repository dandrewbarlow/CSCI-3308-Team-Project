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
  /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      background-image: url(http://www.powerpointhintergrund.com/uploads/2017/05/blue-sky-background-with-a-tiny-clouds-qla-consulting-24.jpeg);
      background-size: cover;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #B0E2FF;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
        <ul class="nav navbar-nav">
          <li><a href="#">Home</a></li>
          <li class="active">
              <a href="/register.php">Create a New User</a>
          </li>
          <li>
              <a href="/allUsers.php">Manage users</a>
          </li>
          <li>
              <a href="/reset.php">Reset Password</a>
          </li>
          <li>
              <a href="/userSites.php">Manage websites</a>
          </li>
          <li>
              <a href="/includes/restart_server.php">Restart the server</a>
          </li>
          <li>
              <a href="/userSites.php">Manage Your Websites</a>
          </li>
          <li>
              <a href="storage.php">Upload and Download Files</a>
          </li>
        </ul>
    </div>
  </nav>

<div class="container-fluid" style="background-image: url('https://www.talonx.com/file/2013/09/polyagonal-web-design.jpg'); background-size: cover;">
  <h2 class="text-center">Register New User</h2>

  <?php include('includes/errors.php') ?>

  <form class="form-horizontal" action="register.php" method="post">
    <div class="form-group">
      <label class="col-sm-2 control-label col-sm-offset-2">Name</label>
      <div class="col-sm-4">
        <input class="form-control" id="name" name="name" type="text" placeholder="Click to enter name...">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label col-sm-offset-2">Email</label>
      <div class="col-sm-4">
        <input class="form-control" id="email" name="email" type="text" placeholder="Click to enter email...">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label col-sm-offset-2">Username</label>
      <div class="col-sm-4">
        <input class="form-control" id="username" name="username" type="text" placeholder="Click to enter username...">  
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label col-sm-offset-2">Password</label>
      <div class="col-sm-4">
        <input class="form-control" id="password1" name="password1" type="password" placeholder="Click to enter password...">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label col-sm-offset-2">Repeat Password</label>
      <div class="col-sm-4">
        <input class="form-control" id="password2" name="password2" type="password" placeholder="Click to re-enter password...">
      </div>
    </div>
    <div class="form-group">
      <label for="superuser" class="col-sm-2 control-label col-sm-offset-2">Is new user a superuser?</label>
      <div class="col-sm-4">
        <input type="checkbox" name="superuser" id="superuser" value="true">Yes
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-4">
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

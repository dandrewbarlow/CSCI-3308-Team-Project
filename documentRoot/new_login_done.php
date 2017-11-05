<?php
  session_start();
  // If already logged in, redirect to home page
  if (isset($_SESSION['username'])) {
    header('location: home.php');
  }
  include('includes/login.php')
?>
<!-- Login Page -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | Pi In The Sky</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .container-fluid {
      padding-top: 150px;
      padding-bottom: 453px;
  }


  </style>
</head>
<body>

<div class="container-fluid" style="background-image: url('http://www.almamushi.com/wp-content/uploads/2015/08/cloud-background-resized3-vail-blue-sky-limo.jpg'); background-size: cover; overflow-x: hidden;">
  <h2 class="text-center" style="text-color: #FFF">Pi In The Sky</h2>

  <?php include('includes/errors.php') ?>

  <form class="form-horizontal" action="index.php">
    <div class="form-group">
      <div class="col-lg-10 col-sm-offset-1">
        <label class="col-sm-2 col-sm-offset-2 control-label">Username</label>
        <div class="col-sm-4 ">
          <input class="form-control" id="username" name="username" type="text" placeholder="Click to enter username...">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-sm-offset-1">
        <label class="col-sm-2 col-sm-offset-2 control-label">Password</label>
        <div class="col-sm-4">
          <input class="form-control" id="password" name="password" type="password" placeholder="Click to enter password...">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-offset-3 col-sm-10">
        <button type="submit" name="login" class="btn btn-success">Submit</button>
      </div>
    </div>
  </form>

</body>
</html>

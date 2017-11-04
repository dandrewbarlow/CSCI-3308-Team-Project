<?php
    session_start();
    // Check whether the user is logged in
    include('includes/requireLogin.php');
?>
<!-- Home page for a logged in user -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home | Pi In The Sky</title>

    <!-- Bootstrap core CSS -->
    <!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Custom styles for this template -->
    <link href="simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
        <!-- Notification Message: Appears only the first time during any session -->
        <?php if (isset($_SESSION['msg'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <?php  if (isset($_SESSION['username'])) : ?>

        <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">
                            Main Operations
                        </a>
                    </li>
                    <li>
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
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-log-in"></span>Logout</a>
                    </li>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                
                <div class="container-fluid text-center " style="color: #000;">
                    <h1>Welcome <strong><?php echo $_SESSION['username']; ?></strong> To Pi In The Sky!</h1>
                    <p>This is where you can apply all the functionality of your server. /more info...</p>
                    
                    <a href="#menu-toggle" class="btn btn-success" id="menu-toggle">Click me to navigate</a>
                </div>
            </div>
        <?php endif ?>
        
        <!-- /#page-content-wrapper -->

    </div>
    <footer class="container-fluid text-center" style="margin-top: 475px">
    <p>© The Pi.in.the.Sky Team</p>
    <form action="includes/logout.php" method="post" style="margin-left:10px;">
        <button type="submit" name="logout" class="btn btn-danger">Logout</button>
    </form>
    </footer>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

    

</body>

</html>
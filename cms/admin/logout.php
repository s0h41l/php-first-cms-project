<?php include 'includes/header.php' ?>
<?php


    if(isset($_GET['log_id'])){

      $logOut=$_GET['log_id'];
      $logOut=mysqli_real_escape_string($connection,$logOut);

        $_SESSION['username']=null;
        $_SESSION['first_name']=null;
        $_SESSION['last_name']=null;
        $_SESSION['user_role']=null;
        $_SESSION['user_id']=null;
        header('location:../index.php');

    }
    ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'includes/navbar.php' ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'] ?>

                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php include 'includes/footer.php' ?>

</body>

</html>

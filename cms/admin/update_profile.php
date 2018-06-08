<?php include 'includes/header.php' ?>
<?php
    if(isset($_POST['update_profile_submit'])){
      $user_id=$_SESSION['user_id'];
      $username=$_POST['username'];
      $fname=$_POST['f_name'];
      $lname=$_POST['l_name'];
      $password=$_POST['password'];
      $c_password=$_POST['c_password'];
      $email=$_POST['email'];
      $role=$_POST['user_role'];
      $image=$_FILES['user_dp']['name'];
      $image_temp=$_FILES['user_dp']['tmp_name'];
      $check = getimagesize($_FILES['user_dp']['tmp_name']);
      if($check !== false) {
      move_uploaded_file($image_temp,"../images/users_dp/$image");
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    $query="UPDATE users SET username='$username' , email='$email', user_role='$role', first_name='$fname', last_name='$lname', password='$password', user_image='$image' WHERE user_id='$user_id'";
    mysqli_query($connection,$query);
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
                            Update Profile

                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                    <div class="container-fluid">
                      <?php
                          $user_id=$_SESSION['user_id'];
                          $query="SELECT * FROM users WHERE user_id='$user_id'";
                          $result=mysqli_query($connection,$query);
                          $result=mysqli_fetch_assoc($result);
                          $username=$result['username'];
                          $fname=$result['first_name'];
                          $lname=$result['last_name'];
                          $password=$result['password'];
                          $email=$result['email'];
                          $image=$result['user_image'];
                       ?>
                      <form class="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="f_name">First Name</label>
                          <input class="form-control" type="text" name="f_name" value="<?php echo $fname ?>">
                        </div>
                        <div class="form-group">
                          <label for="l_name">Last Name</label>
                          <input class="form-control" type="text" name="l_name" value="<?php echo $lname ?>">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input class="form-control" type="text" name="email" value="<?php echo $email ?>">
                        </div>
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input class="form-control" type="text" name="username" value="<?php echo $username ?>">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input class="form-control" type="password" name="password" value="<?php echo $password ?>">
                        </div>
                        <div class="form-group">
                          <label for="c_password">Confirm Password</label>
                          <input class="form-control" type="password" name="c_password" value="<?php echo $password ?>">
                        </div>
                        <div class="form-inline">
                          <label for="dp">Profile Picture</label>
                          <input class="form-control" type="file" name="user_dp">
                          <img src="../images/users_dp/<?php echo $image ?>" style="width:50px;" class="img-circle">
                        </div>
                        <div class="input-group">
                          <label for="user_role">User Role</label>
                          <select class="form-control" name="user_role">
                            <option value="admin">Admin</option>
                            <option value="subscriber">Subscriber</option>


                          </select>
                        </div>
                        <br>
                        <div class="form-group">
                          <input class="btn btn-primary btn-block" type="submit" name="update_profile_submit" value="Update Profile">
                        </div>
                      </form>

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

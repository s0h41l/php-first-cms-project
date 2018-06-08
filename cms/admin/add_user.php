<?php include 'includes/header.php' ?>
<?php

    if(isset($_POST['add_user'])){
      $user_first_name=$_POST['user_first_name'];
      $user_last_name=$_POST['user_last_name'];
      $username=$_POST['user_name'];
      $password=$_POST['user_password'];
      $email=$_POST['user_email'];
      $user_role=$_POST['user_role'];
      $user_status=$_POST['user_status'];
      $image=$_FILES['user_dp']['name'];
      $image_temp=$_FILES['user_dp']['tmp_name'];
      $check = getimagesize($_FILES["user_dp"]["tmp_name"]);

    $exist_query="SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result=mysqli_query($connection,$exist_query);
    $count=mysqli_num_rows($result);
    if($count){
    }else{
      if($check !== false) {
      move_uploaded_file($image_temp,"../images/users_dp/$image");

    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
      $query="INSERT INTO users (username,password,first_name,last_name,email,user_role,user_status,user_reg_date,user_image)";
      $query.="VALUES ('$username','$password','$user_first_name','$user_last_name','$email','$user_role','$user_status',now(),'$image')";
      mysqli_query($connection,$query);
    }

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
                            Posts
                            <small>Admin</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        <div class="container-fluid">
                          <form class="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="user_first_name">Name</label>
                              <input class="form-control" type="text" name="user_first_name" placeholder="Sohail">
                            </div>
                            <div class="form-group">
                              <label for="user_last_name">Last Name</label>
                              <input class="form-control" type="text" name="user_last_name" placeholder="Khn">
                            </div>
                            <div class="form-group">
                              <label for="user_email">Email</label>
                              <input class="form-control" type="email" name="user_email" placeholder="example@gmail.com">
                            </div>
                            <div class="form-group">
                              <label for="user_name">Username</label>
                              <input class="form-control" type="text" name="user_name" placeholder="sohailkhan.sk">
                            </div>
                            <div class="form-group">
                              <label for="user_name">Password</label>
                              <input class="form-control" type="password" name="user_password" placeholder="***********">
                            </div>
                            <div class="input-group">
                              <label for="post_category">User Role</label>
                              <select class="form-control" name='user_role'>
                                  <option value="admin">Admin</option>
                                  <option value="substriber">Substriber</option>
                              </select>
                            </div>

                            <div class="input-group">
                              <label for="user_status">User Status</label>
                              <select class="form-control" name='user_status'>
                                <option name='option_1'>Approve</option>
                                <option name='option_1'>Disapprove</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="user_dp">User Profile Pic</label>
                              <input type="file" name="user_dp">
                            </div>
                              <input class="btn btn-success btn-block" type="submit" name="add_user" value="Add User">
                          </form>

                          </div>

                        </div>
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

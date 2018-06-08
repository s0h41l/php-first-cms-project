<?php include 'includes/header.php' ?>
<?php

    if(isset($_GET['delete_id'])){
      $del_id=$_GET['delete_id'];
      $query="DELETE FROM users WHERE user_id='$del_id'";
      mysqli_query($connection,$query);
    }
    
    if(isset($_GET['approve_id'])){
      $id=mysqli_real_escape_string($connection,$_GET['approve_id']);
      $query="UPDATE users SET user_status='approve' WHERE user_id='$id'";
      mysqli_query($connection,$query);

    }

    if(isset($_GET['disapprove_id'])){
      $id=mysqli_real_escape_string($connection,$_GET['disapprove_id']);
      $query="UPDATE users SET user_status='disapprove' WHERE user_id='$id'";
      mysqli_query($connection,$query);
    }

    ?>
<h1></h1>
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
                        <div class="container-fluid" id="cat_container">
                          <table class="table" border='1'>
                            <thead class="t-head">
                              <th>ID</th>
                              <th>Username</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Profile Photo</th>
                              <th>User Role</th>
                              <th>User Status</th>
                              <th>Approve</th>
                              <th>Disapprove</th>
                              <th>Action</th>
                            </thead>
                            <tbody>
                              <?php
                                  $query="SELECT * FROM users";
                                  $rresult=mysqli_query($connection,$query);
                                  while($row=mysqli_fetch_assoc($rresult)){
                                    ?>
                              <tr>
                                <td><?php echo $row['user_id'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['first_name'] ?></td>
                                <td><?php echo $row['last_name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><img src="../images/users_dp/<?php echo $row['user_image'] ?>" style="width:100px"></td>
                                <td><?php echo $row['user_role'] ?></td>
                                <td><?php echo $row['user_status'] ?></td>
                                <td><a href="users.php?approve_id=<?php echo $row['user_id'] ?>">Approve</a></td>
                                <td><a href="users.php?disapprove_id=<?php echo $row['user_id'] ?>">Disapprove</a></td>
                                <td><a href="users.php?delete_id=<?php echo $row['user_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                              </tr>
                              <?php } ?>

                            </tbody>
                          </table>

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

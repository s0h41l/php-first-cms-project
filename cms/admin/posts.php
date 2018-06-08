<?php include 'includes/header.php' ?>
<?php

    if(isset($_GET['delete_id'])){
      $del_id=$_GET['delete_id'];
      $query="DELETE FROM post WHERE post_id='$del_id'";
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
                              <th>Id</th>
                              <th>Auther</th>
                              <th>Title</th>
                              <th>Category</th>
                              <th>Status</th>
                              <th>Image</th>
                              <th>Tags</th>
                              <th>Comments</th>
                              <th>Time</th>
                              <th>Action</th>
                            </thead>
                            <tbody>

                              <?php
                                  $query="SELECT * FROM post";
                                  $result=mysqli_query($connection,$query);
                                  while ($row=mysqli_fetch_assoc($result)) {
                                    ?>
                              <tr>
                                <td><?php echo $row['post_id'] ?></td>
                                <td><?php echo $row['post_auther'] ?></td>
                                <td><?php echo $row['post_title'] ?></td>


                                <?php
                                    $id=$row['post_category_id'];
                                    $inside_query="SELECT * FROM categories Where cat_id='$id'";
                                    $rs=mysqli_fetch_assoc(mysqli_query($connection,$inside_query));
                                 ?>
                                <td><?php echo $rs['cat_title'] ?></td>
                                <td><?php echo $row['post_status'] ?></td>
                                <td><img src="../images/<?php echo $row['post_image'] ?>" alt="" style='width:100px'></td>
                                <td><?php echo $row['post_tags'] ?></td>
                                <td><?php echo $row['post_comment_count'] ?></td>
                                <td><?php echo $row['post_date'] ?></td>
                                <td><a href="update_post.php?update_id=<?php echo $row['post_id'] ?>" class="btn btn-Success"><i class="fa fa-edit"></i></a>
                                  <a href="posts.php?delete_id=<?php echo $row['post_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                              <?php   } ?>
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

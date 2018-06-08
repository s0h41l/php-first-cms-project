<?php include 'includes/header.php' ?>
<?php
    if(isset($_GET['comment_delete_ID'])){
      $ID=mysqli_real_escape_string($connection,$_GET['comment_delete_ID']);
      $query="DELETE FROM comments WHERE comment_id='$ID'";
      mysqli_query($connection,$query);
    
    }
    if(isset($_GET['comment_approve_ID'])){
      $ID=mysqli_real_escape_string($connection,$_GET['comment_approve_ID']);
      $query="UPDATE comments SET comment_status='approve' WHERE comment_id='$ID'";
      mysqli_query($connection,$query);
    }
    if(isset($_GET['comment_disapprove_ID'])){
      $ID=mysqli_real_escape_string($connection,$_GET['comment_disapprove_ID']);
      $query="UPDATE comments SET comment_status='disapprove' WHERE comment_id='$ID'";
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
                            Comments
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
                              <th>Post</th>
                              <th>Auther</th>
                              <th>Email</th>
                              <th>Comment</th>

                              <th>Status</th>
                              <th>Date</th>
                              <th>Approve</th>
                              <th>Unapprove</th>
                              <th>Action</th>
                            </thead>
                            <tbody>
                              <?php
                                  $query="SELECT * FROM comments";
                                  $result=mysqli_query($connection,$query);
                                  while ($row=mysqli_fetch_assoc($result)) {
                                    ?>
                              <tr>
                                <td><?php echo $row['comment_id'] ?></td>

                                <?php
                                    $p_id=$row['comment_post_id'];
                                    $query2="SELECT * FROM post WHERE post_id='$p_id'";
                                    $result2=mysqli_fetch_assoc(mysqli_query($connection,$query2));
                                 ?>

                                <td><?php echo $result2['post_title']  ?></td>
                                <td><?php echo $row['comment_auther'] ?></td>
                                <td><?php echo $row['comment_email'] ?></td>
                                <td><?php echo $row['comment_content'] ?></td>
                                <td><?php echo $row['comment_status'] ?></td>
                                <td><?php echo $row['comment_date'] ?></td>
                                <td><a class="nav-link" href="comments.php?comment_approve_ID=<?php echo $row['comment_id'] ?>">Approve</a></td>
                                <td><a href="comments.php?comment_disapprove_ID=<?php echo $row['comment_id'] ?>">Disapprove</a></td>
                                <td><a class="btn btn-danger" style="margin-left:7px" href="comments.php?comment_delete_ID=<?php echo $row['comment_id'] ?>"><i class="fa fa-trash"></i></a></td>
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

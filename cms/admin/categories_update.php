<?php include 'includes/header.php' ?>
<?php
    if(isset($_POST['cat_update_submit'])){

      $update_id=$_GET['id'];
      $cat_name_update=mysqli_real_escape_string($connection,$_POST['cat_submit_entry_update']);
      $cat_link_update=mysqli_real_escape_string($connection,$_POST['cat_submit_entry_link_update']);
      $query="UPDATE categories SET cat_title='$cat_name_update' , cat_link='$cat_link_update' WHERE cat_id='$update_id'";
      if(!mysqli_query($connection,$query)){
        die('failed to update');
     }
     header('location:categories.php');
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
                            Update Categories
                            <small>Admin</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        <div class="container-fluid" id="cat_container">
                          <div class="row">
                            <div class="col-sm-6">
                              <form class="form-inline" method="post">
                                <input type="text" class="form-control" name="cat_submit_entry_update" placeholder="Enter Category" id="cat_enter">
                                <input type="text" class="form-control" name="cat_submit_entry_link_update" placeholder="Enter link" id="cat_enter">
                                <input type="submit" class="btn btn-success" name="cat_update_submit" value="Update" id="cat_enter">
                              </form>

                            </div>
                            <div class="col-sm-6">
                              <div>
                                <table class="table">
                                  <thead class="t-head">
                                    <th >Category ID</th>
                                    <th>Category Tile</th>
                                    <th>Action</th>
                                  </thead>
                                  <tbody class="t-body">

                                      <?php
                                          $query="SELECT * FROM categories";
                                          $result=mysqli_query($connection,$query);
                                          while($row=mysqli_fetch_assoc($result)){
                                            ?>

                                    <tr>
                                      <td><?php echo $row['cat_id'] ?></td>
                                      <td><a href="<?php echo $row['cat_link'] ?>"><?php echo $row['cat_title']?></a></td>
                                      <td>
                                      <a class="btn btn-primary" href="categories_update.php?id=<?php echo $row['cat_id']?>"><i class="fa fa-edit"></i></a>
                                      <a class="btn btn-danger" href="categories.php?id=<?php echo $row['cat_id']?>"><i class="fa fa-trash"></i></a>

                                    </td>
                                    </tr>
                                    <?php } ?>


                                  </tbody>
                                </table>

                              </div>
                            </div>

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

<?php include 'includes/header.php' ?>
<?php


    $message="";
    if(isset($_POST['cat_submit'])){

      if($_POST['cat_submit_entry']!=""){
        $cat_name=mysqli_real_escape_string($connection,$_POST['cat_submit_entry']);
        $cat_link=mysqli_real_escape_string($connection,$_POST['cat_submit_entry_link']);
        $query="INSERT INTO categories (cat_title,cat_link) VALUES ('$cat_name','$cat_link')";
        if(mysqli_query($connection,$query)){
          $message="Success";
        }else{
          $message="Failed";
        };
        echo $message;
      }
    }
    if(isset($_GET['id'])){
      $del_id=$_GET['id'];
      $query="DELETE FROM categories WHERE cat_id='$del_id'";
      mysqli_query($connection,$query);

    }
    //Delete Category



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
                            Categories
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
                                <input type="text" class="form-control" name="cat_submit_entry" placeholder="Enter Category" id="cat_enter">
                                <input type="text" class="form-control" name="cat_submit_entry_link" placeholder="Enter link" id="cat_enter">
                                <input type="submit" class="btn btn-success" name="cat_submit" value="Add" id="cat_enter">

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

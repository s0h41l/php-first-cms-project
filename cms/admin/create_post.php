<?php include 'includes/header.php' ?>
<?php

    if(isset($_POST['post_submit'])){
      $title=$_POST['post_title'];
      $auther_name=$_POST['post_auther'];
      $category=$_POST['category_id'];
      $status=$_POST['post_status'];
      $tags=$_POST['post_tags'];
      $content=$_POST['post_content'];
      $timeDate=Date("Y-m-d H:i:s");
      $post_comment_count=0;
      $image=$_FILES['post_image']['name'];
      $image_temp=$_FILES['post_image']['tmp_name'];
      move_uploaded_file($image,'/images/$image');
      $check = getimagesize($_FILES["post_image"]["tmp_name"]);
      if($check !== false) {
      move_uploaded_file($image_temp,"../images/$image");

    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    $query="INSERT INTO post (post_category_id,post_title, post_auther, post_date, post_image, post_content, post_tags, post_status, post_comment_count)";
    $query.="VALUES('$category','$title','$auther_name',now(),'$image','$content','$tags','$status','$post_comment_count')";
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
                              <label for="post_title">Post title</label>
                              <input class="form-control" type="text" name="post_title" placeholder="Aerotechnics">
                            </div>
                            <div class="input-group">


                              <label for="post_category">Post Category</label>
                              <select class="form-control" name='category_id'>
                                <?php
                                    $query='SELECT * FROM categories';
                                    $result=mysqli_query($connection,$query);
                                    while ($row=mysqli_fetch_assoc($result)) {
                                      ?>
                                  <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_title'] ?></option>

                                <?php  } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="post_auther">Post Auther</label>
                              <input class="form-control" type="text" name="post_auther" placeholder="Aerotechnics">
                            </div>
                            <div class="input-group">
                              <label for="post_status">Post Status</label>
                              <select class="form-control" name='post_status'>
                                <option name='option_1'>Online</option>
                                <option name='option_1'>Offline</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="post_tags">Post Tags</label>
                              <input class="form-control" type="text" name="post_tags" placeholder="Aerotechnics">
                            </div>
                            <div class="form-group">
                              <label for="post_image">Post Image</label>
                              <input type="file" name="post_image">
                            </div>
                            <div class="form-group">
                              <label for="post_title">Post Content</label>
                              <textarea class="form-control" rows="8" cols="180" id ="editor" name="post_content"></textarea>
                            </div>
                              <input class="btn btn-success btn btn-block" type="submit" name="post_submit" placeholder="Add Post">

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

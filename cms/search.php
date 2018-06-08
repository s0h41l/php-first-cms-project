<html lang="en">
<?php include "includes/header.php" ?>
<body>

    <!-- Navigation -->
    <?php include "includes/navbar.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
              <?php
              if(isset($_POST['search_text'])){
                $search_key=$_POST['search_text'];
                $search_key=mysqli_real_escape_string($connection,$search_key);
                $query="SELECT * FROM post WHERE post_tags LIKE '%$search_key%'";
                $search_result=mysqli_query($connection,$query);

                  while($row=mysqli_fetch_assoc($search_result)){
                    ?>
                <h1 class="page-header">
                    <?php echo $row['post_title'] ?>
                    <small><?php echo $row['post_auther'] ?></small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="https://www.facebook.com/soh41l"><?php echo $row['post_auther'] ?></a>
                </h2>
                <p class="lead"> by <a href="https://www.facebook.com/soh41l"><?php echo $row['post_auther'] ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row['post_date'] ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $row['post_image'] ?>" alt="">
                <hr>
                <p><?php echo $row['post_content'] ?></p>
                <a class="btn btn-primary" href="#">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
              <?php } }?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>
            <?php include "includes/sidebar.php" ?>


            </div>

        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php" ?>

</body>

</html>

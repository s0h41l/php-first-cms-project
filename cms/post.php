<?php include 'includes/db.php' ?>
<?php
    $post_title="404 Not Found";
    $post_auther="404 Not Found";
    $post_date="404 Not Found";
    $post_image="404.jpg";
    $post_content="404 Not Found";
    $post_category="404 Not Found";

    if(isset($_GET['post_id'])){
      $post_id=mysqli_real_escape_string($connection,$_GET['post_id']);
      $query="SELECT * FROM post WHERE post_id='$post_id'";
      $result=mysqli_query($connection,$query);
      $result=mysqli_fetch_assoc(mysqli_query($connection,$query));
      $post_title=$result['post_title'];
      $post_auther=$result['post_auther'];
      $post_date=$result['post_date'];
      $post_image=$result['post_image'];
      $post_content=$result['post_content'];
      $cat_id=$result['post_category_id'];
      $query1="SELECT * FROM categories WHERE cat_id='$cat_id'";
      $post_category=mysqli_fetch_assoc(mysqli_query($connection,$query1))['cat_title'];

    }
    if(isset($_POST['comment_submit'])){
        $post_id=$post_id=mysqli_real_escape_string($connection,$_GET['post_id']);
        $comment_auther=mysqli_real_escape_string($connection,$_POST['comment_auther']);
        $commenter_email=mysqli_real_escape_string($connection,$_POST['commenter_email']);
        $comment_content=mysqli_real_escape_string($connection,$_POST['comment_content']);
        $query="INSERT INTO comments (comment_post_id,comment_auther,comment_email,comment_status,comment_date,comment_content) VALUES ('$post_id','$comment_auther','$commenter_email','approve',now(),'$comment_content')";
        mysqli_query($connection,$query);

        $query2="UPDATE post SET post_comment_count=post_comment_count+1 WHERE post_id=$post_id";
        mysqli_query($connection,$query2);

    }

    ?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_auther ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $post_image ?>">

                <hr>

                <!-- Post Content -->
                <p><?php echo $post_content ?></p>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="post" class="form">
                      <div class="form-group">
                        <label for="commenter_auther">Name</label>
                        <input class="form-control" type="text" name="comment_auther" placeholder="eg. Sohail Khan">
                      </div>
                      <div class="form-group">
                        <label for="commenter_email">Email</label>
                        <input class="form-control" type="email" name="commenter_email" placeholder="eg. sohail@gmail.com">
                      </div>
                        <div class="form-group">
                            <textarea name='comment_content' class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name='comment_submit'>Comment</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php

                    $query="SELECT * FROM comments WHERE comment_post_id='$post_id' AND comment_status='approve'";
                    $result=mysqli_query($connection,$query);
                    while($data=mysqli_fetch_assoc($result)){
                      ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $data['comment_auther'] ?>
                            <small><?php echo $data['comment_date'] ?></small>
                        </h4>
                        <?php echo $data['comment_content'] ?>
                    </div>
                </div>
              <?php } ?>



            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

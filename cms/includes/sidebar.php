<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
        <div class="input-group">
            <input type="text" name="search_text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="search_submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        </form>
        <!-- /.input-group -->
    </div>

    <div class="well">
        <h4>Login</h4>
        <div class="row">
            <div class="col-lg-12">
              <form class="form" action="includes/login.php" method="post">
                <div class="form-group">
                  <input class="form-control" type="text" name="login_user" value="">
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="login_pass" value="">

                </div>
                <div class="form-group">
                  <input class="btn btn-primary btn-block" type="submit" name="login_submit" value="Login">
                </div>

              </form>

            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled">
                <?php
                    $query="SELECT * FROM Categories LIMIT 50";
                    $query_cat_result=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($query_cat_result)){
                      ?>

                  <li><a href="category.php?category_id=<?php echo $row['cat_id'] ?>"><?php echo $row['cat_title'] ?></a>

                    <?php  } ?>

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

<?php include 'db.php' ?>
<?php
    if(isset($_POST['login_submit'])){
      $username=$_POST['login_user'];
      $password=$_POST['login_pass'];
      $username=mysqli_real_escape_string($connection,$username);
      $password=mysqli_real_escape_string($connection,$password);
      $query="SELECT * FROM users WHERE username='$username' OR email='$username' AND user_status='approve'";
      $result=mysqli_query($connection,$query);
      while($row=mysqli_fetch_assoc($result)){
        if(($row['username']==$username || $row['email']==$username) && $row['password']==$password){

          $_SESSION['user_id']=$row['user_id'];
          $_SESSION['username']=$row['username'];
          $_SESSION['first_name']=$row['first_name'];
          $_SESSION['last_name']=$row['last_name'];
          $_SESSION['user_role']=$row['user_role'];

          header('location:../admin/index.php');

        }else {

         header('location:../index.php');
        }
      }
      if(mysqli_num_rows($result)==0){
        echo "No user exist";
      }



    }




 ?>

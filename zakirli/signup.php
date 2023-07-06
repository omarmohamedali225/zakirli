<?php

include('./connection/config.php');

session_start();



if(isset($_SESSION['user_id'])){
  header('location:showlog.php');
}





if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($con, $_POST['name']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = mysqli_real_escape_string($con, md5($_POST['pass']));
   $state = 'NO';
   $code = mysqli_real_escape_string($con,md5($email));
   $userType = 'user';

   $select = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $msg[] = 'الحساب موجود بالفعل';
   }else{
      if(filter_var($email,FILTER_VALIDATE_EMAIL)){
          mysqli_query($con, "INSERT INTO `users`(name, email, pass, state, code, user_type) VALUES('$name', '$email', '$pass', '$state', '$code', '$userType')") or die('query failed');
          header('location:login.php');
          exit();
      }
   }
}









?>























<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./icons/icon-title.svg" type="image/x-icon">
    <link rel="stylesheet" href="./icons/icons.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>ذاكرلي</title>
</head>
<body>

<section class="signup" style="background-image: url(./img/section.svg); background-size: cover;">
    <form action="" method="POST">
        <div class="boxsign">
        <?php
          if(isset($msg)){
            foreach($msg as $msg){
                echo '<div class="alert alert-danger text-center" role="alert" onclick="this.remove();">'.$msg.'</div>';
            }
          }
          ?>
            <div class="card text-light">
                <div class="card-header" dir="rtl">
                  تسجيل موقع ذاكر<span class="text-primary">لي</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name" required name="name">
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="Enter Your Email" required name="email">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" minlength="6" class="form-control" id="exampleFormControlInput3" placeholder="Enter Your Password" required name="pass">
                      </div>
                      
                      <div class="mb-3 text-center">
                        <button class="btn btn-outline-primary" type="submit" name="submit">SignUp</button>
                      </div>
                </div>
                <div class="card-footer text-muted text-center">
                لديك حساب بالفعل؟ <a href="login.php">سجل الان</a>
                </div>
              </div>
        </div>
    </form>
</section>

<!-- loading -->
<div class="loading">
  <div class="spinner-grow text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
<!-- loading -->
</body>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jquery-3.6.2.min.js"></script>
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<script src="./js/script.js"></script>
</html>
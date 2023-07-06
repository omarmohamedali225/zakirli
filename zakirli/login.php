<?php

include('./connection/config.php');
session_start();



if(isset($_SESSION['user_id'])){
  header('location:showlog.php');
}


if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = mysqli_real_escape_string($con, md5($_POST['pass']));

   $select = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email' AND pass = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['type'] = $row['user_type'];
      if($row['user_type']=='user'){
        header('location:showlog.php');
      }else if($row['user_type']=='admin'){
        header('location:./admin/admin.php');
      }
      exit();
   }else{
      $msg[] = 'البريد او كلمه السر خطأ';
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

<section class="login" style="background-image: url(./img/section.svg); background-size: cover;">
    <form action="" method="post">
        <div class="boxlogin">
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
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email" required name="email">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" minlength="6" class="form-control" id="exampleFormControlInput2" placeholder="Enter Your Password" required name="pass">
                      </div>
                      
                      <div class="mb-3 text-center">
                        <button class="btn btn-outline-primary" type="submit" name="submit">Login</button>
                      </div>
                </div>
                <div class="card-footer text-muted text-center">
                  ليس لديك حساب؟ <a href="signup.php">إنشاء حساب</a>
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
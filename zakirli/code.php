<?php

include('./connection/config.php');
session_start();
$userID = $_SESSION['user_id'];
$type = $_SESSION['type'];
if(!isset($userID)){
  header('location:login.php');
}


$select = mysqli_query($con, "SELECT * FROM users WHERE id =$userID");
$date = mysqli_fetch_array($select);

if(isset($_POST['submit'])){
  $code = $_POST['code'];
  if($code==$date['code']){
    mysqli_query($con, "UPDATE users SET state='YES' WHERE users .id=$userID");
    $msg[] = 'الكود صحيح استمتع';
    header('location:videos.php');
    exit();
  }else{
    $msg[] = 'برجاء التحقق من صحه الكود';
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
                echo '<div class="alert alert-info text-center" role="alert" onclick="this.remove();">'.$msg.'</div>';
            }
          }
          ?>
            <div class="card text-light">
                <div class="card-header" dir="rtl">
                    سجل كود ذاكر<span class="text-primary">لي</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" >الكود الخاص</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Code" required name="code">
                      </div>
                      <div class="mb-3 text-center">
                        <button class="btn btn-outline-primary" type="submit" name="submit">انطلق</button>
                      </div>
                </div>
                <div class="card-footer text-muted text-center">
                 للحصول علي الكود اتصل بنا وسوف تحصل عليه
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
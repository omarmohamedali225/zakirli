<!-- <?php

include('./connection/config.php');
session_start();
$userID = $_SESSION['user_id'];
$type = $_SESSION['type'];

if(!isset($userID)){
  header('location:login.php');
}


$ID = $_GET['video'];
$select1 = mysqli_query($con, "SELECT * FROM videos WHERE id =$ID");
$select2 = mysqli_query($con, "SELECT * FROM users WHERE id =$userID");
$data1 = mysqli_fetch_array($select1);
$data2 = mysqli_fetch_array($select2);
if($data1['state']=='pro' && $data2['state']=='NO'){
  header('location:code.php');
}







if(isset($_GET['logout'])){
  unset($userID);
  session_destroy();
  header('location:index.php');
  exit();
}

?>
 -->














<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./icons/icon-title.svg" type="image/x-icon">
    <link href="https://vjs.zencdn.net/8.0.4/video-js.css" rel="stylesheet" />
    <link rel="stylesheet" href="./icons/icons.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>ذاكرلي</title>
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background-image: url(./img/section.svg); background-size: cover;">
  <div class="container">
    <a class="navbar-brand fw-bold fs-3 " href="#">ذاكر<span class="text-primary">لي</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon-menu"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active p-2 p-lg-3" aria-current="page" href="showlog.php">الصفحه الرئيسيه</a>
        </li>
        <li class="nav-item">
          <a class="nav-link p-2 p-lg-3" href="videos.php">محاضرات</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- navbar -->

<!-- section -->
<section class="section2 h-100 text-center text-light pt-5 pb-5" id="section2" style="background-image: url(./img/section.svg); background-size: cover;">
  <div class="container">
    <div class="section-title mt-5 mb-5">
      <span class="icon-video-camera fw-bold fs-3"></span>
      <h1>Video</h1>
    </div>
    <?php
    $ID = $_GET['video'];
    $select = mysqli_query($con, "SELECT * FROM videos WHERE id =$ID");
    $data = mysqli_fetch_array($select);
    ?>
    <div class="row">
      <div class="col">
        <div class="card mb-3 " style="background:transparent;">
          <div class="card-header">
            <h5 class="card-title"><?php print_r($data['adr'])?></h5>
            <p class="card-text"><?php print_r($data['title'])?></p>
          </div>
          <div class="card-body">
            <video src="<?php print_r($data['video']);?>" id="my-video"
              class="video-js"
              controls
              preload="auto"
              width="auto"
              poster="none"
              height="264"
              poster="MY_VIDEO_POSTER.jpg"
              data-setup="{}">
              <!-- <source src="MY_VIDEO.mp4" type="video/mp4" /> -->
            </video>
          </div>
        </div>
      </div>
      </div>
      
    </div>
  </div>
</section>
<!-- section -->
<!-- footer -->
<footer class="text-center bg-dark text-light" style="background-image: url(./img/section.svg); background-size: cover;">
  <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright جميع الحقوق محفوظه لدي موقع
    ذاكر<span class="text-primary">لي</span>
  </div>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
     تم تصميم وبرمجه الموقع بواسطه عمر محمد<span>
      <lord-icon
    src="https://cdn.lordicon.com/gundqgib.json"
    trigger="hover"
    style="width:30px;height:30px">
</lord-icon>
     </span>
  </div>
  <!-- Copyright -->
</footer>
<!-- footer -->
<!-- loading -->
<div class="loading">
  <div class="spinner-grow text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
<!-- loading -->
</body>
<script src="https://vjs.zencdn.net/8.0.4/video.min.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jquery-3.6.2.min.js"></script>
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<script src="./js/script.js"></script>
</html>





<?php

include('./connection/config.php');
session_start();
$userID = $_SESSION['user_id'];
$type = $_SESSION['type'];
if(!isset($userID)){
  header('location:login.php');
}


if(isset($_GET['logout'])){
  unset($userID);
  session_destroy();
  header('location:index.php');
  exit();
}
?>







<!DOCTYPE html>
<html lang="en" dir="rtl">
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
          <a class="nav-link p-2 p-lg-3" href="#section2">محاضرات</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger p-2 p-lg-3" href="videos.php?logout=<?php echo $userID ?>" onclick="return confirm('هل تريد تسجيل الخروج')">تسجيل خروج</a>
          </li>
      </ul>
    </div>
  </div>
</nav>
<!-- navbar -->

<!-- section -->
<section class="section2 pt-5 pb-5" id="section2">
  <div class="container">
    <div class="section-title mt-5 mb-5 text-center">
      <span class="icon-pencil fw-bold fs-3"></span>
      <h1>كل المحاضرات</h1>
    </div>
    <div class="row">
      <?php
      $select = mysqli_query($con, "SELECT * FROM videos");
      while($video = mysqli_fetch_assoc($select)){
      ?>
      <div class="col-lg-3 col-md-4">
        <div class="card cardvideo mb-3 " data-state="<?php print_r($video['state'])?>" style="background-image: url(./img/section.svg); background-size: cover;">
          <div class="card-header text-center">
            <img src="./img/img.svg" class="img-fluid w-50" alt="">
          </div>
          <div class="card-body">
            <h5 class="card-title text-center fw-bold">
              
                <p class="text-light"><?php print_r($video['adr'])?></p>
              
            </h5>
            <p class="card-text text-light"><?php print_r($video['title'])?></p>
          </div>
          <div class="card-footer text-muted">
            <a class="btn btn-info w-100" type="submit" href="play.php?video=<?php print_r($video['id'])?>"  name='<?php print_r($video['id'])?>' >عرض الفيديو</a>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
</section>
<!-- section -->




<!-- section3 -->
<section class="section2 text-center text-light pt-5 pb-5" id="section3" style="background-image: url(./img/section.svg); background-size: cover;">
  <div class="container">
    <div class="section-title mt-5 mb-5">
      <span class="icon-call fw-bold fs-3"></span>
      <h1>تواصل معنا</h1>
    </div>
    <div class="item p-5">
    <a href="https://www.facebook.com/omarmohamed2518" target="_blank"><span class="icon-facebook fw-bold fs-3 text-primary"></span></a>
      <a href="https://www.instagram.com/3mar_m7md225/" target="_blank"><span class="icon-instagram fw-bold fs-3 text-secondary"></span></a>
      <a href="https://www.wa.me/021008547013" target="_blank"><span class="icon-whatsapp fw-bold fs-3 text-success"></span></a>
    </div>
  </div>
</section>
<!-- section3 -->
<!-- footer -->
<footer class="text-center bg-dark text-light" style="background-image: url(./img/section.svg); background-size: cover;">
  <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright جميع الحقوق محفوظه لدي موقع
    ذاكر<span class="text-primary">لي</span>
  </div>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
     تم تصميم الموقع بواسطه عمر محمد<span>
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
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jquery-3.6.2.min.js"></script>
<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<script src="./js/script.js"></script>
</html>
<?php

include('./connection/config.php');
session_start();


if(isset($_SESSION['user_id'])){
  header('loaction:showlog.php',true);
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
          <a class="nav-link active p-2 p-lg-3" aria-current="page" href="#">الصفحه الرئيسيه</a>
        </li>
        <li class="nav-item">
          <a class="nav-link p-2 p-lg-3" href="#section2">محاضراتي</a>
        </li>
        <li class="nav-item">
          <a class="nav-link p-2 p-lg-3" href="#section3">تواصل معنا</a>
        </li>
        <li class="nav-item">
          <a class="nav-link p-2 p-lg-3 text-primary" href="login.php">تسجيل</a>
        </li>
        <li class="nav-item">
          <a class="nav-link p-2 p-lg-3 text-primary" href="signup.php">إنشاء حساب</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<!-- navbar -->
<!-- section1 -->
<section class="section1" style="background-image: url(./img/section.svg); background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-6 col-sm-6 col-6">
        <div class="text mt-5">
          <h1 class="text-light">اهلا ومرحبا بكم في موقع ذاكر<span class="text-primary">لي</span></h1>
          <p class="text-white-50 mt-4">هدف موقع ذاكر<span class="text-primary">لي</span> هو ارسال المعلومات بشكل مبسط حتي يفهم كل شخص ولا يوجد اعلانات لان هدفنا هو تركيزك علي المحتوي بشكل تام قم الان باستكشاف الفيديوهات بالضغط علي زر محاضراتي <span class="text-primary fw-bold">ملحوظه</span> في بعض الفيديوهات يطلب منك كود اتصل بنا وسوف تحصل عليه روابط الاتصال اسفل الصفحه...</p>
          <a class="btn btn-outline-primary w-50" href="#section2">محاضراتي</a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-6">
        <div class="img mt-5 mb-5">
          <img class="img-fluid" src="./img/img.svg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- section1 -->
<ul class="PostItemStats"><li data-button="react" data-post="384121"><div class="react-area--social"></div><div data-action="react" data-type="post" data-post="384121" data-react="like" class="InnerButton"><i class="fal fa-thumbs-up"></i><span>أعجبني</span></div></li></ul>
<!-- section2 -->
<section class="section2 text-center pt-5 pb-5" id="section2" >
  <div class="container">
    <div class="section-title mt-5 mb-5">
      <span class="icon-pencil fw-bold fs-3"></span>
      <h1>محاضراتي</h1>
      <p class="fw-bold"> يلزم التسجيل في الموقع</p>
    </div>
    <?php 
    $query = mysqli_query($con, "SELECT * FROM videos");
    $q1 = mysqli_num_rows($query);
    ?>
    <div class="row">
      <div class="col">
        <div class="card text-bg-primary mb-3 ">
          <div class="card-header">
            OMAR MOHAMED
          </div>
          <div class="card-body">
          <h5 class="card-title">قسم نظم ومعلومات اداريه</h5>
            <p class="card-text">محاضرات: <?php print_r($q1); ?></p>
          </div>
          <div class="card-footer text-muted">
            <button class="btn btn-info w-100"><a href="videos.php" class="nav-link">View</a></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- section2 -->

<!-- section3 -->
<section class="section2 text-center pt-5 pb-5 text-light" id="section3" style="background-image: url(./img/section.svg); background-size: cover;">
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





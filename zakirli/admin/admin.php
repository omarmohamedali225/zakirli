<?php
 
 include('../connection/config.php');
 
session_start();
$userID = $_SESSION['user_id'];
$type = $_SESSION['type'];
if(!isset($userID)){
  header('location:../login.php');
}

if(isset($_GET['logout'])){
  unset($userID);
  unset($type);
  session_destroy();
  header('location:../index.php');
  exit();
}


if($type=='user'){
    header('location:showlog.php');
}
 




 if(isset($_POST['send'])){

  $state = $_COOKIE['state'];
  $adr = $_POST['adr'];
  $title = $_POST['title'];
  $code = $_POST['code'];
  $video = 'https://drive.google.com/uc?id='.$code.'&export=download';
  if(!empty($code)&&!empty($adr)&&!empty($title)){
    mysqli_query($con,"INSERT INTO `videos` (video,state,adr,title) VALUES ('$video','$state','$adr','$title')") or die('query failed');
  }


 }
 
 ?>
 

 
 
 
 
 
 
 
 
 
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" href="../icons/icon-title.svg" type="image/x-icon">
     <link rel="stylesheet" href="../icons/icons.css">
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="./css/dataTables.bootstrap5.min.css">
     <link rel="stylesheet" href="../css/style.css">
     <title>ذاكرلي</title>
 </head>
 <body style="background-image: url(../img/section.svg); background-size: cover;">
 
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
  <div class="container">
    <a class="navbar-brand ms-auto fw-bold" href="#">ذاكر<span class="text-primary">لي</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <div class="dropdown">
            <button class="btn btn-primary w-100 dropdown-toggle mt-3 mt-lg-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="../videos.php">معاينه</a></li>
              <li><a class="dropdown-item" href="admin.php?logout=<?php echo $userID ?>" onclick="return confirm('هل تريد الخروج؟')">خروج</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- navbar -->
<?php

$selectv = mysqli_query($con, "SELECT * FROM videos");
$numv = mysqli_num_rows($selectv);
$selectu = mysqli_query($con, "SELECT * FROM users WHERE id!=$userID");
$numu = mysqli_num_rows($selectu);
$selectw = mysqli_query($con, "SELECT * FROM users WHERE state='YES' AND id!=$userID");
$numw = mysqli_num_rows($selectw);


?>
<main>
  <div class="container p-3">
    <div class="text-light">
      DASH<span class="text-primary">BOARD</span>
    </div>
    <div class="statistics mt-3">
      <div class="row">
        <div class="col-lg-4">
          <div class="card bg-success text-light mb-3">
            <div class="card-header" dir="rtl">عدد المسجلين </div>
            <div class="card-body">
              <h5 class="card-title text-center">Users : <span><?php print_r($numu); ?></span></h5>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card bg-primary text-light mb-3">
            <div class="card-header" dir="rtl">عدد المشتركين</div>
            <div class="card-body">
              <h5 class="card-title text-center">Users : <span><?php print_r($numw); ?></span></h5>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card bg-danger text-light mb-3">
            <div class="card-header" dir="rtl">عدد الفيديوهات</div>
            <div class="card-body">
              <h5 class="card-title text-center">Videos : <span><?php print_r($numv); ?></span></h5>
            </div>
          </div>
        </div>
        <div class="text-light" dir="rtl">
          المشتركين
        </div>
        <div class="col text-light">
          
          <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Code</th>
                    <th>State</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $select = mysqli_query($con, "SELECT * FROM users WHERE id!=$userID");
              
              while($user = mysqli_fetch_assoc($select)){
                
              
              ?>
                <tr>
                    <td class="text-light"><?php print_r($user['name'])?></td>
                    <td class="text-light"><?php print_r($user['email'])?></td>
                    <td class="text-light"><?php print_r($user['code'])?></td>
                    <td class="text-light"><?php print_r($user['state'])?></td>
                    <td class="text-light"><a class="btn btn-outline-primary" href="update.php?update=<?php print_r($user['id'])?>">Update</a></td>
                    <td class="text-light"><a class="btn btn-outline-danger" href="delete.php?delete=<?php print_r($user['id'])?>" onclick="return confirm('هل انت متأكد من حذف هذا المستخدم')">Delete</a></td>
                </tr>
                <?php }?>
            </tbody>
            <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Code</th>
                  <th>State</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
            </tfoot>
        </table>
        </div>
      </div>
      <div class="row">
        <div class="text-light mt-3">Upload Video</div>
        <div class="col">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 text-light" dir="rtl">
              <label for="exampleFormControlInput1" class="form-label">العنوان</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="اكتب عنوان الفيديو هنا" name="adr">
            </div>
            <div class="mb-3 text-light" dir="rtl">
              <label for="exampleFormControlInput1" class="form-label">المضمون</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="اكتب مضمون الفيديو هنا" name="title">
            </div>
            <div class="mb-3 text-light" dir="rtl">
              <label for="formFile" class="form-label">الكود الخاص Google Drive</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="اكتب كود الفيديو هنا" name="code">
            </div>
            <select class="form-select mb-3" dir="rtl" aria-label="Default select example" id="choose">
              <option selected>اختر الحاله</option>
              <option value="1" >مجاني</option>
              <option value="2" >مدفوع</option>
            </select>
            <div class="mb-3 text-light text-center" dir="rtl">
              <button class="btn btn-danger w-50" type="submit" name="send">نشر الفيديو</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>





 

 
 
 <!-- loading -->
 <div class="loading">
   <div class="spinner-grow text-primary" role="status">
     <span class="visually-hidden">Loading...</span>
   </div>
 </div>
 <!-- loading -->
 </body>
 <script src="../js/bootstrap.bundle.min.js"></script>
 <script src="../js/jquery-3.6.2.min.js"></script>
 <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
 <script src="./js/jquery.dataTables.min.js"></script>
 <script src="./js/dataTables.bootstrap5.min.js"></script>
 <script src="../js/script.js"></script>
 <script>
  $('#choose').change(function(){
    let state = '';
    if(choose.value==1){
        state ='free'
    }else{
        state ='pro'
    }
    document.cookie="state="+state
})
$(document).ready(function () {
    $('#example').DataTable();
});
 </script>
 </html>
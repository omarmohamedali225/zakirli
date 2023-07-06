<?php
 
 include('../connection/config.php');
 
session_start();
$userID = $_SESSION['user_id'];
$type = $_SESSION['type'];
if(!isset($userID)){
  header('location:login.php');
}
if($type=='user'){
    header('location:showlog.php');
}
$ID = $_GET['update'];
if(isset($_POST['submit'])){
  $code = $_POST['code'];
  $state = $_POST['state'];

  mysqli_query($con, "UPDATE users SET state='$state',code='$code' WHERE users .id=$ID");
  header('location:admin.php');
  exit();
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
<body>

<section class="signup" style="background-image: url(../img/section1.svg); background-size: cover;">
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
                    التعديل موقع ذاكر<span class="text-primary">لي</span>
                </div>
                <div class="card-body">
                  <?php
                  $ID = $_GET['update'];
                  $select = mysqli_query($con, "SELECT * FROM users WHERE id=$ID");
                  $data = mysqli_fetch_assoc($select);
                  ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Code</label>
                        <input type="text" class="form-control" value="<?php print_r($data['code'])?>" id="exampleFormControlInput1" placeholder="Enter Your Code" required name="code">
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">State</label>
                        <input type="text" class="form-control" value="<?php print_r($data['state'])?>" id="exampleFormControlInput2" placeholder="Enter Your State" required name="state">
                      </div>
                      
                      <div class="mb-3 text-center">
                        <button class="btn btn-outline-primary" type="submit" name="submit">Update</button>
                      </div>
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
<script src="../js/bootstrap.bundle.min.js"></script>
 <script src="../js/jquery-3.6.2.min.js"></script>
 <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
 <script src="./js/jquery.dataTables.min.js"></script>
 <script src="./js/dataTables.bootstrap5.min.js"></script>
 <script src="../js/script.js"></script>
</html>
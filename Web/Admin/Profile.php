<?php
  
  require_once '../template/header.inc.php';

  if(!isset($_SESSION["useruid"])){
      header("location: Login.php");
      exit();
  }
  require_once '../inc/dbh.inc.php';
  require_once '../inc/functions.inc.php'; 
  $usersUid = $_SESSION["useruid"];
  $sql = "SELECT * FROM `user` WHERE `usersUid` = '".$usersUid."';";
  $data = array();
  $userData = getList($conn,$sql);


?>

<head>
    <link rel="stylesheet" href="../css/style2.css">
    <title>プロフィール</title>
    <script src="../js/View.js"></script>
    <script src="../js/test.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.css">
    <script src="js/sweetalert2.min.js"></script>
</head>

<section class="__section">

    <div class="leftBox">
    
    </div>

    <div class="mainBox"> 
        <div class="form-wrapper">
            <a href="EditProfile.php"><img src="https://img.icons8.com/dotty/40/000000/edit-file.png"/></a>
            
            <?php foreach($userData as $val):?>
                <p>ユーザー名</p>
                <p><?php echo $val["usersUid"];?></p>
                <h1>アイコン画像</h1>
                <img class="ViewImage" src="<?php if(empty($val["iconPath"])){echo '../img/noimage.png';}else{echo '../user/.userIMG/iconIMG/'.$val["iconPath"];}?>" alt="">
                <h1>背景画像　</h1>
                <img src="<?php if(empty($val["backImgPath"])){echo 'https://img.icons8.com/ios-filled/50/000000/no-image.png';}else{echo '../user/.userIMG/backgroungIMG/'.$val["backImgPath"];}?>" alt="">
            <?php endforeach; ?>

        </div>
    </div>

    <div class="rightBox">
    
    </div>

</section>



<?php require_once '../template/header.inc.php';?>
<?php
  require_once '../template/header.inc.php';
  
  if(!isset($_SESSION["useruid"])){
      header("location: Login.php");
      exit();
  }
  
  $userUid = $_SESSION["useruid"];
?>

<head>
    <link rel="stylesheet" href="../css/style2.css">
    <title>プロフィール</title>
    <script src="../js/View.js"></script>
    <script src="../js/test.js"></script>
</head>

<section class="__section">

    <div class="leftBox">
    
    </div>

    <div class="mainBox">
        <div class="form-wrapper">
            <form method="POST" action="../inc/Profile.inc.php" class="forms">
                <p>ユーザー名</p><button onclick="sWa()"><img src="https://img.icons8.com/dotty/40/000000/edit-file.png"/></button>
                <br><input type="text" autocomplete="off" name="" value="<?php echo $userUid;?>" disabled>
                <h1>アイコン画像</h1>
                <div id="preview" class="ViewImage"></div>
                <br><input type="file" onChange="imgPreView(event)" autocomplete="off" name="IconImage">
                <h1>背景画像　</h1>
                <div id="preview2" class="ViewImage"></div>
                <br><input type="file" onChange="imgPreView2(event)"autocomplete="off" name="BackgroundImage">
                <br> <br><input type="submit"> 
            </form>
        </div>
    </div>

    <div class="rightBox">
    
    </div>

</section>



<?php require_once '../template/header.inc.php';?>
<?php
require_once '../template/header.inc.php';

if(!isset($_SESSION["useruid"])){
    header("location: ../");
    exit();
}
?>

<head>
    <link rel="stylesheet" href="../css/style2.css">
    <title>プロフィール</title>
    <script src="../js/View.js"></script>
</head>

<section class="">

    <div class="leftBox">
    
    </div>

    <div class="mainBox">
        <div class="form-wrapper">
            <form method="POST" action="../inc/Profile.inc.php">
                <h1>アイコン画像</h1>
                <div id="preview" class="ViewImage"></div>
                <br><input type="file" onChange="imgPreView(event)" name="IconImage">
                <h1>背景画像　</h1>
                <div id="preview2" class="ViewImage"></div>
                <br><input type="file" onChange="imgPreView2(event)" name="BackgroundImage">
                <p>ユーザー名</p>
                <br><input type="text" disabled value="username" name="">
                <br><input type="submit" placeholder="保存"> 
            </form>
        </div>
    </div>

    <div class="rightBox">
    
    </div>

</section>



<?php require_once '../template/header.inc.php';?>
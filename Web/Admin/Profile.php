<?php
require_once '../template/header.inc.php';

if(!isset($_SESSION["useruid"])){
    header("location: ../");
    exit();
}
?>

<head>
    <link rel="stylesheet" href="../css/style.inc.css">
    <title>プロフィール</title>
    <style>input{background: grey;} *{color:white; font-size: 20px;} </style>
</head>

<section class="">

    <div class="leftBox">
    
    </div>

    <div class="mainBox">
        <form>
            <h1>アイコン画像</h1>
            <br><input type="file">
            <h1>背景画像　</h1>
            <br><input type="file">
            <h1>ユーザー名</h1>
            <br><input type="text" disabled value="usrname"><button><img  src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-edit-interface-kiranshastry-lineal-kiranshastry.png"/></button>
        </form>
    </div>

    <div class="rightBox">
    
    </div>

</section>



<?php require_once '../template/header.inc.php';?>
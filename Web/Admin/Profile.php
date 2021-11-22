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
</head>

<section class="">

    <div class="leftBox">
    
    </div>

    <div class="mainBox">
        <input>
    </div>

    <div class="rightBox">
    
    </div>

</section>



<?php require_once '../template/header.inc.php'; ?>
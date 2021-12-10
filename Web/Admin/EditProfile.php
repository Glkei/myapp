<?php 
    require_once '../template/header.inc.php';
    if(!isset($_SESSION["useruid"])){
        header("location: Login.php");
        exit();
    }

    require_once '../inc/functions.inc.php';
    require_once '../inc/dbh.inc.php';
    $usersUid = $_SESSION["useruid"];
    $sql = "SELECT * FROM `user` WHERE `usersUid` = '".$usersUid."';";
    $data = array();
    $UserData = getList($conn,$sql);

?>

<head>
    <title>マイプロフィール</title>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<section>

    <form method="POST" action="../inc/EditProfile.inc.php" class="forms" autocomplete="off">
        <?php foreach($UserData as $val):?>
            <p>アカウント名</p>
            <input type="text" value="<?php echo $val["accountName"];?>">
            <h1>アイコン画像</h1>
            <div id="preview" class="ViewImage"></div>
            <input type="file" onChange="imgPreView(event) " name="IconImage">
            <h1>背景画像　</h1>
            <div id="preview2" class="ViewImage"><?php if(empty($val["iconPath"])){echo '<img src="../img/noimage.png" />';}else{echo '../user/.userIMG/iconIMG/'.$val["iconPath"];}?></div>
            <input type="file" onChange="imgPreView2(event)" name="BackgroundImage">
            <input type="submit" value="保存する"> 
        <?php endforeach; ?>
    </form>

</section>

<?php 
    require_once '../template/footer.inc.php';
?>
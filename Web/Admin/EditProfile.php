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
    <script src="../js/View.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<section>

    <form method="POST" action="../inc/EditProfile.inc.php" class="forms" autocomplete="off">
        <?php foreach($UserData as $val):?>
            <p>アカウント名</p>
            <input type="text" placeholder="<?php echo $val["accountName"];?>" name="accountName">
            <h1>アイコン画像</h1>
            <div id="preview" class="ViewImage"><?php if(empty($val["iconPath"])){echo '<img src="../img/noimage.png" />';}?></div>
            <input type="file" onChange="imgPreView(event) " name="IconImage">
            <h1>背景画像</h1>
            <div id="preview2" class="ViewImage"><?php if(empty($val["backImgPath"])){echo '<img src="https://img.icons8.com/ios-filled/50/000000/no-image.png" />';}?></div>
            <input type="file" onChange="imgPreView2(event)" name="BackgroundImage">
            
            <input type="submit" value="保存する"> 
        <?php endforeach; ?>
    </form>

</section>

<?php 
    require_once '../template/footer.inc.php';
?>
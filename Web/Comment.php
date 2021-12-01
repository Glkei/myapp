<?php 

require_once 'template/header.inc.php';
require_once 'inc/functions.inc.php';
require_once 'inc/dbh.inc.php';
$reId = $_GET["content"];

$data = array();
$sql = 
"SELECT * FROM `uploads_at` 
 INNER JOIN  `user` 
 ON uploads_at.usersUid = user.usersUid
 WHERE uploads_at.recordId = '".$reId."' ";

$data = getList($conn,$sql);

$CommentData = array();
$sql = 
"SELECT * FROM `comment_at` WHERE `PostId` = '".$reId."' ";

$CommentData = getList($conn,$sql);

?>
<head>
    <title>投稿内容</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<section>

    <?php foreach($data as $val): ?>
    <div>
        <div class="ContentData">
            <img src="<?php echo $val["Content"]; ?>" style="max-width:400px">
        </div>

        <div class="ContentTitle">
            <h2><?php echo $val["Title"]; ?></h2>
            <p>クリック回数：</p>
            <div>
                <img src="<?php echo $val["Content"]; ?>" style="max-width:400px">
                <h2><a href="userProf.php?u=<?php echo $val["usersUid"] ;?>"><?php echo $val["accountName"]; ?></a></h2>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <br>コメントする:

    <form method="POST" action="inc/Post_atComment.inc.php">
        <textarea name="PostComment" cols="30" rows="3" style="color:black;"></textarea>
        <input type="number" name="<?php echo $reID;?>" disabled>
        <input type="submit" name="submit">
    </form>

    <br>
    <!-- コメント集 -->
    <?php foreach($CommentData as $val): ?>

        <div class="Comments">

            <p><?php echo $val["accountName"]; ?></p>

        </div>

    <?php endforeach; ?>

</section>


<?php 
require_once 'template/footer.inc.php';
?>
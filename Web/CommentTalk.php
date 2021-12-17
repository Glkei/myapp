<?php 

require_once 'template/header.inc.php';
require_once 'inc/functions.inc.php';
require_once 'inc/dbh.inc.php';
$reId = $_GET["content"];
$CounterRecord = 0;

$data = array();
$sql = 
"SELECT * FROM `uploads_talk` 
 INNER JOIN  `user` 
 ON uploads_talk.usersUid = user.usersUid
 WHERE uploads_talk.recordId = '".$reId."' ";

$data = getList($conn,$sql);

$CommentData = array();
$sqll = 
"SELECT * FROM `comment_talk` 
 INNER JOIN  `user` 
 ON comment_talk.usersUid = user.usersUid
 WHERE comment_talk.PostId = '".$reId."' ";
$CommentData = getList($conn,$sqll);

foreach ($data as $value) {
    $Views = $value["WatchCount"] + 1;
    InCount($conn,$Views,$reId);
}

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
            <p>クリック回数：<?php echo $val["WatchCount"]; ?></p>
            <div>
                <img src="<?php echo $val["iconPath"]; ?>" style="max-width:100px">
                <h2><a href="userProf.php?u=<?php echo $val["usersUid"] ;?>"><?php echo $val["accountName"]; ?></a></h2>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <br>コメントする:
    <form method="POST" action="inc/Post_talkComment.inc.php?content=<?php echo $reId; ?>">
        <textarea name="PostComment" cols="30" rows="3" style="color:black;"></textarea>
        <input type="submit" name="submit">
    </form>

    <br>
    <!-- コメント集 -->
    <h1 style="font-size: 30px;"><?php echo $CounterRecord;?>件のコメント</h1>
    <?php foreach($CommentData as $val): ?>

        <div class="Comments">
            <?php $CounterRecord++; ?>
            <p><?php echo date('Y/m/d H:i:s ',strtotime($val["PostDate"])) ?></p>
            <p><?php echo $val["accountName"];?>のコメント：<?php echo $val["Comment"];?></p>
            <br>
        </div>
        
    <?php endforeach; ?>

</section>


<?php 
require_once 'template/footer.inc.php';
?>
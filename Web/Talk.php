<?php
  require_once 'template/header.php';
  require_once 'inc/functions.inc.php';
  require_once 'inc/dbh.inc.php';
  $data = array();
  $sql = 
  "SELECT * FROM `uploads_talk` 
  INNER JOIN  `user` 
  ON uploads_talk.usersUid = user.usersUid
  ORDER BY RAND()"; 
  $data = getList($conn,$sql);
  $num = 0;
?>
<!--HTML Code-->

<head>
<link rel=stylesheet href="css/Talk.css">
<title>掲示板</title>
</head>

<section class="main">

   <div class="left-box">
      <a href="uploadTalk.php">投稿する</a>
   </div>

   <div class="main-box">
         <?php foreach($data as $val):?>
            <div class="data-container">

               <div class="con-left">
                  <img src = "<?php echo $val["Content"];?>" width="auto" height="200px">
               </div>

               <div class="con-right">
                  <a href=""><?php echo $val["accountName"]; ?></h2></a>
                  <a href=""><h2><?php echo $val["Title"]; ?></h2></a>
                  <label><?php echo $val["Ditails"];?></label>
               </div>

            </div>
         <?php endforeach; ?>         
   </div>

   <div class="right-box">

      <?php ?>
   
   </div>

</section>


<?php
  require_once 'template/footer.php';
?>
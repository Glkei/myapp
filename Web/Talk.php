<?php
   require_once 'template/header.php';
   require_once 'inc/functions.inc.php';
   require_once 'inc/dbh.inc.php';
   $data = array();
  
   $filS = filter_input(INPUT_GET,'search');

   if($filS){
      $sql = 
      "SELECT * FROM `uploads_talk` 
       INNER JOIN `user`
       ON uploads_talk.usersUid = user.usersUid
       WHERE `Title` 
       LIKE CONCAT('%','".$filS."','%')
       OR `Ditails` LIKE CONCAT('%','".$filS."','%')
       OR `accountName` LIKE CONCAT('%','".$filS."','%')
       OR `accountName` LIKE CONCAT('%','".$filS."','%')";
   }
   else{
      $sql = "SELECT * FROM `uploads_talk` 
              INNER JOIN  `user` 
              ON uploads_talk.usersUid = user.usersUid ;" ;
   }

   $data = getList($conn,$sql);
   $num = 0;
   // var_dump($sql);
?>
<!--HTML Code-->

<head>
   <script src="https://kit.fontawesome.com/afd6aa68df.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/Talk.css">
   <title>掲示板</title>
</head>

<section class="main">

   <div class="left-box">

   <form method="GET">
       <input type="search" name ="search" autocomplete="off">
   </form>

      <a href="uploadTalk.php">投稿する</a>
   </div>

   <div class="main-box">
         <?php foreach($data as $val):?>
            <div class="data-container">

               <div class="con-left">
                  <img src = "<?php echo $val["Content"];?>" width="auto" height="200px">
               </div>

               <div class="con-right">
                  <div style="display:flex; text-align:center;">
                     <a href="CommentTalk.php?content=<?php echo $val["recordId"]; ?>"><h2><?php echo $val["Title"]; ?></h2></a>
                     <label><?php echo date('Y/m/d H:i:s ',strtotime($val["uploadDate"]));?></label>
                  </div>
                     <label><?php echo $val["Ditails"];?></label><br>
                     <div style="display: inline-flex;">
                     <p>投稿者</p>
                     <a href="" style="font-size:15px text-align:center;">:<?php echo $val["accountName"]; ?></h2></a>
                  </div>
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
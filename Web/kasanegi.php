<?php 

    require_once 'template/header.php' ;
    require_once 'inc/functions.inc.php';
    require_once 'inc/dbh.inc.php';

    $data = array();
    $Series = $_GET["series"];

    //受信したシリーズリクエストに沿った表示をするSQL文を設定する/シリーズリクエストがない場合は戻す。
    if($Series == "mh-xx" || "mh-w-i" || "mh-rise"||"mh-r-sb"){
    // 0 = mh-xx // 1 = mh-w-i // 2 = mh-rise // 3 = mh-r-sb // 
        if ($Series == "mh-xx") {
            $sql="SELECT * FROM `uploads_kasanegi` 
                  INNER JOIN `user` 
                  ON uploads_kasanegi.usersUid = user.usersUid 
                  WHERE series = 0;";
        }
        elseif ($Series == "mh-w-i") {
            $sql="SELECT * FROM `uploads_kasanegi` 
                  INNER JOIN `user` 
                  ON uploads_kasanegi.usersUid = user.usersUid 
                  WHERE series = 1;";
        }
        elseif ($Series == "mh-rise") {
            $sql="SELECT * FROM `uploads_kasanegi` 
                  INNER JOIN `user` 
                  ON uploads_kasanegi.usersUid = user.usersUid 
                  WHERE series = 2;";
        }
        elseif ($Series == "mh-r-sb") {
            $sql="SELECT * FROM `uploads_kasanegi` 
                  INNER JOIN `user` 
                  ON uploads_kasanegi.usersUid = user.usersUid 
                  WHERE series = 3;";
        }
    }
    else {
        header("location: ./ChooseSeries.php?error=needseriesselected");
        exit();
    }
    var_dump($sql);
    $data = getList($conn,$sql);
    $num = 0;
?>

<section>
  
    

    <div class="main-box">
         <?php foreach($data as $val):?>
            <div class="data-container">

               <div class="con-left">
                  <img src = "Uploaded/.talk/img<?php echo $val["Content"];?>" width="auto" height="200px">
               </div>
            
               <div class="con-right">
                  <div style="display:flex; text-align:center;">
                     <a href="Admin/CommentKasanegi.php?content=<?php echo $val["recordId"]; ?>"><h2><?php echo $val["Title"]; ?></h2></a>
                     <label><?php echo date('Y/m/d H:i:s ',strtotime($val["uploadDate"]));?></label>
                  </div>
                     <label><?php echo $val["Ditails"];?></label><br>
                  <div style="display: inline-flex;">
                     <p>投稿者</p>
                     <a href="" style="font-size:15px text-align:center;">:<?php echo $val["accountName"]; ?></a>
                  </div>
                  <a >クリック:<?php echo $val["WatchCount"]; ?></a>
               </div>

            </div>
         <?php endforeach; ?>         
   </div>

</section>

<?php
    require_once 'template/footer.php';
?>
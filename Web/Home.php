<?php
  require_once 'template/header.php';
  require_once 'inc/dbh.inc.php';
  require_once 'inc/functions.inc.php';
  $data = array();
  $tagsData = array();
   
  $filS = filter_input(INPUT_GET,'search');
  $tagS = filter_input(INPUT_GET,'tag');
  //初期SQL
  $sql = "SELECT * FROM `uploads_def` ";
  $tagsSQL = "SELECT * FROM `tag_def` ORDER BY RAND();";

  if($filS){
    $sql = "SELECT * FROM `uploads_def` WHERE `Title` LIKE CONCAT('%','".$filS."','%') OR `Ditails` LIKE CONCAT('%','".$filS."','%') ORDER BY `Title` ASC;";
  }

  //　  ボタン押されたらMAINに表示
  if($tagS){
    $sql = "SELECT * FROM `uploads_def` WHERE `Title` LIKE CONCAT('%','".$tagS."','%') OR `Ditails` LIKE CONCAT('%','".$tagS."','%');";
  }

  $num = 0;
  //実行
  $data = getList($conn,$sql);
  $tagsData = getList($conn,$tagsSQL);
?>
<head>
    <title>かさねぎ.com【モンハン】重ね着、画像集！！モンハンライズ</title>
    <link rel=stylesheet href="css/style.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1/css/all.css">
    <script src="https://kit.fontawesome.com/afd6aa68df.js" crossorigin="anonymous"></script>
</head>
        <!-- <form method="GET"> -->

            <div class="tags-container wf-sans">
                <ul class="add-tag">              
                        <!--後々追加予定-->
                        <!-- かっこいい
                        かわいい<s
                        MH-XX<span
                        おもしろ系
                        女性キャラ
                        男性キャラ
                        MH-WI<span
                        重ね着<spa
                        MH-Rise<sp
                        セクシー<s
                        ネタ枠<spa -->
                    <?php foreach($tagsData as $val):?>
                        <li><a href="Home.php?tag=<?php echo $val["tagName"];?>"><?php echo $val["tagName"];?><span><?php echo $val["tagCount"]; ?></span></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

        <!-- </form> -->
        <main class="center-box">

            <div class="Sponcer-left">
                <div class="box">
                    <form method="GET">
                        <input type="text" onmouseout="document.search.txt.value = ''" class="input" name="search" autocomplete="off" >
                    </form>
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <!--center-->
            <div class="center-center-box">
                <div class="image-container">
                   <ul class=" img-wrapper">
                     <?php foreach($data as $val):?>
                        <section class="hover">
                            <a href="CommentDef.php?content=<?php echo $val["recordId"];?>">
                            <div class="hover-img">
                              <img src="<?php echo $val["Content"]?>" alt="cafe">
                            </div>
                            <div class="hover-text">
                              <p class="text1"><?php echo $val["Title"]?></p>
                              <p class=""><?php echo $val["Ditails"]?></p>
                            </div></a>
                        </section>
                     <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="Sponcer-right">
                
            <a href="uploadDef.php" class="btn btn-flat"><span>投稿する</span></a>

            </div>
        
        </main>
        <!-- <footer class="footer-box"></footer> -->
 <?php
  require_once 'template/footer.php';
 ?>
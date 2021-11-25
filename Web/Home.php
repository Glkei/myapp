<?php
  require_once 'template/header.php';
  require_once 'inc/dbh.inc.php';
  require_once 'inc/functions.inc.php';
  $data = array();
  $sql = "SELECT * FROM `uploads_def` ORDER BY RAND() "; 
  $data = getList($conn,$sql);
  $num = 0;
?>
<head>
    <title>かさねぎ.com【モンハン】重ね着、画像集！！モンハンライズ</title>
    <link rel=stylesheet href="css/style.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1/css/all.css">
    <script src="https://kit.fontawesome.com/afd6aa68df.js" crossorigin="anonymous"></script>
</head>
        
            <div class="tags-container wf-sans">
                <ul class="add-tag">
                    <!--後々追加予定-->
                    <li><a href="" id="#">かっこいい<span></span></a></li>
                    <li><a href="" id="#">かわいい<span></span></a></li>
                    <li><a href="" id="#">MH-XX<span></span></a></li>
                    <li><a href="" id="#">おもしろ系<span></span></a></li>
                    <li><a href="" id="#">女性キャラ<span></span></a></li>
                    <li><a href="" id="#">男性キャラ<span></span></a></li>
                    <li><a href="" id="#">MH-WI<span></span></a></li>
                    <li><a href="" id="#">重ね着<span></span></a></li>
                    <li><a href="" id="#">MH-Rise<span></span></a></li>
                    <li><a href="" id="#">セクシー<span></span></a></li>
                    <li><a href="" id="#">ネタ枠<span></span></a></li>
                </ul>
            </div>

        <main class="center-box">

            <div class="Sponcer-left">
                <div class="box">
                    <form method="GET" action="">
                        <input type="text" onmouseout="document.search.txt.value = ''" class="input" name="search">
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
                            <a href="#"><div class="hover-img">
                              <img src="<?php echo $val["Content"]?>" alt="cafe">
                            </div>
                            <div class="hover-text">
                              <p class="text1"><?php echo $val["Title"]?></p>
                              <p class="text2"><?php echo $val["Ditails"]?></p>
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
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
<link rel=stylesheet href="css/style.css">
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
            <div class="Sponcer-left"></div>
            <!--center-->
            <div class="center-center-box">
                <h1 style="text-align: center;color:#ffffff">投稿された画像</h1>
                <div class="image-container">
                   <ul class=" img-wrapper">

                    <?php foreach($data as $val):?>

                     <li><a href="#"><img src="<?php echo $val["Content"] ?>" alt=""></a ></li>
                   
                    <?php endforeach; ?>

                    </ul>
                </div>
            </div>

            <div class="Sponcer-right">

                <button><a href="uploadDef.php">投稿する</a></button>

            </div>
        
        </main>
        <!-- <footer class="footer-box"></footer> -->
 <?php
  require_once 'template/footer.php';
 ?>
<?php
    require_once '../template/header.inc.php';
    require_once '../inc/dbh.inc.php';
    require_once '../inc/functions.inc.php';

    if(!isset($_SESSION['useruid'])){
        header("location: Login.php?error=needthelogin");
        exit();
    }
?>

<section>
    <form method="POST" action ="../inc/uploadKasanegi.inc.php" autocomplete="off" enctype="multipart/form-data">

        <div class="input-group mb-3">
            <input name="content" type="file"  accept=" .jpg , .png " class="form-control" id="inputGroupFile02" style="width:300px" >
        </div> 

        <div><!-- コンセプト -->
            <input name = "title" class="input-title" style="width:400px;color:black;" placeholder="コンセプト" type="text">
        </div>


        <div><!-- 頭 -->
            <input name = "head" class="input-title" style="width:200px;color:black;" placeholder="頭防具" type="text">
        </div>

        <div><!-- 胴 -->
            <input name = "body" class="input-title" style="width:200px;color:black;" placeholder="胴防具" type="text">
        </div>

        <div><!-- 腕 -->
            <input name = "arm" class="input-title" style="width:200px;color:black;" placeholder="腕防具" type="text">
        </div>

        <div><!-- 腰 -->
            <input name = "weist" class="input-title" style="width:200px;color:black;" placeholder="腰防具" type="text">
        </div>

        <div><!-- 脚 -->
            <input name = "foot" class="input-title" style="width:200px;color:black;" placeholder="脚防具" type="text">
        </div>

        <div class="form-floating">
            <textarea name ="ditails" class="form-control"  id="floatingTextarea2"  placeholder="詳細" style="height: 100px; color:darkgrey;"></textarea>
            <label for="floatingTextarea2"></label>
        </div>

        <button type="submit" name="submit">投稿</button>

    </form>
</section>

<?php
    require_once '../template/footer.inc.php';
?>
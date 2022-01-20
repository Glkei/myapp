<?php
  require_once 'template/header.php';
  if(!isset($_SESSION['useruid'])){
    header("location: Admin/Login.php?error=needthelogin");
    exit();
    }
?>
<!--HTML Code-->
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel=stylesheet href="css/style.css">
</head>

<section>
    <div class="up-form">
        <form method="POST" action ="inc/uploadDef.inc.php" autocomplete="off" enctype="multipart/form-data">

        <!-- name="content" -->
        <div class="input-group mb-3">
            <input name="content" type="file"  accept=" .jpg , .png " class="form-control" id="inputGroupFile02" style="width:300px" >
        </div> 

        <!-- name = "title" -->
        <div>
            <input name = "title" class="input-title" style="width:900px;color:black;" placeholder="タイトル" type="text">
        </div>

        <!-- name ="ditails" -->
        <div class="form-floating">
            <textarea name ="ditails" class="form-control"  id="floatingTextarea2"  placeholder="詳細" style="height: 100px; color:darkgrey;"></textarea>
            <label for="floatingTextarea2"></label>
        </div>

        <select multiple >
            <option>Grumpy</option>
            <option>Happy</option>
            <option>Sleepy</option>
            <option>Bashful</option>
            <option>Sneezy</option>
            <option>Dopey</option>
            <option>Doc</option>
        </select>

        <button type="submit" name="submit">投稿</button>

        </form>
    </div>
</section>

<?php
  require_once 'template/footer.php';
?>
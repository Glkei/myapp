<?php
    require_once 'template/header.php';
    if(!isset($_SESSION['useruid'])){
    header("location: Admin/Login.php?error=needthelogin");
    exit();
    }
?>
<head>
    <title>アップロード</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/upPage.css">
</head>
        <div>
            <form method="POST" action ="inc/uploads.inc.php" autocomplete="off" enctype="multipart/form-data">

                <!-- name="content" -->
                <div class="input-group mb-3">
                  <input name="content" type="file"  accept=".jpg , .png , .mp4 , .mov , .mpg , .mkv , .avi , .webm" class="form-control" id="inputGroupFile02" style="width:300px" >
                </div> 

                <div>
                    <input name="HunterName" class="input-title" style="width:900px;color:black;" placeholder="ハンター名" type="text">
                </div>

                <!-- name="times" -->
                　<label style="color:aliceblue;text-align:right;">狩猟タイム 例)11'32→1132 2'05→0205  分の二桁目の0は切り捨て 最大:5959 ※半角数字</label><br>
                <input class="IC" name="times"  type="text" id="In" maxlength="4" onchange="InputChecker()" pattern="[0-9]{1,4}"><br>
                <span class="error" id ="er"></span><br>

                <!-- name = "title" -->
                <div>
                    <input name = "title" class="input-title" style="width:900px;color:black;" placeholder="タイトルorクエスト名" type="text">
                </div>
                <!-- name ="comments" -->
                <div class="form-floating">
                    <textarea name ="comments" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                </div>

                <!-- name="Player" -->
                <div class="cp_ipselect cp_sl01">
                    <select name="Player">
                      <option hidden>狩猟人数</option>
                      <option value="1">ソロプレイ</option>
                      <option value="2">２プレイヤー</option>
                      <option value="3">３プレイヤー</option>
                      <option value="4">４プレイヤー</option>
                    </select>
                </div>

                <!-- name="WeaponID" -->
                <div class="cp_ipselect cp_sl01">
                    <select name="WeaponID">
                    <option selected >使用武器</option>
                      <?php require_once 'inc/Weapon.inc.php'; ?>
                    </select>
                </div>

                <!-- name="MonsterNum" -->
                <div class="form__group">
                    <label for="country" style="color:aliceblue;">モンスター名</label>
                    <select id="country" name="MonstersNum" data-dropdown >
                        <option selected >討伐したモンスターを選択</option>
                        <?php require_once 'inc/MonsterList.inc.php'; ?>
                    </select>
                </div>

                <button type="submit" name="submit">投稿</button>
            </form>
        </div>
        <script src="js/dropdown.js"></script>

<?php require_once 'template/footer.php'; ?>
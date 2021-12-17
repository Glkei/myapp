<?php
  require_once 'template/header.php';
  require_once 'inc/functions.inc.php';
  require_once 'inc/dbh.inc.php';
  $data = array();
  
  $filS = filter_input(INPUT_GET,'search');

if($filS){
    $sql = "SELECT * FROM `uploads_at` WHERE `huntersName` LIKE CONCAT('%','".$filS."','%') ORDER BY `timeAttack` ASC";
}
else{
    $sql = "SELECT * FROM `uploads_at` 
            INNER JOIN  `user` 
            ON uploads_at.usersUid = user.usersUid 
            ORDER BY `timeAttack` ASC";  
}
$data = getList($conn,$sql);

$num = 0;

?>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/afd6aa68df.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/Time.css">
</haad>
<main>
    <div class="center-left">
        <div class="CL-box">
            <p class="h1z">TOP HUNTERS</p>
            <div  class="ranking-wrapper">
                
               <table class="rank-list" name="rank-list">
                    <!--基本情報-->
                       <tr class="rank-nav">
                         <th class="th-1">Rank</th>
                         <th class="th-2">Hunter</th>
                         <th class="th-3">Weapon</th>
                         <th class="th-4">Time</th>
                       </tr>
                    <?php foreach($data as $val):?>

                       <tr class="<?php if( $num < 3 ){ echo ' no1'; }else{ echo 'over4'; }; ?><?php if($num %2 == 0){ echo ' first-td'; }else{ echo ' second-td'; } ?>">                                            
                           <td class="<?php if( $num < 3 ){ echo ' td-1'; }else{ echo ' td-1-1'; }; ?> rowlink"><?php $num++; echo $num;?><a href="Comment.php?content=<?php echo $val["recordId"]; ?>"></a></td>
                           <td class="td-2"><a><?php echo $val["accountName"];?></a></td>
                           <td class="td-3"><img class="weaponImage" src="<?php $vaWeaponsId = $val["weaponsId"];$reJud = judgePath($vaWeaponsId);echo $reJud ;?>"></td>
                           <td class="td-4"><?php echo date('i’s”',strtotime($val["timeAttack"]));?></td>
                       </tr>

                    <?php endforeach; ?>
               </table>
            </div>
        </div>
    </div>
    <div class="center-right">
        <div class="CR-box">
            <a href = "upload.php" class="btn btn-flat"><span>投稿</span></a>
            <div class="box">
                <form method="GET">
                    <input type="text" onmouseout="document.search.txt.value = ''" class="input" name="search" autocomplete="off" >
                </form>
                <i class="fas fa-search"></i>
            </div>
            
            <div class="filterSerch">
             <p class="h1z">フィルター / FILTER</p>
                <form method = "POST" action="inc/FilterSerch.inc.php">
                   
                
                    <div>
                        <div class="shth">
                            <a>武器種 / WEAPONS</a>
                        </div>
                        
                        <div class="selectdivWrapper">
                            <div class="selectdiv">
                                  <select name="WeaponId" >
                                    <option value="" hidden>武器を選択</option>
                                    <?php require_once 'inc/Weapon.inc.php'; ?>
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="shth">
                            <a>投稿日時 / UPLOAD DATE</a>
                        </div>
                        
                        <div class="selectdivWrapper">
                            <div class="selectdiv">
                                  <select name="upDate" >
                                    <option value="" hidden >投稿日順</option>
                                    <option value="0">昇順</option>
                                    <option value="1">降順</option>
                                  </select>
                            </div>
                        </div>
                    </div>

                    <input type="submit" name="submit">

                </form>
            </div>
        </div>
    </div>
</main>
<?php
   require_once 'template/footer.php';
?>






<?php
  require_once 'template/header.php';
  require_once 'inc/functions.inc.php';
  require_once 'inc/dbh.inc.php';
  $data = array();
  $sql = "SELECT * FROM `uploads_at` ORDER BY `timeAttack` ASC"; 
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
                               <tr class="rank-nav">    <!--基本情報-->
                                 <th class="th-1">Rank</th>
                                 <th class="th-2">Hunter</th>
                                 <th class="th-3">Weapon</th>
                                 <th class="th-4">Time</th>
                               </tr>
                            <?php foreach($data as $val):?>
                               <tr class="no1 first-td" >
                                   <td class="td-1 "><?php $num++; echo $num;?></td>
                                   <td class="td-2"><?php echo $val["huntersName"];?></td>

                                   <td class="td-3">
                                    <img class="weaponImage" src="<?php 
                                    $vaWeaponsId = $val["weaponsId"];
                                    $reJud = judgePath($vaWeaponsId);
                                    echo $reJud;
                                    ?>">
                                    </td>

                                   <td class="td-4"><?php echo date('i’s”',strtotime($val["timeAttack"]));?></td>
                               </tr>
                            <?php endforeach; ?>
                               <!-- <tr class="no2 second-td" >
                                <td class="td-1 ">2</td>
                                <td class="td-2">GEg44U</td>
                                <td class="td-3">大剣,双剣,太刀</td>
                                <td class="td-4">1'55'00</td>
                            </tr>
                              <tr class="no3 first-td" >
                                <td class="td-1 ">3</td>
                                <td class="td-2">33rf33f</td>
                                <td class="td-3">大剣,双剣,太刀</td>
                                <td class="td-4">1'55'00</td>
                            </tr>
                            <tr class="second-td" >
                                <td class="td-1 ">4</td>
                                <td class="td-2">eee3</td>
                                <td class="td-3">大剣,双剣,太刀</td>
                                <td class="td-4">1'55'00</td>
                            </tr> -->
                            <!-- <tr class="first-td" >
                                <td class="td-1 ">5</td>
                                <td class="td-2">gjuk7</td>
                                <td class="td-3">大剣,双剣,太刀</td>
                                <td class="td-4">1'55'00</td>
                            </tr>
                            <tr class="second-td" >
                                <td class="td-1 ">6</td>
                                <td class="td-2">ee343</td>
                                <td class="td-3">大剣,双剣,太刀</td>
                                <td class="td-4">1'55'00</td>
                            </tr>
                            <tr class="first-td" >
                                <td class="td-1 ">7</td>
                                <td class="td-2">LKMF3ofij</td>
                                <td class="td-3">大剣,双剣,太刀</td>
                                <td class="td-4">1'55'00</td>
                            </tr>
                            <tr class="second-td" >
                                <td class="td-1 ">8</td>
                                <td class="td-2">+#,f039j</td>
                                <td class="td-3">大剣,双剣,太刀</td>
                                <td class="td-4">1'55'00</td>
                            </tr>
                            <tr class="first-td" >
                                <td class="td-1 ">9</td>
                                <td class="td-2">WLKM3i</td>
                                <td class="td-3">大剣,双剣,太刀</td>
                                <td class="td-4">1'55'00</td>
                            </tr>
                            <tr class="second-td" >
                                <td class="td-1 ">10</td>
                                <td class="td-2">#p;,mg409</td>
                                <td class="td-3">大剣,双剣,太刀</td>
                                <td class="td-4">1'55'00</td>
                            </tr> -->
                       </table>
                    </div>
                </div>
            </div>

            <div class="center-right">
                <div class="CR-box">
                    <a href = "upload.php" class="btn btn-flat"><span>アップロードする</span></a>

                    <div class="box">
                        <form method="GET" action="">
                            <input type="text" onmouseout="document.search.txt.value = ''" class="input" name="search" autocomplete="off" >
                        </form>
                        <i class="fas fa-search"></i>
                    </div>
                    
                    <div class="filterSerch">
                     <p class="h1z">フィルター / FILTER</p>
                        <form method = "POST" action="FilterSerch.inc.php">
                           
                            <div>
                                <div class="shth">
                                    <a>Rank</a>
                                </div>
                                
                                <div class="selectdivWrapper">
                                    <div class="selectdiv">
                                          <select>
                                              <option selected >ランク順位</option>
                                              <option value="0">昇順</option>
                                              <option value="1">降順</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="shth">
                                    <a>Weapon</a>
                                </div>
                                
                                <div class="selectdivWrapper">
                                    <div class="selectdiv">
                                          <select name="">
                                            <option selected>武器を選択</option>
                                            <?php require_once 'inc/Weapon.inc.php'; ?>
                                          </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
<?php
   require_once 'template/footer.php';
?>
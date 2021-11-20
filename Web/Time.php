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
    <link rel=stylesheet href="css/Time.css">
</haad>
        <!-- <div class="back-image"></div> -->
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
                                   <td class="td-1 "><?php $num++; echo $num ;?></td>
                                   <td class="td-2"><?php  echo $val["huntersName"] ;?></td>
                                   <td class="td-3"><?php  echo $val["weaponsId"] ;?></td>
                                   <td class="td-4"><?php  echo $val["timeAttack"] ;?></td>
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
                    <a href = "upload.php" class = "UPL">アップロードする</a>
                </div>
            </div>
        </main>
<?php
   require_once 'template/footer.php';
?>
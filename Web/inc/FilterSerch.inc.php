<?php

session_start();

if(!isset($_SESSION["useruid"])){

    header("location: ../Admin/Login.php");
    exit();
}


if(!isset($_POST["submit"])){

    header("location: ../Time.php?error=nosubmit");
    exit();

}
        
$weaponsId =  $_POST["WeaponId"];/*武器IDフィルター*/
$upDate =  $_POST["upDate"];/*投稿日フィルター　昇順　降順*/
// $monstersId =  $_POST['MonstersID'];/*モンスター別ランキング検索*/

require_once 'functions.inc.php';

$reult = emptyInputFilterSerch($weaponsId,$upDate);

if(emptyInputFilterSerch($weaponsId,$upDate) !== false){
            
    header("lcoation: ../Time.php?error=needsomthing");
    exit();
}

$_val = filterSerch( $weaponsId,$upDate );

if(!$_val){

    header("location: ../Time.php?error=cannotget");
    exit();
}

$_SESSION['FilSerch'] = $_val ;



header("location: ../Time.php?error=none");
exit();

<?php

require_once '../template/header.inc.php';

if(!isset($_SESSION["useruid"])){
    header("Location:../Admin/Login.php?needlogin");
    exit();
}

if(!isset($_POST["submit"])){
    header("Location:../Admin/EditProfile.php?needsubmit");
    exit();
}

require_once 'functions.inc.php';
require_once 'dbh.inc.php';

$accountName = $_POST["accountName"];
// $IconImage = $_POST["IconImage"];
// $BackgroundImage = $_POST["BackgroundImage"];

//アップロード情報を$_FILE['IconImage or BackgroundImage']で獲得
$IcontempFile = $_FILES["IconImage"]['tmp_name'];//必須
$IconfileName = '/'.$_FILES["IconImage"]['name'];//必須

$BackImagetempFile = $_FILES["BackgroundImage"]['tmp_name'];//必須
$BackImagefileName = '/'.$_FILES["BackgroundImage"]['name'];//必須

if(!is_uploaded_file($IcontempFile) || !is_uploaded_file($BackImagetempFile)){//一時ファイルが出来ているか
    header("location: ../uploadTalk.php?error=cannotmadeit");
    exit();
}
else{
    //拡張子代入
    $defExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    //大文字PNG,JPGがアップロードされた場合は小文字に変換する
    $extension = strtolower($defExtension);
    
    //拡張子を確認して条件分岐
    if($extension == 'jpg' || 'png'){
        $ContentDir = 'Uploaded/.talk/img';//..imgディレクトリ指定
    }
    else{
        header("location: ../uploadTalk.php?error=nosupportcontent");
        exit();
    }

    //move_uploaded_file(　一時ファイルのpath　,　保存先ディレクトリ　)        
    if(!move_uploaded_file($tempFile,'../'.$ContentDir.$fileName)){
        header("location: ../uploadTalk.php?error=itisntsave");
        exit();
    }
    
    //DB-CONTENTに代入する変数を生成
    $content_path = $ContentDir.$fileName;

}

$sql = 
    "UPDATE `user` 
     SET `accountName` = '".$accountName."',
         `iconPath` = '".$IconImage."',
         `backImgPath` = '".$BackgroundImage."';";


<?php

session_start();
if(!isset($_SESSION['useruid'])){
    header("location: ../Admin/Login.php?error=needthelogin");
    exit();
}

$usersUid = $_SESSION['useruid'];

if(isset($_POST["submit"])){
    
    //アップロード情報を$_FILE['content']で獲得
    $tempFile = $_FILES["content"]['tmp_name'];//必須
    $fileName = $_FILES["content"]['name'];//必須
    if(!is_uploaded_file($tempFile)){//一時ファイルが出来ているか
        header("location: ../Admin/uploadKasanegi.php?error=cannotmadeit");
        exit();
    }
    else{
        //拡張子代入
        $defExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        
        //move_uploaded_file(　一時ファイルのpath　,　任意ファイル名を指定　)        
        if(!move_uploaded_file($tempFile,'../'.'Uploaded/.talk/imgeeee'.$fileName)){
            header("location: ../Admin/uploadKasanegi.php?error=itisntsave");
            exit();
        }
        
        //DB-CONTENTに代入する変数を生成
        $content_path = $fileName;

    }

    $title = $_POST["title"];//必須
    $head = $_POST["head"];//必須
    $body = $_POST["body"];//必須
    $arm = $_POST["arm"];//必須
    $weist = $_POST["weist"];//必須
    $foot = $_POST["foot"];//必須
    $ditails = $_POST["ditails"];

    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputKasanegi($content_path,$title,$head,$body,$arm,$weist,$foot) !== false){
        header("location: ../Admin/uploadKasanegi.php?error=emptyInput");
        exit();
    }

    UploadKasanegi( $conn,$usersUid,$content_path,$title,$head,$body,$arm,$weist,$foot,$ditails );

}
else{
    header("location: ../Admin/uploadKasanegi.php?error=needthesubmit");
    exit();
}
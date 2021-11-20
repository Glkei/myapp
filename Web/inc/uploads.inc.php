<?php

if(isset($_POST["submit"])){
    
    //アップロード情報を$_FILE['content']で獲得
    $tempFile = $_FILES["content"]['tmp_name'];//必須
    $fileName = '/'.$_FILES["content"]['name'];//必須
    if(!is_uploaded_file($tempFile)){//一時ファイルが出来ているか
        header("location: ../upload.php?error=cannotmadeit");
        exit();
    }
    else{
        //拡張子代入
        $defExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        //大文字PNG,JPGがアップロードされた場合は小文字に変換する
        $extension = strtolower($defExtension);
        
        //拡張子を確認して条件分岐
        if($extension == 'jpg' || 'png'){
            $ContentDir = 'Uploaded/img';//..imgディレクトリ指定
        }
        elseif($extension == 'mp4' || 'mov' || 'mpg' || 'mkv' || 'avi' || 'webm' ){
            $ContentDir = 'Uploaded/mov/';//..movディレクトリ指定
        }
        else{
            header("location: ../upload.php?error=nosupportcontent");
            exit();
        }

        //move_uploaded_file(　一時ファイルのpath　,　保存先ディレクトリ　)        
        if(!move_uploaded_file($tempFile,'../'.$ContentDir.$fileName)){
            header("location: ../upload.php?error=itisntsave");
            exit();
        }
        
        //DB-CONTENTに代入する変数を生成
        $content_path = $ContentDir.$fileName;

    }

    $hunterName = $_POST["HunterName"];//必須
    $timeAt = $_POST["times"];//必須
    $title = $_POST["title"];//必須
    $comments = $_POST["comments"]; 
    $Players = $_POST["Player"];//必須
    $weapons = $_POST["WeaponID"];//必須
    $MonstersNum = $_POST["MonstersNum"];//必須
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputUpload($content_path,$hunterName,$timeAt,$title,$comments,$Players,$weapons,$MonstersNum) !== false){
        header("location: ../upload.php?error=emptyInput");
        exit();
    }

    UploadTA( $conn,$content_path,$hunterName,$timeAt,$title,$comments,$Players,$weapons,$MonstersNum );

}
else{
    header("location: ../Admin/Login.php");
    exit();
}
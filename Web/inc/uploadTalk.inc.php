<?php

if(isset($_POST["submit"])){
    
    //アップロード情報を$_FILE['content']で獲得
    $tempFile = $_FILES["content"]['tmp_name'];//必須
    $fileName = '/'.$_FILES["content"]['name'];//必須
    if(!is_uploaded_file($tempFile)){//一時ファイルが出来ているか
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
        elseif($extension == 'mp4' || 'mov' || 'mpg' || 'mkv' || 'avi' || 'webm' ){
            $ContentDir = 'Uploaded/.talk/mov';//..movディレクトリ指定
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

    $title = $_POST["title"];//必須
    $ditails = $_POST["ditails"]; 

    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputTalk($content_path,$title) !== false){
        header("location: ../uploadTalk.php?error=emptyInput");
        exit();
    }

    UploadTalk( $conn,$content_path,$title,$ditails );

}
else{
    header("location: ../Admin/Login.php");
    exit();
}
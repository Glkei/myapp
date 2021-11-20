<?php

function emptyInputSignup( $name,$email,$userName,$pwd,$pwdRepeat ){
    $result = null;
    if(empty($name) || empty($email) || empty($userName) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($userName){
    $result = null;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$userName)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result = null;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result = null;
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $userName , $email){
    $sql="SELECT * FROM user WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../Admin/Signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$userName,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false ;
        return $result ;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$email,$userName,$pwd){
    $sql="INSERT INTO user (usersName,usersEmail,usersUid,usersPwd) VALUES (?, ?, ?, ?) ;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../Admin/Signup.php?error=stmtfailed");
        exit();
    } 

    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$userName,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Admin/Signup.php?error=none");
    exit();
}
//LOGIN-PAGE
function emptyInputLogin( $username,$pwd ){
    $result = null;
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn,$username,$pwd){
    $uidExists = uidExists($conn, $username , $username);

    if ($uidExists === false)  {
        header("location: ../Admin/Login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if($checkPwd === false){
        header("location: ../Admin/Login.php?error=wronglogin");
        exit();
    }//session start----------------------------------------------  
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersPwd"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../Top.php");
        exit();
    }
}

function getList($conn,$sql){
   if(!$conn){
       echo "Filed";
       exit();
   }
   $query = $sql;
   $result = mysqli_query($conn,$query);
   
   $data = array();
   if($result){
       while ($row = mysqli_fetch_array($result)){
           $data[] = $row;  
       }
   }
   return $data;
}


//UPLOAD編
function emptyInputUpload( $content_path,$timeAt,$title,$Players,$weapons,$MonstersNum ){
    $result = null;
    if(empty($content_path) || empty($timeAt) || empty($title) || empty($Players) || empty($weapons) || empty($MonstersNum)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function UploadTA( $conn,$content_path,$hunterName,$timeAt,$title,$comment,$Players,$weapons,$MonstersNum ){
    if(!$conn){
        echo "Filed";
        header("location: ../upload.php?error=canotconnectit");
        exit();
    }

    $query=
    "INSERT 
    INTO `uploads_at`(`Content`, `huntersName`, `timeAttack`, `Title`, `Comment`, `HowManyPlayer`, `weaponsId`, `MonstersId`) 
    VALUES ('".$content_path."','".$hunterName."','".$timeAt."','".$title."','".$comment."','".$Players."','".$weapons."','".$MonstersNum."')";
     
    $result = mysqli_query($conn,$query);

    if(!$result){
        header("location: ../upload.php?error=queryerror");
        exit();
    }

    header("location: ../upload.php?error=none");
    exit();

} 
<?php
if(isset($_POST["submit"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $userName = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"]; 

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup( $name,$email,$userName,$pwd,$pwdRepeat ) !== false ){
        header("location: ../Admin/Signup.php?error=emptyInput");
        exit();
    }

    if(invalidUid($userName) !== false ){
        header("location: ../Admin/Signup.php?error=invaliduid");
        exit();
    }
    
    if(invalidEmail($email) !== false ){
        header("location: ../Admin/Signup.php?error=invalidemail");
        exit();
    }

    if(pwdMatch($pwd, $pwdRepeat) !== false ){
        header("location: ../Admin/Signup.php?error=passwordsdontmatch");
        exit();
    }

    if(uidExists($conn, $userName, $email) !== false ){
        header("location: ../Admin/Signup.php?error=usernametaken");
        exit();
    }

    createUser($conn,$name,$email,$userName,$pwd);

}else{
    header("location: ../Admin/Signup.php");
    exit();
}
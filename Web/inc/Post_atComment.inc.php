<?php
    session_start();

    $Content = $_GET["content"];

if(!isset($_SESSION["useruid"])){
    
    header("location:../Comment.php?content=$Content&error=needlogin");
    exit();
}
else{
    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';

    $userUid = $_SESSION["useruid"];
    $PostComment = $_POST["PostComment"];

    if(!$PostComment){
        header("location:../Comment.php?content=$Content&error=needsomthing");
        exit();
    }

    if(emptyInputPostComment($PostComment) !== false){
        header("location:../Comment.php?content=$Content&error=emptycomment");
        exit();
    }

    $upco = uploadcomment($conn,$Content,$userUid,$PostComment);
       
    if(!$upco){
        header("location:../Comment.php?content=$Content&error=cannotup");
        exit();
    }

    header("location:../Comment.php?content=$Content&error=none");
    exit();

}
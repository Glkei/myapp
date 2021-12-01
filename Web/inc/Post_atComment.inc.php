<?php

if(!isset($_SESSION["useruid"])){
    
    header("location:../Comment.php?error=needlogin");
    exit();
}
else{
    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';

    $userName = $_SESSION["useruid"];
    $PostComment = $_POST["PostComment"];
    
    if(!$PostComment){
        header("location:../Comment.php?error=nopost");
        exit();
    }
    
    $result = emptyInputPostComment($uN,$PostId,$PostComment);

    if(!$result){
        header("location:../Comment.php?error=emptycomment");
        exit();
    }

    if(!uploadcomment($conn,$uN,$PostId,$PostComment)){
        header("location:../Comment.php?error=noupload");
        exit();
    }
    
    header("location:../Comment.php?error=none");
    exit();

}
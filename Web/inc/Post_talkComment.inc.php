<?php
    session_start();

    $Content = $_GET["content"];

if(!isset($_SESSION["useruid"])){
    
    header("location:../CommentTalk.php?content=$Content&error=needlogin");
    exit();
}
else{
    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';

    $userUid = $_SESSION["useruid"];
    $PostComment = $_POST["PostComment"];

    if(!$PostComment){
        header("location:../CommentTalk.php?content=$Content&error=needsomthing");
        exit();
    }

    if(emptyInputPostCommentTalk($PostComment) !== false){
        header("location:../CommentTalk.php?content=$Content&error=emptycomment");
        exit();
    }

    $upco = uploadcommentTalk($conn,$Content,$userUid,$PostComment);
       
    if(!$upco){
        header("location:../CommentTalk.php?content=$Content&error=cannotup");
        exit();
    }

    header("location:../CommentTalk.php?content=$Content&error=none");
    exit();

}
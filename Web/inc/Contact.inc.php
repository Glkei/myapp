<?php

if(!isset($_POST["submit"])){

    header("Location: ../Admin/Contact.php");
    exit();

}
else{
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $purpose = $_POST["purpose"];
    $ditails = $_POST["ditails"];

    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';

    if(emptyInputContact($name,$email,$purpose,$ditails) !== false){
        header("Location: ../Admin/Contact.php?error=emptyInput");
        exit();
    }


    SendContact( $conn,$name,$email,$purpose,$ditails );

}    
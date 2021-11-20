<?php
$ServerName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "kasanegi";

$conn = mysqli_connect($ServerName,$dBUserName,$dBPassword,$dBName);

if(!$conn){
    die("Connection failed : " . mysqli_connect_error());
};
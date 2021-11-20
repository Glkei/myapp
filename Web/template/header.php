<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <header class="header-box">
            <div class="header-top-box">
                <div class="header-left">
                    <a href="Top.php"><img src="img/Home/LOGO.png"></a>
                </div>          
    
                <nav class="header-right">
                    <ul class="nav-wrapper ">
                        <li><a href="Home.php" class="wf-nav">HOME</a> </li>
                        <li><a href="Talk.php" class="wf-nav">TALK</a> </li>
                        <li><a href="Time.php" class="wf-nav">TIMEATTACK</a></li>
                        <li><a href="Admin/Contact.php" class="wf-nav">CONTACT</a></li>
                        <?php
                          if (isset($_SESSION["useruid"])) {
                            echo "<li><a href='Admin/Profile.php' class='wf-nav'>PROFILE</a></li>";
                            echo "<li><a href='inc/Logout.inc.php' class='wf-nav'>LOGOUT</a></li>";
                          }
                          else{
                            echo "<li><a href='Admin/Signup.php' class='wf-nav'>SIGNUP</a></li>";
                            echo "<li><a href='Admin/Login.php' class='wf-nav'>LOGIN</a></li>";
                          }
                        ?>
                    </ul>
                </nav>
            </div>
        </header>
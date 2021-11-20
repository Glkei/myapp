<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/Top.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
    </style>
</head>

<body>
    <!-- <script src="TOP.js"></script> -->
    <div class="container">
        <header id="header-box">
            <div class="TOP-header-container">
                <div class="float-left">

                    <a href="" id="LOGO"><img src="img/TOP/LOGO.png" alt=""></a>

                </div>

                <nav class="float-right">
                    <ul class="nav-container">
                        <li><a href="Home.php"  class="wf-nav">HOME</a></li>
                        <li><a href="Talk.php" class="wf-nav">TALK</a></li>
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

            <div class="header-content">
                <left class="left-box">
                    <!-- header-left-start -->
                    <over class="L-upside-box"></over>

                    <bootom class="L-bootom-box">
                        <div class="arrow-button">
                            <a href=""><img src="img/TOP/left.png" class="Arrow"></a>
                            <a href=""><img src="img/TOP/right.png" class="Arrow"></a>
                        </div>
                    </bootom>
                </left><!-- header-left-end -->

                <right class="right-box">
                    <!-- header-right-start -->
                    <over class="r-upside-box"></over>
                    <bootom class="r-bootom-box">

                    <img src="">

                    </bootom>
                </right><!-- header-right-end -->


            </div>

        </header>
        <!--header巻き込み -->

        <main class="center-box ">
            <!--中央枠-->
            <div class="center-container">
                <box-1 class="box-1">box-1
                    <div class="movie-wrap">
                     <iframe class ="youtube.content" width="714" height="414 " src="https://www.youtube.com/embed/yxpEHlAGKhI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    </div>
                </box-1>

                <box-2 class="box-2">box-2



                </box-2>

                <box-3 class="box-3">box-3
                
                
                
                </box-3>


            </div>
        </main>
        <!--中央枠終了-->


<footer class="footer-box">
    <left class="left">Left</left>

    <midium class="Icon-container">

        <a href="#"><img class="myIcon" src="img/TOP/pengin.png"></a>

    </midium>

    <right class="right">right


    </right>

</footer>

    </div>

</body>

</html>
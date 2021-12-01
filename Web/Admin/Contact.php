<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <!-- <link rel=stylesheet href="css/style.css"> -->
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/Contact.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <header class="header-box">
            <div class="header-top-box">
                <div class="header-left">
                    <a href="../Top.php"><img src="../img/Home/LOGO.png"></a>
                </div>          
    
                <nav class="header-right">
                    <ul class="nav-wrapper ">
                        <li><a href="../Home.php" class="wf-nav">HOME</a> </li>
                        <li><a href="../Talk.php" class="wf-nav">TALK</a> </li>
                        <li><a href="../Time.php" class="wf-nav">TIMEATTACK</a></li>
                        <li><a href="Contact.php" class="wf-nav">CONTACT</a></li>
                        <?php
                          if (isset($_SESSION["useruid"])) {
                            echo "<li><a href='Profile.php' class='wf-nav'>PROFILE</a></li>";
                            echo "<li><a href='../inc/Logout.inc.php' class='wf-nav'>LOGOUT</a></li>";
                          }
                          else{
                            echo "<li><a href='Signup.php' class='wf-nav'>SIGNUP</a></li>";
                            echo "<li><a href='Login.php' class='wf-nav'>LOGIN</a></li>";
                          }
                        ?>
                    </ul>
                </nav>
            </div>
        </header>
    <main class="center-box">
        <div class="contact-form">
            <div class="left-side">
                <img src="../img/SEND-ICON.png" class="form-icon">
            </div>
            <div class="right-side ">

             <form class="write-something" action="../inc/Contact.inc.php" method="POST" autocomplete="off">

                <h3 class="wrap-input" style="font-size: 30px;">お問い合わせフォーム</h3>
                <div class="wrap-input"><input class="iS" type="text" id=1 placeholder=" name"  name="name"></div>
                <div class="wrap-input"><input class="iS" type="email" id=2 placeholder=" Email"  name="email"></div>

                <div class="wrap-input">
                    <select name="purpose" class="iS" >
                      <option hidden>連絡の要件</option>
                      <option value="1">本サイトでの新機能提案</option>
                      <option value="2">削除依頼</option>
                      <option value="3">その他お問い合わせ</option>
                    </select>
                </div>

                <div class="wrap-input">
                    <textarea rows="10" cols="60" 
                    placeholder="お問い合わせ内容" style="font-size: 20px" 
                    required name="ditails"></textarea></div>
                <div class="submit"><input type="submit" name="submit" value="送信" id="btn"></div>

             </form>

            </div>
        </div>
    </main>
<?php
  require_once '../template/footer.php';
?>
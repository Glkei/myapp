<!DOCTYPE html>
<html lang="ja">
<head>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Signup.css">
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class="container-box">
    <header class="header-box">
    <div class="header-top-box">
        <div class="header-left">
            <a href="../TOP.php"><img src="../img/Home/LOGO.png"></a>
        </div>          

        <nav class="header-right">
                    <ul class="nav-wrapper ">
                        <li><a href="../Home.php" class="wf-nav">HOME</a> </li>
                        <li><a href="../Talk.php" class="wf-nav">TALK</a> </li>
                        <li><a href="../Time.php" class="wf-nav">TIMEATTACK</a></li>
                        <li><a href="Contact.php" class="wf-nav">CONTACT</a></li>
                        <?php
                          if (isset($_SESSION["useruid"])) {
                            echo "<li><a href='Profile.php' class='wf-nav'>FROFILE</a></li>";
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

    <section class="Signup-form">
     <h2>アカウント新規作成</h2>
     <div class="Signup-form-form">
        <form class="Signup-form-wrapper" action="../inc/Signup.inc.php" method="POST">
          <input type="text" name = "name" placeholder ="フルネーム">
          <input type="text" name = "email" placeholder ="メールアドレス">
          <input type="text" name = "uid" placeholder ="ユーザー名">
          <input type="password" name = "pwd" placeholder ="パスワード">
          <input type="password" name = "pwdrepeat" placeholder ="パスワード再入力">
          <button type="submit" name ="submit" class="button">次へ</button>
        </form>
     </div>
<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyInput"){
    echo "<p>未入力欄があります</p>";
    }
    else if( $_GET["error"] == "invaliduid"){
    echo "<p>ユーザー名を入力してください</p>";
    }
    else if( $_GET["error"] == "invalidemail"){
    echo "<p>メールアドレスを正しく表記してください</p>";
    }
    else if( $_GET["error"] == "passwordsdontmatch"){
    echo "<p>パスワードが合いません</p>";
    }
    else if( $_GET["error"] == "stmtfailed"){
    echo "<p>Chosa your stmt</p>";
    }
    else if( $_GET["error"] == "usernametaken"){
    echo "<p>このユーザー名は既に使われています</p>";
    }
    else if( $_GET["error"] == "none"){
    echo "<div class='access-log'>
          <p>アカウント作成できました</p>
          <a href='Login.php' class='ri-'>LOGIN</a>
          </div>";
    }
}
?>
</section>

<?php
  require_once '../template/footer.php';    
?>
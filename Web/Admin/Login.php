<?php
    session_start();
    if(isset($_SESSION['useruid'])){
      header("location: /");
      exit();
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Login.css">
    <meta charset="UTF-8">
    <title>Login</title>
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
                            echo "<li><a href='Profile.php' class='wf-nav'>PROFILE</a></li>";
                            echo "<li><a href='../inc/Logout.inc.php' class='wf-nav'>Logout</a></li>";
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
 <div class="container wf-en">
  <form method="POST" class="main-box" action="../inc/Login.inc.php" autocomplete="off">
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">ユーザー名/メールアドレス</label>
          <input  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uid" placeholder="ユーザー名/メールアドレス">
      </div>
      
      <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">パスワード</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="パスワード" name="pwd">
          <!-- <div id="emailHelp" class="form-text" style="color:red;"></div> -->
      </div>
      
      <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">ログイン状態を保つ</label>
          <a href="">パスワードを忘れた時</a>
          <a href="../inc/Signup.inc.php">新規作成</a>
      </div>
        <button type="submit" class="btn btn-primary" name="submit">ログイン</button>
  </form>
  <?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyInput"){
    echo "<p>未入力欄があります</p>";
    }
    else if($_GET["error"] == "wronglogin"){
    echo "<p>メールアドレスかパスワードが間違っています</p>";
    }
}
?>
 </div>

 <footer>
    
 </footer>

<?php
  require_once '../template/footer.php';
?>
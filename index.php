<!DOCTYPE html>
<?php session_start(); ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP Session Login Test</title>

  </head>
  <body>
    <h1>Hello World!</h1>
    <?php
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
      echo "<p>로그인을 해 주세요! <a href=\"login.php\">[로그인]</a><a href=\"join.php\">[회원가입]</a></p>";
    } else {
      $user_name = $_SESSION['user_name'];
      // $user_name = $_SESSION['user_name'];
      echo "<p><strong>$user_name</strong>님 환영합니다.";
      echo "<a href=\"logout.php\">[로그아웃]</a></p>";
    }
    ?>
    <hr />
    <p>본문 영역</p>
  </body>
</html>

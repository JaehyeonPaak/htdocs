<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>웹티즌 사전과제 【필수과제 2】 2-1</title>
    <style>
    body {
      text-align: center;
    }
    </style>
  </head>
  <body>
    <h1>웹티즌 사전과제 【필수과제 2】 2-1</h1>
    <?php
      if(!isset($_SESSION['user_id'])) { ?>
        <a href='login.php'>Login</a>
    <?php
      }
      else {
        $user_id = $_SESSION['user_id'];
        $user_class = $_SESSION['user_class'];
        if(isset($_SESSION['session_expire'])) {
          if(abs($_SESSION['login_time'] - time()) > 5 * 60) {
            echo 'Session has expired.';
            session_destroy();
          }
          else {
            $_SESSION['login_time'] = time();
          }
        }
     ?>
        <p><?=$user_id?>님, 환영합니다! 회원등급은 <?=$user_class?>입니다.<p>
        <a href='logout.php'>Logout</a>
    <?php
      }
     ?>
  </body>
</html>

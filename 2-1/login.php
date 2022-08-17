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
          <form action='login_process.php' method='POST'>
            <input type='text' placeholder='ID' name='user_id'><br>
            <input type='password' placeholder='Password' name='password'><br>
            <button>Login</button>
          </form>
      <?php
        }
        else {
          header('Location: '.'/2-1/index.php');
        }
       ?>
  </body>
</html>

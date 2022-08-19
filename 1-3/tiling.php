<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>웹티즌 사전과제 【필수과제 1】 1-3</title>
  </head>
  <body>
    <h1>2xn 타일링<h1>
    <form action='tiling.php' method='GET'>
      <input type=text name='val' placeholder='1이상 1000이하 숫자 입력'>
      <input type=submit value='입력'><br>
    <form>
  </body>
</html>

<?php
//8/19/2022
  if(isset($_GET['val'])) {
    $val = $_GET['val'];
    echo fibonacci($val) % 10007;
  }

  function fibonacci($val) {
    if($val <= 1) {
      return 1;
    }
    else {
      return fibonacci($val - 1) + fibonacci($val - 2);
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>웹티즌 사전과제 【필수과제 1】 1-2</title>
  </head>
  <body>
    <h1>소수 출력<h1>
    <form action='prime_number.php' method='GET'>
      <input type=text name='val1' placeholder='첫번째 자연수'>
      <input type=text name='val2' placeholder='두번째 자연수'>
      <input type=submit value='입력'><br>
    <form>
  </body>
</html>

<?php
  if(isset($_GET['val1']) && isset($_GET['val2'])) {
    $val1 = $_GET['val1'];
    $val2 = $_GET['val2'];

    $prime = array_fill(0, $val2 + 1, true);
    $prime[0] = $prime[1] = false;

    for($i = 2; $i <= $val2 * $val2; $i++) {
      for($j = 2; $j <= $val2 / $i; $j++) {
        if($prime[$i * $j] == false) {
          continue;
        }
        else {
          $prime[$i * $j] = false;
        }
      }
    }
    for($i = $val1; $i <= $val2; $i++) {
      if($prime[$i] == true) {
        echo $i.'<br>';
      }
    }
  }
 ?>

<?php
  $mysqli = mysqli_connect('localhost', 'root', 'wogus1035', "member");
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>웹티즌 사전과제 【필수과제 2】 2-2</title>
    <style>
      body {
        text-align: center;
      }
      .field {
        margin-bottom: 20px;
      }
      table {
        margin:auto;
      }
      table, td, th {
        border-collapse : collapse;
        border : 1px solid black;
      }
      .gra {
        font-size: 9px;
        color:#808080;
      }
    </style>
  </head>
  <body>
  <h1>웹티즌 사전과제 【필수과제 2】 2-2</h1>
  <div>
    <form action='index.php' method='POST'>
      <input type=text name='target' placeholder='대상을 입력하세요'>
      <input type=submit value='전송'><br>
    <form>
  </div>
  <p><div class='gra'>
    ex) 고길동 또치 (대상을 띄어쓰기로 구분합니다)
  </div></p>
  <p><table border='1'>
    <th>대상</th>
    <th>둘리에 대한 호감도</th>
    <?php
      if(isset($_POST['target'])) {
        $list = explode(' ', $_POST['target']);
        foreach ($list as $value) {
          $query = "SELECT * FROM member WHERE target='$value'";
          $result = mysqli_query($mysqli, $query);
          if($result === false) {
            echo mysqli_error($mysqli);
          }
          $row = mysqli_fetch_array($result);
          ?>
          <tr>
            <td><?=$row['target']?></td>
            <td><?=$row['likability']?></td>
          </tr>
          <?php
        }
      }
      ?>
    </table></p>
    </body>
</html>

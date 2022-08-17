<?php
  include_once('list.php');
  foreach ($list as $value) {
    $name = $value[0];
    $gender = $value[1];
    $color = NULL;
    if(strcmp($gender, '남') == 0) {
      $color = '#66CCFF';
    }
    else if(strcmp($gender, '여') == 0){
      $color = '#FFCCFF';
    }
    else {
      $color = NULL;
    }
    $message = '
      <html>
      <head>
      <title>웹티즌 사전과제 【필수과제 2】 2-3</title>
      <style>
        .div {
          border: 1px solid black;
          height: 200px;
          width: 800px;
          text-align: center;
          background-color: '.$color.';
        }
      </style>
      </head>
        <body>
          <div class=div>
            <h2>청첩장</h2>
            <h2>철수와 영이가 5월 4일 결혼합니다. '.$name.'님 꼭 와주세요!</h2>
          </div>
        </body>
      </html>';
      echo $message;
    $to = 'name@example.com';
    $from = 'wogus392@gmail.com';
    $subject = '청첩장';
    $headers = "MIME-Version: 1.0"."\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
    $headers .= 'From: '.$from;
    if(mail($to, $subject, $message, $headers)) {
      echo "Message sent successfully!<br>";
    }
    else {
      echo "Failed to send message<br>";
    }
  }
?>

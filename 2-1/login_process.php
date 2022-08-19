<?php //8/19/2022
  session_start();

  $user_id = $_POST['user_id'];
  $password = $_POST['password'];

  $mysqli = mysqli_connect('localhost', 'root', 'wogus1035', "member");
  $query = "SELECT * FROM member WHERE user_id='$user_id' AND password='$password'";
  $result = mysqli_query($mysqli, $query);
  $row = mysqli_fetch_array($result);

  if(!isset($row['user_id']) || $row['password'] != $password) {
    header('Location: '.'/2-1/login.php');
  }
  else {
    $_SESSION['session_expire'] = '5minute';
    $_SESSION['login_time'] = time();
    $user_class = $row['user_class'];
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_class'] = $user_class;
    header('Location: '.'/2-1/index.php');
  }
 ?>

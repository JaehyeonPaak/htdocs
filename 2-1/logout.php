<?php
  session_start();
  session_destroy();
  header('Location: '.'/2-1/index.php');
 ?>

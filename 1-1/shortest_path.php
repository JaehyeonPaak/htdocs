<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>웹티즌 사전과제 【필수과제 1】 1-1</title>
  </head>
  <body>
    <h1>최단거리<h1>
    <form>
  </body>
</html>

<?php
  $num_v = 5;
  $num_e = 6;
  $start = 1;

  $graph = array();
  for($i = 1; $i <= $num_v; ++$i) {
    for($j = 1; $j <= $num_v; ++$j) {
      $graph[$i][$j] = INF;
    }
  }
  $graph[5][1] = 1;
  $graph[1][2] = 2;
  $graph[1][3] = 3;
  $graph[2][3] = 4;
  $graph[2][4] = 5;
  $graph[3][4] = 6; 

  $visited = array_fill(1, $num_v, false);
  $distance = array();

  dijkstra($start, $num_v, $graph, $visited, $distance);

  function dijkstra($start, $num_v, $graph, $visited, $distance) {
    for($i = 1; $i <= $num_v; ++$i) {
      $distance[$i] = $graph[$start][$i];
    }
    $distance[$start] = 0;;
    $visited[$start] = true;
    for($j = 1; $j <= $num_v - 1; ++$j) {
      $current = small_dist($num_v, $visited, $distance);
      $visited[$current] = true;
      for($j = 1; $j <= $num_v; ++$j) {
        if(!$visited[$j]) {
          if($distance[$j] > ($graph[$current][$j] + $distance[$current])) {
            $distance[$j] = $graph[$current][$j] + $distance[$current];
          }
        }
      }
    }
    for($i = 1; $i <= $num_v; ++$i) {
      echo $start.' -> '.$i.' = ';
      if($distance[$i] == INF) {
        echo 'INF'.'<br>';
      }
      else {
        echo $distance[$i].'<br>';
      }
    }
  }

  function small_dist($num_v, $visited, $distance) {
    $min = INF;
    $index = 0;
    for($i = 1; $i <= $num_v; ++$i) {
      if(!$visited[$i] && $distance[$i] < $min) {
        $min = $distance[$i];
        $index = $i;
      }
    }
    return $index;
  }
?>

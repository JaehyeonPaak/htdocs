
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
//8/19/2022
  $num_v = 5; //정점 개수
  $num_e = 6; //간선 개수
  $start = 1; //시작점
  $graph = array(); //그래프 정보
  for($i = 1; $i <= $num_v; $i++) {
    for($j = 1; $j <= $num_v; $j++) {
      $graph[$i][$j] = INF;
    }
  }
  $graph[5][1] = 1; //(5, 1, 1)
  $graph[1][2] = 2; //(1, 2, 2)
  $graph[1][3] = 3; //(1, 3, 3)
  $graph[2][3] = 4; //(2, 3, 4)
  $graph[2][4] = 5; //(2, 4, 5)
  $graph[3][4] = 6; //(3, 4, 6)
  $visit = array_fill(1, $num_v, false); //방문 여부 리스트
  $dist = array_fill(1, $num_v, INF); //특정 정점에서 다른 정점 까지의 거리

  dijkstra($start, $num_v, $graph, $visit, $dist);

  function dijkstra($start, $num_v, $graph, $visit, $dist) {
    for($i = 1; $i < $num_v + 1; $i++) {
      if($i === $start) {
        $dist[$start] = 0; //자기 자신을 가리킬 경우 0
      }
      else {
        $dist[$i] = $graph[$start][$i];
      }
    }
    $visit[$start] = true; //방문 했을 경우 true로 설정
    for($j = 1; $j < $num_v; $j++) {
      $min = INF; $now = 0;
      for($i = 1; $i < $num_v + 1; $i++) { //이웃 정점 중 가중치가 가장 작은 값을 now로 설정
        if(!$visit[$i] && $dist[$i] < $min) {
          $min = $dist[$i];
          $now = $i;
        }
      }
      $visit[$now] = true; //now로 설정한 정점으로 이동
      for($j = 1; $j < $num_v + 1; $j++) {
        if(!$visit[$j]) {
          if($graph[$now][$j] + $dist[$now] < $dist[$j]) {
            $dist[$j] = $graph[$now][$j] + $dist[$now];
          }
        }
      }
    }
    echo '시작점: '.$start.'<br>';
    for($i = 1; $i < $num_v + 1; $i++) {
      echo $start.' -> '.$i.' = ';
      if($dist[$i] != INF) {
        echo $dist[$i].'<br>';
      }
      else {
        echo 'INF'.'<br>';
      }
    }
  }
?>

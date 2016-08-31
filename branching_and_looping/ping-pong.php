<?php

function pingPong ($number) {
  $result = array(0);

  for ($idx = 1; $idx <= $number; $idx++) {
    if ($idx % 3 == 0 && $idx % 5 == 0) {
      array_push($result, "ping-pong");
    } elseif ($idx % 3 == 0) {
      array_push($result, "ping");
    } elseif ($idx % 5 == 0) {
      array_push($result, "pong");
    } else {
      array_push($result, $idx);
    }
  }

  return $result;
}

?>

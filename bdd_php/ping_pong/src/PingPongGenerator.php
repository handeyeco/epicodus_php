<?php

class PingPongGenerator {
  function generatePingPongArray ($number) {
    $result = [];

    for ($index = 1; $index <= $number; $index++) {
      if ($index % 3 == 0 && $index % 5 == 0) {
        array_push($result, "Ping-Pong");
      } elseif ($index % 3 == 0) {
        array_push($result, "Ping");
      } elseif ($index % 5 == 0) {
        array_push($result, "Pong");
      } else {
        array_push($result, $index);
      }
    }

    return $result;
  }
}

?>

<?php

class Game {
  public $player1;
  public $player2;

  function __construct ($p1, $p2) {
    $this->player1 = $p1;
    $this->player2 = $p2;
  }

  function returnWinner () {
    $p1 = $this->player1;
    $p2 = $this->player2;

    if ($p1 == $p2) {
      return "Tie";

    } elseif (("Rock" == $p1 || "Rock" == $p2) && ("Paper" == $p1 || "Paper" == $p2)) {
      return "Paper";

    } elseif (("Paper" == $p1 || "Paper" == $p2) && ("Scissors" == $p1 || "Scissors" == $p2)) {
      return "Scissors";

    } else {
      return "Rock";
    }

  }
}

?>

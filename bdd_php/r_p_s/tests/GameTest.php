<?php

require_once __DIR__."/../src/Game.php";

class GameTest extends PHPUnit_Framework_TestCase {

  function test_rockBeatsScissors () {
    $game = new Game("Rock", "Scissors");

    $result = $game->returnWinner();

    $this->assertEquals("Rock", $result);
  }

  function test_scissorsBeatsPaper () {
    $game = new Game("Paper", "Scissors");

    $result = $game->returnWinner();

    $this->assertEquals("Scissors", $result);
  }

  function test_paperBeatsRock () {
    $game = new Game("Paper", "Rock");

    $result = $game->returnWinner();

    $this->assertEquals("Paper", $result);
  }

  function test_tie () {
    $game = new Game("Paper", "Paper");

    $result = $game->returnWinner();

    $this->assertEquals("Tie", $result);
  }

}

?>

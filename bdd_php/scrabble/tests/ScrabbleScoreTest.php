<?php

require_once __DIR__."/../src/ScrabbleScore.php";

class ScrabbleScoreTest extends PHPUnit_Framework_TestCase {

  function test_singleLetter () {
    $score = new ScrabbleScore();

    $result = $score->getScore("a");

    $this->assertEquals(1, $result);
  }

  function test_handleUpperCase () {
    $score = new ScrabbleScore();

    $result = $score->getScore("Q");

    $this->assertEquals(10, $result);
  }

  function test_firstRegEx () {
    $score = new ScrabbleScore();

    $result = $score->getScore("q");

    $this->assertEquals(10, $result);
  }

  function test_secondRegEx () {
    $score = new ScrabbleScore();

    $result = $score->getScore("B");

    $this->assertEquals(3, $result);
  }

  function test_shortWord () {
    $score = new ScrabbleScore();

    $result = $score->getScore("Bat");

    $this->assertEquals(5, $result);
  }

  function test_longWord () {
    $score = new ScrabbleScore();

    $result = $score->getScore("inconceivable");

    $this->assertEquals(22, $result);
  }

}

?>

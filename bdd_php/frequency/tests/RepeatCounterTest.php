<?php

require_once __DIR__."/../src/RepeatCounter.php";

class RepeatCounterTest extends PHPUnit_Framework_TestCase {

  function test_countSingleWord () {
    $count = new RepeatCounter();

    $result = $count->countRepeats("hello", "hello");

    $this->assertEquals(1, $result);
  }

  function test_returnZeroIfNone () {
    $count = new RepeatCounter();

    $result = $count->countRepeats("hell", "hello");

    $this->assertEquals(0, $result);
  }

  function test_multipleMatches () {
    $count = new RepeatCounter();

    $result = $count->countRepeats("hello", "hello hello");

    $this->assertEquals(2, $result);
  }

  function test_complexString () {
    $count = new RepeatCounter();

    $result = $count->countRepeats("barn", "The barn is where we always played. I can't believe they're tearing that barn down.");

    $this->assertEquals(2, $result);
  }

  function test_caseInsensitive () {
    $count = new RepeatCounter();

    $result = $count->countRepeats("hello", "Hello hello");

    $this->assertEquals(2, $result);
  }

}

?>

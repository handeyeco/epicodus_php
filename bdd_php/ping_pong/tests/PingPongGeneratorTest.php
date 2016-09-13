<?php

require_once "src/PingPongGenerator.php";

class TitleCaseGeneratorTest extends PHPUnit_Framework_TestCase {

  function test_returnArrayOfNumbers () {
    $gen = new PingPongGenerator();

    $result = $gen->generatePingPongArray(2);

    $this->assertEquals([1,2], $result);

  }

  function test_returnPingOnThrees () {
    $gen = new PingPongGenerator();

    $result = $gen->generatePingPongArray(3);

    $this->assertEquals([1,2,"Ping"], $result);
  }

  function test_returnPongOnFives () {
    $gen = new PingPongGenerator();

    $result = $gen->generatePingPongArray(5);

    $this->assertEquals([1, 2, "Ping", 4, "Pong"], $result);
  }

  function test_pingPong () {
    $gen = new PingPongGenerator();

    $result = $gen->generatePingPongArray(15);

    $this->assertEquals("Ping-Pong", $result[14]);
  }

}

?>

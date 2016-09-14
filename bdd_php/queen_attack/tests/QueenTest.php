<?php

require_once "src/Queen.php";

class QueenTest extends PHPUnit_Framework_TestCase {

  function test_queenHasProperties () {
    $queen = new Queen("1", "1");

    $this->assertEquals("1", $queen->x_pos);
  }

  function test_attackOnXTrue () {
    $queen = new Queen("1", "1");

    $result = $queen->canAttack("1", "8");

    $this->assertEquals(true, $result);
  }

  function test_attackOnXFalse () {
    $queen = new Queen("1", "1");

    $result = $queen->canAttack("8", "5");

    $this->assertEquals(false, $result);
  }

  function test_attackOnYTrue () {
    $queen = new Queen("1", "1");

    $result = $queen->canAttack("8", "1");

    $this->assertEquals(true, $result);
  }

  function test_attackOnYFalse () {
    $queen = new Queen("1", "1");

    $result = $queen->canAttack("8", "5");

    $this->assertEquals(false, $result);
  }

  function test_attackOnDiagonalTrue () {
    $queen = new Queen("1", "1");

    $result = $queen->canAttack("8", "8");

    $this->assertEquals(true, $result);
  }

  function test_attackOnDiagonalFalse () {
    $queen = new Queen("1", "1");

    $result = $queen->canAttack("8", "5");

    $this->assertEquals(false, $result);
  }

}

?>

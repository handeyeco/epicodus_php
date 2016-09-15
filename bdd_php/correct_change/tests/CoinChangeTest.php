<?php

require_once __DIR__."/../src/CoinChange.php";

class CoinChangeTest extends PHPUnit_Framework_TestCase {

  function test_singleCoin () {
    $change = new CoinChange();

    $result = $change->leastChange(10);

    $this->assertEquals(array("Pennies" => 0, "Nickles" => 0, "Dimes" => 1, "Quarters" => 0), $result);
  }

  function test_twoCoins () {
    $change = new CoinChange();

    $result = $change->leastChange(26);

    $this->assertEquals(array("Pennies" => 1, "Nickles" => 0, "Dimes" => 0, "Quarters" => 1), $result);
  }

  function test_threeCoins () {
    $change = new CoinChange();

    $result = $change->leastChange(55);

    $this->assertEquals(array("Pennies" => 0, "Nickles" => 1, "Dimes" => 0, "Quarters" => 2), $result);
  }

  function test_allCoins () {
    $change = new CoinChange();

    $result = $change->leastChange(41);

    $this->assertEquals(array("Pennies" => 1, "Nickles" => 1, "Dimes" => 1, "Quarters" => 1), $result);
  }

  function test_doesntBreakDecimal () {
    $change = new CoinChange();

    $result = $change->leastChange(41.28);

    $this->assertEquals(array("Pennies" => 1, "Nickles" => 1, "Dimes" => 1, "Quarters" => 1), $result);
  }

}

?>

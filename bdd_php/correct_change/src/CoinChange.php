<?php

class CoinChange {
  function leastChange ($amount) {
    $amount = (int) $amount;
    $pennies = 0;
    $nickels = 0;
    $dimes = 0;
    $quarters = 0;
    $total = 0;

    while ($total + 25 <= $amount) {
      $quarters++;
      $total += 25;
    }

    while ($total + 10 <= $amount) {
      $dimes++;
      $total += 10;
    }

    while ($total + 5 <= $amount) {
      $nickels++;
      $total += 5;
    }

    while ($total + 1 <= $amount) {
      $pennies++;
      $total += 1;
    }

    return array("Pennies" => $pennies, "Nickles" => $nickels, "Dimes" => $dimes, "Quarters" => $quarters);

  }
}

?>

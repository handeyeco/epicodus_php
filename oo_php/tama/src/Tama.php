<?php

class Tama {
  private $time;
  private $food;
  private $sleep;
  private $play;
  private $isDead;

  function __construct () {
    $this->time = 0;
    $this->food = 10;
    $this->sleep = 10;
    $this->play = 10;
    $this->isDead = false;
  }

  function getTime () {
    return $this->time;
  }

  function getFood () {
    return $this->food;
  }

  function getSleep () {
    return $this->sleep;
  }

  function getPlay () {
    return $this->play;
  }

  function getIsDead () {
    return $this->isDead;
  }

  function addTime () {
    $this->time++;
    $this->food -= rand(0, 2);
    $this->sleep -= rand(0, 2);
    $this->play -= rand(0, 2);
    $this->updateLife();
  }

  function feed () {
    $this->food += rand(0, 2);
    $this->addTime();
    $this->updateLife();
  }

  function rest () {
    $this->sleep += rand(0, 2);
    $this->addTime();
    $this->updateLife();
  }

  function run () {
    $this->play += rand(0, 2);
    $this->addTime();
    $this->updateLife();
  }

  function updateLife () {
    if ($this->food <= 0 || $this->sleep <= 0 || $this->play <= 0 ||
        $this->food >= 11 || $this->sleep >= 11 || $this->play >= 11) {
      $this->isDead = true;
    }
  }

  function saveNew () {
    array_push($_SESSION['tamagotchi'], $this);
  }

  static function emptyTama () {
    $_SESSION['tamagotchi'] = array();
  }
}

?>

<?php

class Car {
  private $make_model;
  private $price;
  private $miles;

  function __construct($make_model, $price, $miles) {
    $this->make_model = $make_model;
    $this->price = $price;
    $this->miles = $miles;
  }

  function setMakeModel($make_model) {
    $this->make_model = $make_model;
  }

  function getMakeModel() {
    return $this->make_model;
  }

  function setPrice($price) {
    if ($price > 0) {
      $this->price = $price;
    }
  }

  function getPrice() {
    return $this->price;
  }

  function setMiles($miles) {
    if ($miles >= 0) {
      $this->miles = $miles;
    }
  }

  function getMiles() {
    return $this->miles;
  }
}

?>

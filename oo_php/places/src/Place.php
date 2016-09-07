<?php

class Place {
  private $city;
  private $state;
  private $attraction;

  function __construct($city, $state, $attraction) {
    $this->city = $city;
    $this->state = $state;
    $this->attraction = $attraction;
  }

  function setCity ($city) {
    $this->city = (string) $city;
  }

  function getCity () {
    return $this->city;
  }

  function setState ($state) {
    $this->state = (string) $state;
  }

  function getState () {
    return $this->state;
  }

  function setAttraction ($attraction) {
    $this->attraction = $attraction;
  }

  function getAttraction () {
    return $this->attraction;
  }

  function save () {
    array_push($_SESSION['list_of_places'], $this);
  }

  static function getAll() {
    return $_SESSION['list_of_places'];
  }

  static function deleteAll() {
    $_SESSION['list_of_places'] = array();
  }
}

?>

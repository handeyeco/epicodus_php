<?php

class Restaurant {

  private $name;
  private $website;
  private $number;
  private $address;
  private $cuisine_id;
  private $id;

  function __construct($name, $website, $number, $address, $cuisine_id, $id = null) {
    $this->name       = $name;
    $this->website    = $website;
    $this->number     = $number;
    $this->address    = $address;
    $this->cuisine_id = $cuisine_id;
    $this->id         = $id;
  }

  function setName($name) {
    $this->name = (string) $name;
  }

  function setWebsite($website) {
    $this->website = (string) $website;
  }

  function setNumber($number) {
    $this->number = (string) $number;
  }

  function setAddress($address) {
    $this->address = (string) $address;
  }

  function setCuisineId($cuisine_id) {
    $this->cuisine_id = (int) $cuisine_id;
  }

  function getName() {
    return $this->name;
  }

  function getWebsite() {
    return $this->website;
  }

  function getNumber() {
    return $this->number;
  }

  function getAddress() {
    return $this->address;
  }

  function getCuisineId() {
    return $this->cuisine_id;
  }

  function getId() {
    return $this->id;
  }

  function save() {
    $name       = $this->getName();
    $website    = $this->getWebsite();
    $number     = $this->getNumber();
    $address    = $this->getAddress();
    $cuisine_id = $this->getCuisineId();

    $GLOBALS['DB']->exec("INSERT INTO restaurants (name, website, number, address, cuisine_id) VALUES ('$name', '$website', '$number', '$address', $cuisine_id)");
    $this->id = $GLOBALS['DB']->lastInsertId();
  }

  function update($name, $website, $number, $address, $cuisine_id) {
    $id = $this->getId();
    $cuisine_id = (int) $cuisine_id;

    $GLOBALS['DB']->exec("UPDATE restaurants SET name='$name', website='$website', number='$number', address='$address', cuisine_id='$cuisine_id' WHERE id=$id");

    $this->setName($name);
    $this->setWebsite($website);
    $this->setNumber($number);
    $this->setAddress($address);
    $this->setCuisineId($cuisine_id);
  }

  function delete() {
    $id = $this->getId();
    $GLOBALS['DB']->exec("DELETE FROM restaurants WHERE id=$id");
  }

  static function getAll() {
    $query = $GLOBALS['DB']->query("SELECT * FROM restaurants");
    $result = array();

    foreach ($query as $restaurant) {
      $name       = $restaurant['name'];
      $website    = $restaurant['website'];
      $number     = $restaurant['number'];
      $address    = $restaurant['address'];
      $cuisine_id = $restaurant['cuisine_id'];
      $id         = $restaurant['id'];

      $new_restaurant = new Restaurant($name, $website, $number, $address, $cuisine_id, $id);
      array_push($result, $new_restaurant);
    }

    return $result;
  }

  static function getById($id) {
    $query = $GLOBALS['DB']->query("SELECT * FROM restaurants WHERE id=$id");
    $result = array();

    foreach ($query as $restaurant) {
      $name       = $restaurant['name'];
      $website    = $restaurant['website'];
      $number     = $restaurant['number'];
      $address    = $restaurant['address'];
      $cuisine_id = $restaurant['cuisine_id'];
      $id         = $restaurant['id'];

      $new_restaurant = new Restaurant($name, $website, $number, $address, $cuisine_id, $id);
      array_push($result, $new_restaurant);
    }

    return $result[0];
  }

  static function getByCuisine($cuisine_id) {
    $query = $GLOBALS['DB']->query("SELECT * FROM restaurants WHERE cuisine_id=$cuisine_id");
    $result = array();

    foreach ($query as $restaurant) {
      $name       = $restaurant['name'];
      $website    = $restaurant['website'];
      $number     = $restaurant['number'];
      $address    = $restaurant['address'];
      $cuisine_id = $restaurant['cuisine_id'];
      $id         = $restaurant['id'];

      $new_restaurant = new Restaurant($name, $website, $number, $address, $cuisine_id, $id);
      array_push($result, $new_restaurant);
    }

    return $result;
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM restaurants");
  }

}

?>

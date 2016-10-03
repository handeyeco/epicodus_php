<?php

class City {

  private $city;
  private $region;
  private $id;

  function __construct($city, $region, $id = null) {
    $this->city   = $city;
    $this->region = $region;
    $this->id     = $id;
  }

  function getCity() {
    return $this->city;
  }

  function getRegion() {
    return $this->region;
  }

  function getId() {
    return $this->id;
  }

  function save() {
    $city   = $this->getCity();
    $region = $this->getRegion();

    $GLOBALS['DB']->exec("INSERT INTO cities (city, region) VALUES ('$city', '$region')");
    $this->id = $GLOBALS['DB']->lastInsertId();
  }

  static function getAll() {
    $query = $GLOBALS['DB']->query("SELECT * FROM cities");
    $result = array();

    foreach ($query as $city) {
      $city_name  = $city['city'];
      $region     = $city['region'];
      $id         = $city['id'];

      $new_city = new City($city_name, $region, $id);
      array_push($result, $new_city);
    }

    return $result;
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM cities");
  }

}

?>

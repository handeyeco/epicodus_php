<?php

class Animal {

  private $type_id;
  private $name;
  private $gender;
  private $admitted;
  private $id;

  function __construct($type_id, $name, $gender, $admitted, $id) {
    $this->type_id  = $type_id;
    $this->name     = $name;
    $this->gender   = $gender;
    $this->admitted = $admitted;
    $this->id       = $id;
  }

  function getName() {
    return $this->name;
  }

  function getId() {
    return $this->id;
  }

  function save() {
    $GLOBALS['DB']->exec("INSERT INTO animals (type_id, name, gender, admitted) VALUES ($this->type_id, '$this->name', '$this->gender', '$this->admitted')");

    $this->id = $GLOBALS['DB']->lastInsertId();
  }

  static function getAll() {
    $query = $GLOBALS['DB']->query("SELECT * FROM animals");
    $result = array();

    foreach ($query as $animal) {
      $type_id  = $animal['type_id'];
      $name     = $animal['name'];
      $gender   = $animal['gender'];
      $admitted = $animal['admitted'];
      $id       = $animal['id'];

      $new_animal = new Animal($type_id, $name, $gender, $admitted, $id);
      array_push($result, $new_animal);
    }

    return $result;
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM animals");
  }

}

?>

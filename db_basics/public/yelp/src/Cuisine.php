<?php

class Cuisine {

  private $name;
  private $id;

  function __construct($name, $id = null) {
    $this->name = $name;
    $this->id = $id;
  }

  function setName($new_name) {
    $this->name = $new_name;
  }

  function getName() {
    return $this->name;
  }

  function getId() {
    return $this->id;
  }

  function save() {
    $name = $this->getName();
    $GLOBALS['DB']->exec("INSERT INTO cuisines (name) VALUES ('$name')");

    $this->id = $GLOBALS['DB']->lastInsertId();
  }

  function update($name) {
    $id = $this->getId();
    $GLOBALS['DB']->exec("UPDATE cuisines SET name='$name' WHERE id=$id");
    $this->name = $name;
  }

  function delete() {
    $id = $this->getId();
    $GLOBALS['DB']->exec("DELETE FROM cuisines WHERE id=$id");
    $GLOBALS['DB']->exec("DELETE FROM restaurants WHERE cuisine_id=$id");
  }

  static function getAll() {
    $query = $GLOBALS['DB']->query("SELECT * FROM cuisines");
    $result = array();

    foreach ($query as $cuisine) {
      $name = $cuisine['name'];
      $id = $cuisine['id'];

      $new_cuisine = new Cuisine($name, $id);
      array_push($result, $new_cuisine);
    }

    return $result;
  }

  static function getById($id) {
    $query = $GLOBALS['DB']->query("SELECT * FROM cuisines WHERE id=$id");
    $result = array();

    foreach ($query as $cuisine) {
      $name = $cuisine['name'];
      $id = $cuisine['id'];

      $new_cuisine = new Cuisine($name, $id);
      array_push($result, $new_cuisine);
    }

    return $result[0];
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM cuisines");
  }

}

?>

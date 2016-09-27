<?php

class Type {

  private $name;
  private $id;

  function __construct($name, $id = null) {
    $this->name = $name;
    $this->id   = $id;
  }

  function getName() {
    return $this->name;
  }

  function getId() {
    return $this->id;
  }

  function save() {
    $GLOBALS['DB']->exec("INSERT INTO types (name) VALUES ('$this->name')");

    $this->id = $GLOBALS['DB']->lastInsertId();
  }

  static function getTypeById($search_id) {
    $getAll = Type::getAll();
    $result = null;

    foreach ($getAll as $type) {
      $compare_id = $type->getId();
      if ($compare_id == $search_id) {
        $result = $type;
      }
    }

    return $result;
  }

  static function getAll() {
    $query = $GLOBALS['DB']->query("SELECT * FROM types");
    $result = array();

    foreach($query as $type) {
      $new_type = new Type($type['name'], $type['id']);
      array_push($result, $new_type);
    }

    return $result;
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM types");
  }

}

?>

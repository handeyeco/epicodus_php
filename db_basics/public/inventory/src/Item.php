<?php

class Item {
  private $name;
  private $year;

  function __construct($name, $year) {
    $this->name = $name;
    $this->year = $year;
  }

  function setName($new_name) {
    $this->name = (string) $new_name;
  }

  function getName() {
    return $this->name;
  }

  function setYear($new_year) {
    $this->year = (int) $year;
  }

  function getYear() {
    return $this->year;
  }

  function save() {
    $name = $this->getName();
    $year = $this->getYear();
    $GLOBALS['DB']->exec("INSERT INTO inventory (name, year) VALUES ('$name', $year)");
  }

  static function getAll() {
    $query = $GLOBALS['DB']->query("SELECT * FROM inventory");
    $result = array();

    foreach ($query as $item) {
      $new_item = new Item($item['name'], $item['year']);
      array_push($result, $new_item);
    }

    return $result;
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM inventory");
  }
}

?>

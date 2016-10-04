<?php

class Course {

  private $name;
  private $number;
  private $id;

  function __construct($name, $number, $id = null){
    $this->name   = $name;
    $this->number = $number;
    $this->id     = $id;
  }

  function getName() {
    return $this->name;
  }

  function getNumber() {
    return $this->number;
  }

  function getId() {
    return $this->id;
  }

  function save() {
    $name   = $this->getName();
    $number = $this->getNumber();

    $GLOBALS['DB']->exec("INSERT INTO courses (name, number) VALUES ('$name', '$number')");
    $this->id = $GLOBALS['DB']->lastInsertId();
  }

  static function getAll() {
    $query = $GLOBALS['DB']->query("SELECT * FROM courses");
    $result = array();

    foreach ($query as $course) {
      $name   = $course['name'];
      $number = $course['number'];
      $id     = $course['id'];
      $new_course = new Course($name, $number, $id);
      array_push($result, $new_course);
    }

    return $result;
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM courses");
  }

}

?>

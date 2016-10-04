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

  function addStudent($student_id) {
    $course_id = $this->getId();

    $GLOBALS['DB']->exec("INSERT INTO courses_students (student_id, course_id) VALUES ($student_id, $course_id)");
  }

  function getAllStudents() {
    $course_id = $this->getId();
    $result = array();

    $query = $GLOBALS['DB']->query(
      "SELECT students.*
       FROM courses
       JOIN courses_students ON (courses.id = courses_students.course_id)
       JOIN students ON (courses_students.student_id = students.id)
       WHERE courses.id = $course_id"
    );

    foreach ($query as $student) {
      $name       = $student['name'];
      $enrollment = $student['enrollment'];
      $id         = $student['id'];
      $new_student = new Student($name, $enrollment, $id);
      array_push($result, $new_student);
    }

    return $result;
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

  static function getById($id) {
    $query = Course::getAll();
    $result = null;

    foreach($query as $course) {
      $course_id = $course->getId();
      if ($id == $course_id) {
        $result = $course;
      }
    }

    return $result;
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM courses");
  }

}

?>

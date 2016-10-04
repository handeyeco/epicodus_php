<?php

class Student {

  private $name;
  private $enrollment;
  private $id;

  function __construct($name, $enrollment, $id = null) {
    $this->name       = $name;
    $this->enrollment = $enrollment;
    $this->id         = $id;
  }

  function getName() {
    return $this->name;
  }

  function getEnrollment() {
    return $this->enrollment;
  }

  function getId() {
    return $this->id;
  }

  function save() {
    $name       = $this->getName();
    $enrollment = $this->getEnrollment();

    $GLOBALS['DB']->exec("INSERT INTO students (name, enrollment) VALUES ('$name', '$enrollment')");
    $this->id = $GLOBALS['DB']->lastInsertId();
  }

  function addCourse($course_id) {
    $student_id = $this->getId();
    $GLOBALS['DB']->exec("INSERT INTO courses_students (student_id, course_id) VALUES ($student_id, $course_id)");
  }

  function getAllCourses() {
    $student_id = $this->getId();
    $result = array();

    $query = $GLOBALS['DB']->query(
      "SELECT courses.*
       FROM students
       JOIN courses_students ON (students.id = courses_students.student_id)
       JOIN courses ON (courses_students.course_id = courses.id)
       WHERE students.id = $student_id"
    );

    foreach ($query as $course) {
      $name   = $course['name'];
      $number = $course['number'];
      $id     = $course['id'];
      $new_course = new Course($name, $number, $id);
      array_push($result, $new_course);
    }

    return $result;
  }

  static function getAll() {
    $query = $GLOBALS['DB']->query("SELECT * FROM students");
    $result = array();

    foreach ($query as $student) {
      $name       = $student['name'];
      $enrollment = $student['enrollment'];
      $id         = $student['id'];
      $new_student = new Student($name, $enrollment, $id);
      array_push($result, $new_student);
    }

    return $result;
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM students");
  }

}

?>

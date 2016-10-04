<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once __DIR__."/../src/Student.php";
require_once __DIR__."/../src/Course.php";
require_once __DIR__."/../private/test_db_login.php";

class StudentTest extends PHPUnit_Framework_TestCase {

  function tearDown() {
    Student::deleteAll();
  }

  function test_construct() {
    $new_student = new Student("James Dean", "10/03/2016");

    $this->assertEquals("James Dean", $new_student->getName());
  }

  function test_save() {
    $new_student = new Student("James Dean", "10/03/2016");
    $new_student->save();

    $query = Student::getAll();

    $this->assertEquals([$new_student], $query);
  }

  function test_getAll() {
    $new_student = new Student("James Dean", "10/03/2016");
    $new_student2 = new Student("Margo Chow", "11/23/2016");
    $new_student->save();
    $new_student2->save();

    $query = Student::getAll();

    $this->assertEquals([$new_student, $new_student2], $query);
  }

  function test_deleteAll() {
    $new_student = new Student("James Dean", "10/03/2016");
    $new_student->save();

    Student::deleteAll();
    $query = Student::getAll();

    $this->assertEquals([], $query);
  }

}

?>

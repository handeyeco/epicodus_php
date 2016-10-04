<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once __DIR__."/../src/Course.php";
require_once __DIR__."/../src/Student.php";
require_once __DIR__."/../private/test_db_login.php";

class CourseTest extends PHPUnit_Framework_TestCase {

  function tearDown() {
    Course::deleteAll();
  }

  function test_construct() {
    $new_course = new Course("History", "HIST100");

    $this->assertEquals("HIST100", $new_course->getNumber());
  }

  function test_save() {
    $new_course = new Course("History", "HIST100");
    $new_course->save();

    $query = Course::getAll();

    $this->assertEquals([$new_course], $query);
  }

  function test_getAll() {
    $new_course = new Course("History", "HIST100");
    $new_course2 = new Course("Music", "MUSC100");
    $new_course->save();
    $new_course2->save();

    $query = Course::getAll();

    $this->assertEquals([$new_course, $new_course2], $query);
  }

  function test_deleteAll() {
    $new_course = new Course("History", "HIST100");
    $new_course->save();

    Course::deleteAll();
    $query = Course::getAll();

    $this->assertEquals([], $query);
  }

}

?>

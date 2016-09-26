<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Task.php";
require_once "private/test_db_login.php";

class TaskTest extends PHPUnit_Framework_TestCase {

  protected function tearDown() {
    Task::deleteAll();
  }

  function test_save() {
    $description = "Wash the dog";
    $test_task = new Task($description);

    $test_task->save();

    $result = Task::getAll();
    $this->assertEquals($test_task, $result[0]);
  }

  function test_getAll() {
    $description1 = "Wash the dog";
    $description2 = "Water the lawn";
    $test_task1 = new Task($description1);
    $test_task2 = new Task($description2);
    $test_task1->save();
    $test_task2->save();

    $result = Task::getAll();

    $this->assertEquals([$test_task1, $test_task2], $result);
  }

  function test_deleteAll() {
    $description = "Wash the dog";
    $description2 = "Water the lawn";
    $test_task = new Task($description);
    $test_task->save();
    $test_task2 = new Task($description2);
    $test_task2->save();

    Task::deleteAll();

    $result = Task::getAll();
    $this->assertEquals([], $result);
  }

  function test_getId() {
    $description = "Wash the dog";
    $id = 1;
    $test_Task = new Task($description, $id);

    $result = $test_Task->getId();

    $this->assertEquals(1, $result);
  }

  function test_find() {
    $description1 = "Wash the dog";
    $description2 = "Water the lawn";
    $test_task1 = new Task($description1);
    $test_task2 = new Task($description2);
    $test_task1->save();
    $test_task2->save();

    $id = $test_task1->getId();
    $result = Task::find($id);

    $this->assertEquals($test_task1, $result);
  }

}


?>

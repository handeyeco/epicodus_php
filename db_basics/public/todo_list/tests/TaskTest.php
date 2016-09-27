<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Task.php";
require_once "src/Category.php";
require_once "private/test_db_login.php";

class TaskTest extends PHPUnit_Framework_TestCase {

  protected function tearDown() {
    Task::deleteAll();
    Category::deleteAll();
  }

  function test_getID() {
    $name = "Home stuff";
    $id = null;
    $test_category = new Category($name, $id);
    $test_category->save();

    $description = "Wash the dog";
    $category_id = $test_category->getId();
    $test_task = new Task($description, $id, $category_id);
    $test_task->save();

    $result = $test_task->getId();

    $this->assertEquals(true, is_numeric($result));
  }

  function test_getCategoryId() {
    $name = "Home stuff";
    $id = null;
    $test_category = new Category($name, $id);
    $test_category->save();

    $description = "Wash the dog";
    $category_id = $test_category->getId();
    $test_task = new Task($description, $category_id, $id);
    $test_task->save();

    $result = $test_task->getCategoryId();

    $this->assertEquals(true, is_numeric($result));
  }

  function test_save() {
    $name = "Home stuff";
    $id = null;
    $test_category = new Category($name, $id);
    $test_category->save();

    $description = "Wash the dog";
    $category_id = $test_category->getId();
    $test_task = new Task($description, $category_id, $id);

    $test_task->save();

    $result = Task::getAll();
    $this->assertEquals($test_task, $result[0]);
  }

  function test_getAll() {
    $name = "Home stuff";
    $id = null;
    $test_category = new Category($name, $id);
    $test_category->save();

    $category_id = $test_category->getId();

    $description1 = "Wash the dog";
    $description2 = "Water the lawn";
    $test_task1 = new Task($description1, $category_id, $id);
    $test_task2 = new Task($description2, $category_id, $id);
    $test_task1->save();
    $test_task2->save();

    $result = Task::getAll();

    $this->assertEquals([$test_task1, $test_task2], $result);
  }

  function test_deleteAll() {
    $name = "Home stuff";
    $id = null;
    $test_category = new Category($name, $id);
    $test_category->save();

    $description = "Wash the dog";
    $category_id = $test_category->getId();
    $test_task = new Task($description, $id, $category_id);
    $test_task->save();

    $description2 = "Water the lawn";
    $test_task2 = new Task($description2, $id, $category_id);
    $test_task2->save();

    Task::deleteAll();

    $result = Task::getAll();
    $this->assertEquals([], $result);
  }

  function test_find() {
    $name = "Home stuff";
    $id = null;
    $test_category = new Category($name, $id);
    $test_category->save();

    $description = "Wash the dog";
    $category_id = $test_category->getId();
    $test_task = new Task($description, $category_id, $id);
    $test_task->save();

    $description2 = "Water the lawn";
    $test_task2 = new Task($description2, $category_id, $id);
    $test_task2->save();

    $result = Task::find($test_task->getId());

    $this->assertEquals($test_task, $result);
  }

}


?>

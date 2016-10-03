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
    $due_date = "2000-10-10";
    $category_id = $test_category->getId();
    $test_task = new Task($description, $due_date, $id);
    $test_task->save();

    $result = $test_task->getId();

    $this->assertEquals(true, is_numeric($result));
  }

  function test_save() {
    $name = "Home stuff";
    $id = null;
    $test_category = new Category($name, $id);
    $test_category->save();

    $description = "Wash the dog";
    $due_date = "2000-10-10";
    $category_id = $test_category->getId();
    $test_task = new Task($description, $due_date, $id);

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
    $due_date = "2000-10-10";
    $test_task1 = new Task($description1, $due_date, $id);
    $test_task2 = new Task($description2, $due_date, $id);
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
    $due_date = "2000-10-10";
    $category_id = $test_category->getId();
    $test_task = new Task($description, $due_date, $id);
    $test_task->save();

    $description2 = "Water the lawn";
    $test_task2 = new Task($description2, $due_date, $id);
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
    $due_date = "2000-10-10";
    $category_id = $test_category->getId();
    $test_task = new Task($description, $due_date, $id);
    $test_task->save();

    $description2 = "Water the lawn";
    $test_task2 = new Task($description2, $due_date, $id);
    $test_task2->save();

    $result = Task::find($test_task->getId());

    $this->assertEquals($test_task, $result);
  }

  function test_addCategory() {
    $name = "Work stuff";
    $id = null;
    $test_category = new Category($name, $id);
    $test_category->save();

    $description = "File reports";
    $test_task = new Task($description, $id);
    $test_task->save();

    $test_task->addCategory($test_category);

    $this->assertEquals($test_task->getCategories(), [$test_category]);
  }

  function test_getCategories() {
    $name = "Work stuff";
    $test_category = new Category($name, null);
    $test_category->save();

    $name2 = "Volunteer stuff";
    $test_category2 = new Category($name, null);
    $test_category2->save();

    $description = "File reports";
    $test_task = new Task($description, null);
    $test_task->save();

    $test_task->addCategory($test_category);
    $test_task->addCategory($test_category2);

    $this->assertEquals($test_task->getCategories(), [$test_category, $test_category2]);
  }

  function test_delete() {
    $name = "Work stuff";
    $test_category = new Category($name, null);
    $test_category->save();

    $description = "Files reports";
    $test_task = new Task($description, null);
    $test_task->save();

    $test_task->addCategory($test_category);
    $test_task->delete();

    $this->assertEquals([], $test_category->getTasks());
  }

  function test_orderByDate() {
    $test_task = new Task("Wash Clothes", "2016-10-10", null);
    $test_task2 = new Task("Do Dishes", "1987-10-10", null);
    $test_task3 = new Task("Do Dishes", "2000-10-10", null);
    $test_task->save();
    $test_task2->save();
    $test_task3->save();

    $result = Task::getAll();

    $this->assertEquals($result, [$test_task2, $test_task3, $test_task]);
  }

  function test_complete() {
    $new_task = new Task("Wash Clothes", "2016-10-10");
    $new_task->save();

    $new_task->toggleComplete();
    $new_task->toggleComplete();

    $this->assertEquals($new_task->getComplete(), 0);
  }

}


?>

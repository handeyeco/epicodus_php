<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Category.php";
require_once "private/test_db_login.php";

class CategoryTest extends PHPUnit_Framework_TestCase {

  protected function tearDown() {
    Category::deleteAll();
    Task::deleteAll();
  }

  function test_getName() {
    $name = "Work stuff";
    $test_Category = new Category($name);

    $result = $test_Category->getName();

    $this->assertEquals($name, $result);
  }

  function test_getId() {
    $name = "Work stuff";
    $id = 1;
    $test_Category = new Category($name, $id);

    $result = $test_Category->getId();

    $this->assertEquals(true, is_numeric($result));
  }

  function test_save() {
    $name = "Work stuff";
    $test_Category = new Category($name);
    $test_Category->save();

    $result = Category::getAll();

    $this->assertEquals($test_Category, $result[0]);
  }

  function test_update() {
    $name = "Work stuff";
    $id = null;
    $test_category = new Category($name, $id);
    $test_category->save();

    $new_name = "Home stuff";

    $test_category->update($new_name);

    $this->assertEquals("Home stuff", $test_category->getName());
  }

  function test_getAll() {
    $name = "Work stuff";
    $name2 = "Home stuff";
    $test_category = new Category($name);
    $test_category2 = new Category($name2);
    $test_category->save();
    $test_category2->save();

    $result = Category::getAll();

    $this->assertEquals([$test_category, $test_category2], $result);
  }

  function test_deleteAll() {
    $name = "Wash the dog";
    $name2 = "Home stuff";
    $test_category = new Category($name);
    $test_category2 = new Category($name2);
    $test_category->save();
    $test_category2->save();

    Category::deleteAll();
    $result = Category::getAll();

    $this->assertEquals([], $result);
  }

  function test_delete() {
    $name = "Work stuff";
    $id = null;
    $test_category = new Category($name, $id);
    $test_category->save();

    $name2 = "Home stuff";
    $test_category2 = new Category($name2, $id);
    $test_category2->save();

    $test_category->delete();

    $this->assertEquals([$test_category2], Category::getAll());
  }

  function test_deleteCategoryTasks() {
    $name = "Work stuff";
    $id = null;
    $test_category = new Category($name, $id);
    $test_category->save();

    $description = "Build website";
    $category_id = $test_category->getId();
    $test_task = new Task($description, $id, $category_id);
    $test_task->save();

    $test_category->delete();

    $this->assertEquals([], Task::getAll());
  }

  function test_find() {
    $name = "Wash the dog";
    $name2 = "Home stuff";
    $test_category = new Category($name);
    $test_category2 = new Category($name2);
    $test_category->save();
    $test_category2->save();

    $result = Category::find($test_category->getId());

    $this->assertEquals($test_category, $result);
  }

  function test_getTasks() {
    $name = "Work stuff";
    $id = null;
    $test_category = new Category($name, $id);
    $test_category->save();

    $test_category_id = $test_category->getId();

    $description = "Email client";
    $due_date = "2000-10-10";
    $test_task = new Task($description, $due_date, $test_category_id, $id);
    $test_task->save();

    $description2 = "Meet with boss";
    $test_task2 = new Task($description2, $due_date, $test_category_id, $id);
    $test_task2->save();

    $result = $test_category->getTasks();

    $this->assertEquals([$test_task, $test_task2], $result);
  }

}

?>

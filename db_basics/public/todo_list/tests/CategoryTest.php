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

}

?>

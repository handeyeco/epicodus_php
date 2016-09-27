<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Animal.php";
require_once "src/Type.php";
require_once "private/test_db_login.php";

class AnimalTest extends PHPUnit_Framework_TestCase {

  protected function tearDown() {
    Animal::deleteAll();
  }

  function test_construct() {
    $new_animal= new Animal(1, "Bert", "Male", "2012-10-10", "Boxer", null);

    $result = $new_animal->getName();

    $this->assertEquals("Bert", $result);
  }

  function test_getAll() {
    $animal1 = new Animal(1, "Bert", "Male", "2012-10-10", "Boxer", null);
    $animal2 = new Animal(1, "Ernie", "Male", "2014-11-12", "Calico", null);
    $animal1->save();
    $animal2->save();

    $getAll = Animal::getAll();
    $count = count($getAll);

    $this->assertEquals(2, $count);
  }

  function test_deleteAll() {
    $animal1 = new Animal(1, "Bert", "Male", "2012-10-10", "Boxer", null);
    $animal2 = new Animal(1, "Ernie", "Male", "2014-11-12", "Calico", null);
    $animal1->save();
    $animal2->save();

    Animal::deleteAll();
    $getAll = Animal::getAll();
    $count = count($getAll);

    $this->assertEquals(0, $count);
  }

  function test_save() {
    $new_animal= new Animal(1, "Bert", "Male", "2012-10-10", "Boxer", null);
    $new_animal->save();

    $result = Animal::getAll();

    $this->assertEquals($new_animal, $result[0]);
  }

  function test_id() {
    $new_animal= new Animal(1, "Bert", "Male", "2012-10-10", "Boxer", null);
    $new_animal->save();

    $result = $new_animal->getId();

    $this->assertEquals(true, is_numeric($result));
  }

}

?>

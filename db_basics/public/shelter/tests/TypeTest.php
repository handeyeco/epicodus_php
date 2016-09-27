<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Animal.php";
require_once "src/Type.php";
require_once "private/test_db_login.php";

class TypeTest extends PHPUnit_Framework_TestCase {

  protected function tearDown() {
    Type::deleteAll();
  }

  function test_construct() {
    $new_type = new Type("cat", null);

    $result = $new_type->getName();

    $this->assertEquals($result, "cat");
  }

  function test_save() {
    $new_type = new Type("cat", null);
    $new_type->save();

    $result = Type::getAll();

    $this->assertEquals($result[0], $new_type);
  }

  function test_getAll() {
    $type1 = new Type("cat", null);
    $type2 = new Type("dog", null);
    $type1->save();
    $type2->save();

    $getAll = Type::getAll();
    $count = count($getAll);

    $this->assertEquals(2, $count);
  }

  function test_deleteAll() {
    $type1 = new Type("cat", null);
    $type2 = new Type("dog", null);
    $type1->save();
    $type2->save();

    Type::deleteAll();
    $getAll = Type::getAll();
    $count = count($getAll);

    $this->assertEquals(0, $count);
  }

}

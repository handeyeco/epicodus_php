<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Item.php";
require_once "private/test_db_login.php";

class ItemTest extends PHPUnit_Framework_TestCase {

  protected function tearDown() {
    Item::deleteAll();
  }

  function test_construct() {
    $item = new Item("HTML5 Programming", 2011);

    $result = $item->getYear();

    $this->assertEquals($result, 2011);
  }

  function test_save() {
    $item = new Item("HTML5 Programming", 2011);
    $item->save();

    $result = Item::getAll();

    $this->assertEquals($result[0], $item);
  }

  function test_getAll() {
    $item1 = new Item("HTML5 Programming", 2011);
    $item2 = new Item("ES6 and Beyond", 2016);
    $item1->save();
    $item2->save();

    $result = Item::getAll();

    $this->assertEquals($result, [$item1, $item2]);
  }

  function test_deleteAll() {
    $item1 = new Item("HTML5 Programming", 2011);
    $item2 = new Item("ES6 and Beyond", 2016);
    $item1->save();
    $item2->save();

    Item::deleteAll();

    $result = Item::getAll();

    $this->assertEquals($result, []);
  }

}

?>

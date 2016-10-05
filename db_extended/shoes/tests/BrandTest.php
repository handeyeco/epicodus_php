<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once __DIR__."/../src/Brand.php";
require_once __DIR__."/../src/Store.php";
require_once __DIR__."/../private/test_db_login.php";

class BrandTest extends PHPUnit_Framework_TestCase {

  function tearDown() {
    Brand::deleteAll();
    Store::deleteAll();
  }

  function test_construct() {
    $brand = new Brand("New Balance");

    $this->assertEquals("New Balance", $brand->getName());
  }

  function test_save() {
    $brand = new Brand("New Balance");
    $brand->save();

    $result = Brand::getAll();

    $this->assertEquals([$brand], $result);
  }

  function test_getAll() {
    $brand = new Brand("New Balance");
    $brand2 = new Brand("Nike");
    $brand->save();
    $brand2->save();

    $result = Brand::getAll();

    $this->assertEquals([$brand, $brand2], $result);
  }

  function test_deleteAll() {
    $brand = new Brand("New Balance");
    $brand->save();

    Brand::deleteAll();
    $result = Brand::getAll();

    $this->assertEquals([], $result);
  }

  function test_delete() {
    $brand = new Brand("New Balance");
    $brand2 = new Brand("Nike");
    $brand->save();
    $brand2->save();

    $brand->delete();
    $result = Brand::getAll();

    $this->assertEquals([$brand2], $result);
  }

  function test_getById() {
    $brand = new Brand("New Balance");
    $brand2 = new Brand("Nike");
    $brand->save();
    $brand2->save();

    $id = $brand2->getId();
    $result = Brand::getById($id);

    $this->assertEquals($brand2, $result);
  }

  function test_getStores() {
    $store = new Store("Nike");
    $store->save();
    $brand = new Brand("New Balance");
    $brand->save();
    $store->addBrand($brand->getId());

    $result = $brand->getStores();

    $this->assertEquals([$store], $result);
  }

  function test_update() {
    $brand = new Brand("New Balance");
    $brand->save();
    $brand->update("Nike");

    $result = Brand::getAll();

    $this->assertEquals("Nike", $result[0]->getName());
  }

}

?>

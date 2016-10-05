<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once __DIR__."/../src/Store.php";
require_once __DIR__."/../src/Brand.php";
require_once __DIR__."/../private/test_db_login.php";

class StoreTest extends PHPUnit_Framework_TestCase {

  function tearDown() {
    Store::deleteAll();
    Brand::deleteAll();
  }

  function test_construct() {
    $store = new Store("Nike");

    $this->assertEquals("Nike", $store->getName());
  }

  function test_save() {
    $store = new Store("Nike");
    $store->save();

    $result = Store::getAll();

    $this->assertEquals([$store], $result);
  }

  function test_getAll() {
    $store = new Store("Nike");
    $store2 = new Store("Payless");
    $store->save();
    $store2->save();

    $result = Store::getAll();

    $this->assertEquals([$store, $store2], $result);
  }

  function test_deleteAll() {
    $store = new Store("Nike");
    $store->save();

    Store::deleteAll();
    $result = Store::getAll();

    $this->assertEquals([], $result);
  }

  function test_delete() {
    $store = new Store("Nike");
    $store2 = new Store("Payless");
    $store->save();
    $store2->save();

    $store2->delete();
    $result = Store::getAll();

    $this->assertEquals([$store], $result);
  }

  function test_addBrand() {
    $store = new Store("Nike");
    $store->save();
    $brand = new Brand("New Balance");
    $brand->save();
    $store->addBrand($brand->getId());

    $result = $store->getBrands();

    $this->assertEquals([$brand], $result);
  }

  function test_getById() {
    $store = new Store("Nike");
    $store2 = new Store("Payless");
    $store->save();
    $store2->save();

    $result = Store::getById($store2->getId());

    $this->assertEquals($store2, $result);
  }

  function test_update() {
    $store = new Store("Nike");
    $store->save();
    $store->update("Puma");

    $result = Store::getAll();

    $this->assertEquals("Puma", $result[0]->getName());
  }

  function test_deleteBrand() {
    $store = new Store("Nike");
    $store->save();
    $brand = new Brand("New Balance");
    $brand->save();
    $store->addBrand($brand->getId());
    $store->deleteBrand($brand->getId());

    $result = $store->getBrands();

    $this->assertEquals([], $result);
  }

}

<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Cuisine.php";
require_once "src/Restaurant.php";
require_once "private/test_db_login.php";

class CuisineTest extends PHPUnit_Framework_TestCase {

  protected function tearDown() {
    Cuisine::deleteAll();
    Restaurant::deleteAll();
  }

  function test_construct() {
    $new_cuisine = new Cuisine("Tacos", null);

    $result = $new_cuisine->getName();

    $this->assertEquals("Tacos", $result);
  }

  function test_save() {
    $new_cuisine = new Cuisine("Tacos", null);
    $new_cuisine->save();

    $query = Cuisine::getAll();

    $this->assertEquals([$new_cuisine], $query);
  }

  function test_getAll() {
    $new_cuisine = new Cuisine("Tacos", null);
    $new_cuisine2 = new Cuisine("Burgers", null);
    $new_cuisine->save();
    $new_cuisine2->save();

    $query = Cuisine::getAll();

    $this->assertEquals([$new_cuisine, $new_cuisine2], $query);
  }

  function test_deleteAll() {
    $new_cuisine = new Cuisine("Tacos", null);
    $new_cuisine2 = new Cuisine("Burgers", null);
    $new_cuisine->save();
    $new_cuisine2->save();

    Cuisine::deleteAll();
    $query = Cuisine::getAll();

    $this->assertEquals([], $query);
  }

  function test_update() {
    $new_cuisine = new Cuisine("Tacos", null);
    $new_cuisine->save();
    $new_cuisine->update("Burgers");

    $query = Cuisine::getAll();
    $result = $query[0]->getName();

    $this->assertEquals("Burgers", $result);
  }

  function test_deleteCuisine() {
    $new_cuisine = new Cuisine("Tacos", null);
    $new_cuisine2 = new Cuisine("Burgers", null);
    $new_cuisine->save();
    $new_cuisine2->save();

    $new_cuisine->delete();
    $query = Cuisine::getAll();

    $this->assertEquals([$new_cuisine2], $query);
  }

  function test_deleteRestaurantsWithCuisine() {
    $new_cuisine = new Cuisine("Tacos", null);
    $new_cuisine->save();
    $cuisine_query = Cuisine::getAll();
    $cuisine_id = $cuisine_query[0]->getId();

    $new_restaurant = new Restaurant("Taco Bell", "www.tacobell.com", "555-555-5555", "12345 SE Ramona St", $cuisine_id, null);
    $new_restaurant2 = new Restaurant("Burger King", "www.burgerking.com", "555-555-5555", "67893 SE Ramona St", $cuisine_id, null);
    $new_restaurant->save();
    $new_restaurant2->save();

    $new_cuisine->delete();
    $query = Restaurant::getAll();

    $this->assertEquals([], $query);
  }

}

?>

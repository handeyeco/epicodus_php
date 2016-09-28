<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/Cuisine.php";
require_once "src/Restaurant.php";
require_once "private/test_db_login.php";

class RestaurantTest extends PHPUnit_Framework_TestCase {

  protected function tearDown() {
    Cuisine::deleteAll();
    Restaurant::deleteAll();
  }

  function test_construct() {
    $new_restaurant = new Restaurant("Taco Bell", "www.tacobell.com", "555-555-5555", "12345 SE Ramona St", 1, null);

    $result = $new_restaurant->getName();

    $this->assertEquals("Taco Bell", $result);
  }

  function test_save() {
    $new_restaurant = new Restaurant("Taco Bell", "www.tacobell.com", "555-555-5555", "12345 SE Ramona St", 1, null);
    $new_restaurant->save();

    $query = Restaurant::getAll();

    $this->assertEquals([$new_restaurant], $query);
  }

  function test_getAll() {
    $new_restaurant = new Restaurant("Taco Bell", "www.tacobell.com", "555-555-5555", "12345 SE Ramona St", 1, null);
    $new_restaurant2 = new Restaurant("Burger King", "www.burgerking.com", "555-555-5555", "67893 SE Ramona St", 2, null);
    $new_restaurant->save();
    $new_restaurant2->save();

    $query = Restaurant::getAll();

    $this->assertEquals([$new_restaurant, $new_restaurant2], $query);
  }

  function test_deleteAll() {
    $new_restaurant = new Restaurant("Taco Bell", "www.tacobell.com", "555-555-5555", "12345 SE Ramona St", 1, null);
    $new_restaurant2 = new Restaurant("Burger King", "www.burgerking.com", "555-555-5555", "67893 SE Ramona St", 2, null);
    $new_restaurant->save();
    $new_restaurant2->save();

    Restaurant::deleteAll();
    $query = Restaurant::getAll();

    $this->assertEquals([], $query);
  }

  function test_update() {
    $new_restaurant = new Restaurant("Taco Bell", "www.tacobell.com", "555-555-5555", "12345 SE Ramona St", 1, null);
    $new_restaurant->save();
    $new_restaurant->update("Burger King", "www.burgerking.com", "555-555-5555", "67893 SE Ramona St", 2);

    $query = Restaurant::getAll();
    $result = $query[0]->getName();

    $this->assertEquals("Burger King", $result);
  }

  function test_delete() {
    $new_restaurant = new Restaurant("Taco Bell", "www.tacobell.com", "555-555-5555", "12345 SE Ramona St", 1, null);
    $new_restaurant2 = new Restaurant("Burger King", "www.burgerking.com", "555-555-5555", "67893 SE Ramona St", 2, null);
    $new_restaurant->save();
    $new_restaurant2->save();

    $new_restaurant->delete();
    $query = Restaurant::getAll();

    $this->assertEquals([$new_restaurant2], $query);
  }

}

?>

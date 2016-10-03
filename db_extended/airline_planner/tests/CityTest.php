<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once __DIR__."/../src/City.php";

class CityTest extends PHPUnit_Framework_TestCase {

  function tearDown() {
    City::deleteAll();
  }

  function test_construct() {
    $new_city = new City("London", "England");

    $result = $new_city->getCity();

    $this->assertEquals("London", $result);
  }

  function test_save() {
    $new_city = new City("London", "England");
    $new_city->save();

    $result = City::getAll();

    $this->assertEquals([$new_city], $result);
  }

  function test_getAll() {
    $new_city = new City("London", "England");
    $new_city2 = new City("Paris", "France");
    $new_city->save();
    $new_city2->save();

    $result = City::getAll();

    $this->assertEquals([$new_city, $new_city2], $result);
  }

  function test_getPrettyFormat() {
    $new_city = new City("London", "England");

    $result = $new_city->getPrettyFormat();

    $this->assertEquals("London, England", $result);
  }

}

?>

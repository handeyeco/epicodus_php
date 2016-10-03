<?php

/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once __DIR__."/../src/Flight.php";
require_once __DIR__."/../src/City.php";
require_once __DIR__."/../private/test_db_login.php";

class FlightTest extends PHPUnit_Framework_TestCase {

  function tearDown() {
    Flight::deleteAll();
    City::deleteAll();
  }

  function test_construct() {
    $new_flight = new Flight("10:00", 1, 2, "On Time");

    $result = $new_flight->getOriginId();

    $this->assertEquals(1, $result);
  }

  function test_save() {
    $new_flight = new Flight("10:00", 1, 2, "On Time");
    $new_flight->save();

    $result = Flight::getAll();

    $this->assertEquals([$new_flight], $result);
  }

  function test_getAll() {
    $new_flight = new Flight("10:00", 1, 2, "On Time");
    $new_flight2 = new Flight("12:00", 2, 1, "On Time");
    $new_flight->save();
    $new_flight2->save();

    $result = Flight::getAll();

    $this->assertEquals([$new_flight2, $new_flight], $result);
  }

  function test_updateStatus() {
    $new_flight = new Flight("10:00", 1, 2, "On Time");
    $new_flight->save();

    $new_flight->updateStatus("Delayed");
    $result = Flight::getById($new_flight->getId());

    $this->assertEquals("Delayed", $result->getStatus());
  }

  function test_getFlightInformation() {
    $new_city = new City("London", "England");
    $new_city2 = new City("Paris", "France");
    $new_city->save();
    $new_city2->save();

    $new_flight = new Flight("10:00", $new_city->getId(), $new_city2->getId(), "On Time");
    $new_flight->save();

    $result = $new_flight->getFlightInformation();

    $this->assertEquals("London, England -> Paris, France", $result);
  }

}

?>

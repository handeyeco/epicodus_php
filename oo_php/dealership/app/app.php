<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Car.php";

$app = new Silex\Application();

$app->get("/", function() {
  return
    "<!DOCTYPE html>
    <html>
    <head>
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
      <title>Find a Car</title>
    </head>
    <body>
      <div class='container'>
      <h1>Find a Car!</h1>
      <form action='/results'>
          <div class='form-group'>
              <label for='price'>Enter Maximum Price:</label>
              <input id='price' name='price' class='form-control' type='number'>
          </div>
          <div class='form-group'>
              <label for='mileage'>Enter Maximum Mileage:</label>
              <input id='mileage' name='mileage' class='form-control' type='number'>
          </div>
          <button type='submit' class='btn btn-success'>Submit</button>
      </form>
      </div>
    </body>
    </html>";
});

$app->get("/results", function() {
  $price = $_GET['price'];
  $mileage = $_GET['mileage'];

  $porsche = new Car("2014 Porsche 911", 114991, 7864);
  $ford = new Car("2011 Ford F450", 55995, 14241);
  $lexus = new Car("2013 Lexus RX 350", 44700, 20000);
  $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);

  $cars = array($porsche, $ford, $lexus, $mercedes);
  $output = "";

  foreach ($cars as $car) {
    if ($car->getPrice() <= $price && $car->getMiles() <= $mileage) {
      $output .= "<li>" . $car->getMakeModel() . "</li><ul><li>$" . $car->getPrice() . "</li><li>Miles: " . $car->getMiles() . "</li></ul>";
    }
  }

  if (!$output) {
    $output = "No matches found";
  }

  return
    "<!DOCTYPE html>
    <html>
    <head>
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
      <title>Find a Car</title>
    </head>
    <body>
      <div class='container'>
      <h1>Find a Car!</h1>
      <form action='/results'>
          <div class='form-group'>
              <label for='price'>Enter Maximum Price:</label>
              <input id='price' name='price' class='form-control' type='number'>
          </div>
          <div class='form-group'>
              <label for='mileage'>Enter Maximum Mileage:</label>
              <input id='mileage' name='mileage' class='form-control' type='number'>
          </div>
          <button type='submit' class='btn btn-success'>Submit</button>
      </form>
      <h2>Results:</h2>
      <ul>$output</ul>
      </div>
    </body>
    </html>";

});

return $app;

?>

<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Flight.php";
require_once __DIR__."/../src/City.php";
require_once __DIR__."/../private/db_login.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

use Symfony\Component\HttpFoundation\Request;
Request::enableHttpMethodParameterOverride();

$app->get("/", function () use ($app) {
  return $app['twig']->render("index.html.twig", array(
    "flights" => Flight::getAll(),
    "cities" => City::getAll()
  ));
});

$app->get("/flight/{id}", function ($id) use ($app) {
  return $app['twig']->render("flight.html.twig", array(
    "flight" => Flight::getById($id)
  ));
});

$app->post("/flight", function () use ($app) {
  $depart_time    = $_POST['depart_time'];
  $origin_id      = $_POST['origin_id'];
  $destination_id = $_POST['destination_id'];
  $status         = $_POST['status'];

  $new_flight = new Flight($depart_time, $origin_id, $destination_id, $status);
  $new_flight->save();

  return $app['twig']->render("index.html.twig", array(
    "flights" => Flight::getAll(),
    "cities" => City::getAll()
  ));
});

$app->post("/city", function () use ($app) {
  $city   = $_POST['city'];
  $region = $_POST['region'];

  $new_city = new City($city, $region);
  $new_city->save();

  return $app['twig']->render("index.html.twig", array(
    "flights" => Flight::getAll(),
    "cities" => City::getAll()
  ));
});

$app->patch("/flight/{id}", function ($id) use ($app) {
  $flight = Flight::getById($id);
  $flight->updateStatus($_POST['status']);

  return $app['twig']->render("flight.html.twig", array(
    "flight" => Flight::getById($id)
  ));
});

$app->delete("/delete_all", function () use ($app) {
  Flight::deleteAll();
  City::deleteAll();

  return $app['twig']->render("index.html.twig", array(
    "flights" => Flight::getAll(),
    "cities" => City::getAll()
  ));
});

return $app;

?>

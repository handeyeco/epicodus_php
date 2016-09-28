<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Restaurant.php";
require_once __DIR__."/../src/Cuisine.php";
require_once __DIR__."/../private/db_login.php";

$app = new Silex\Application();

use Symfony\Component\HttpFoundation\Request;
Request::enableHttpMethodParameterOverride();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app['twig']->render("index.html.twig", array(
    "cuisines" => Cuisine::getAll(),
    "restaurants" => Restaurant::getAll()
  ));
});

$app->get("/cuisines", function () use ($app) {
  return $app['twig']->render("cuisines.html.twig", array(
    "cuisines" => Cuisine::getAll()
  ));
});

$app->post("/cuisines", function () use ($app) {
  $new_cuisine = new Cuisine($_POST['name'], null);
  $new_cuisine->save();

  return $app['twig']->render("cuisines.html.twig", array(
    "cuisines" => Cuisine::getAll()
  ));
});

$app->get("/cuisine/{id}", function ($id) use ($app) {
  return $app['twig']->render("cuisine.html.twig", array(
    "cuisine" => Cuisine::getById($id),
    "restaurants" => Restaurant::getByCuisine($id)
  ));
});

$app->patch("/cuisine/{id}", function ($id) use ($app) {
  $cuisine = Cuisine::getById($id);
  $name = $_POST['name'];
  $cuisine->update($name);

  return $app['twig']->render("cuisine.html.twig", array(
    "cuisine" => $cuisine,
    "restaurants" => Restaurant::getByCuisine($id)
  ));
});

$app->delete("/cuisine/{id}", function ($id) use ($app) {
  $cuisine = Cuisine::getById($id);
  $cuisine->delete();

  return $app['twig']->render("index.html.twig", array(
    "cuisines" => Cuisine::getAll(),
    "restaurants" => Restaurant::getAll()
  ));
});

$app->get("/cuisine/{id}/edit", function ($id) use ($app) {
  return $app['twig']->render("cuisine_edit.html.twig", array(
    "cuisine" => Cuisine::getById($id)
  ));
});

$app->post("/restaurant", function () use ($app) {
  $name       = $_POST['name'];
  $website    = $_POST['website'];
  $number     = $_POST['number'];
  $address    = $_POST['address'];
  $cuisine_id = $_POST['cuisine_id'];

  $new_restaurant = new Restaurant($name, $website, $number, $address, $cuisine_id, null);
  $new_restaurant->save();

  return $app['twig']->render("cuisine.html.twig", array(
    "cuisine" => Cuisine::getById($cuisine_id),
    "restaurants" => Restaurant::getByCuisine($cuisine_id)
  ));
});

$app->patch("/restaurant/{id}", function ($id) use ($app) {
  $name       = $_POST['name'];
  $website    = $_POST['website'];
  $number     = $_POST['number'];
  $address    = $_POST['address'];
  $cuisine_id = $_POST['cuisine_id'];

  $restaurant = Restaurant::getById($id);
  $restaurant->update($name, $website, $number, $address, $cuisine_id);

  return $app['twig']->render("cuisine.html.twig", array(
    "cuisine" => Cuisine::getById($cuisine_id),
    "restaurants" => Restaurant::getByCuisine($cuisine_id)
  ));
});

$app->delete("/restaurant/{id}", function ($id) use ($app) {
  $restaurant = Restaurant::getById($id);
  $cuisine_id = $restaurant->getCuisineId();
  $restaurant->delete();

  return $app['twig']->render("cuisine.html.twig", array(
    "cuisine" => Cuisine::getById($cuisine_id),
    "restaurants" => Restaurant::getByCuisine($cuisine_id)
  ));
});

$app->get("/restaurant/{id}/edit", function ($id) use ($app) {
  $restaurant = Restaurant::getById($id);
  $cuisine_id = $restaurant->getCuisineId();

  return $app['twig']->render("restaurant_edit.html.twig", array(
    "cuisine" => Cuisine::getById($cuisine_id),
    "cuisines" => Cuisine::getAll(),
    "restaurant" => $restaurant
  ));
});

return $app;

?>

<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Animal.php";
require_once __DIR__."/../src/Type.php";
require_once __DIR__."/../private/db_login.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app["twig"]->render("index.html.twig", array(
    "types" => Type::getAll(),
    "animals" => Animal::getAll()
  ));
});

$app->get("/sort_date", function () use ($app) {
  return $app["twig"]->render("index.html.twig", array(
    "types" => Type::getAll(),
    "animals" => Animal::getAllByDate()
  ));
});

$app->get("/sort_type", function () use ($app) {
  return $app["twig"]->render("index.html.twig", array(
    "types" => Type::getAll(),
    "animals" => Animal::getAllByType()
  ));
});

$app->get("/type/{type_id}", function ($type_id) use ($app) {
  $type = Type::getTypeById($type_id);
  $animals = Animal::getAnimalsByType($type_id);

  return $app['twig']->render("type.html.twig", array(
    "type" => $type,
    "animals" => $animals
  ));
});

$app->post("/type/{type_id}", function ($type_id) use ($app) {
  $new_animal = new Animal($type_id, $_POST['name'], $_POST['gender'], $_POST['admitted'], null);
  $new_animal->save();

  $type = Type::getTypeById($type_id);
  $animals = Animal::getAnimalsByType($type_id);

  return $app['twig']->render("type.html.twig", array(
    "type" => $type,
    "animals" => $animals
  ));
});

$app->post("/type", function () use ($app) {
  $new_type = new Type($_POST['name'], null);
  $new_type->save();

  return $app["twig"]->render("index.html.twig", array(
    "types" => Type::getAll(),
    "animals" => Animal::getAll()
  ));
});

$app->post("/delete_everything", function () use ($app) {
  Type::deleteAll();
  Animal::deleteAll();

  return $app["twig"]->render("index.html.twig", array(
    "types" => Type::getAll(),
    "animals" => Animal::getAll()
  ));
});

return $app;

?>

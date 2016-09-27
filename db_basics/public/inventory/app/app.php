<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Item.php";
require_once __DIR__."/../private/db_login.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

$app->get("/", function () use($app) {
  $items = Item::getAll();

  return $app['twig']->render('home.html.twig', array( "items" => $items ));
});

$app->post("/add_item", function () use($app) {
  $new_item = new Item($_POST['name'], $_POST['year']);
  $new_item->save();

  $items = Item::getAll();

  return $app['twig']->render('home.html.twig', array( "items" => $items ));
});

$app->post("/delete_all", function () use ($app) {
  Item::deleteAll();

  $items = Item::getAll();

  return $app['twig']->render('home.html.twig', array( "items" => $items ));
});

return $app;

?>

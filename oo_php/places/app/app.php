<?php

require_once __DIR__."/../src/Place.php";
require_once __DIR__."/../vendor/autoload.php";

session_start();

if(empty($_SESSION['list_of_places'])) {
  $_SESSION['list_of_places'] = array();
}

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app['twig']->render('home.html.twig', array( 'places' => Place::getAll() ));
});

$app->post("/place", function () use ($app) {
  $new_place = new Place($_POST['city'], $_POST['state'], $_POST['attraction']);
  $new_place->save();

  return $app['twig']->render('home.html.twig', array( 'places' => Place::getAll() ));
});

$app->post("/delete", function () use ($app) {
  Place::deleteAll();

  return $app['twig']->render('home.html.twig', array( 'places' => Place::getAll() ));
});

return $app;

?>

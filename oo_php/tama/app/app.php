<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Tama.php";

session_start();

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app['twig']->render('start.html.twig');
});

$app->post("/start", function () use ($app) {
  $_SESSION['tamagotchi'] = new Tama();

  return $app['twig']->render('tama.html.twig', array( 'tama' => $_SESSION['tamagotchi'] ));
});

$app->post("/time", function () use ($app) {
  $_SESSION['tamagotchi']->addTime();

  if ($_SESSION['tamagotchi']->getIsDead()) {
    return $app['twig']->render('dead.html.twig');
  } else {
    return $app['twig']->render('tama.html.twig', array( 'tama' => $_SESSION['tamagotchi'] ));
  }
});

$app->post("/feed", function () use ($app) {
  $_SESSION['tamagotchi']->feed();

  if ($_SESSION['tamagotchi']->getIsDead()) {
    return $app['twig']->render('dead.html.twig');
  } else {
    return $app['twig']->render('tama.html.twig', array( 'tama' => $_SESSION['tamagotchi'] ));
  }
});

$app->post("/rest", function () use ($app) {
  $_SESSION['tamagotchi']->rest();

  if ($_SESSION['tamagotchi']->getIsDead()) {
    return $app['twig']->render('dead.html.twig');
  } else {
    return $app['twig']->render('tama.html.twig', array( 'tama' => $_SESSION['tamagotchi'] ));
  }
});

$app->post("/run", function () use ($app) {
  $_SESSION['tamagotchi']->run();

  if ($_SESSION['tamagotchi']->getIsDead()) {
    return $app['twig']->render('dead.html.twig');
  } else {
    return $app['twig']->render('tama.html.twig', array( 'tama' => $_SESSION['tamagotchi'] ));
  }
});

return $app;

?>

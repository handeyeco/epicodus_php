<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/PingPongGenerator.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app["twig"]->render("home.html.twig");
});

$app->get("result", function () use ($app) {
  $gen = new PingPongGenerator();
  $result = $gen->generatePingPongArray($_GET["input"]);
  return $app["twig"]->render("home.html.twig", array(
    "result" => $result
  ));
});

return $app;

?>

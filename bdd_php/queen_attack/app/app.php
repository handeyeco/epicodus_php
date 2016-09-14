<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Queen.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app["twig"]->render("home.html.twig");
});

$app->get("/result", function () use ($app) {
  $queen = new Queen($_GET["x_pos_queen"], $_GET["y_pos_queen"]);
  $result = $queen->canAttack($_GET["x_pos_attack"], $_GET["y_pos_attack"]);

  return $app["twig"]->render("home.html.twig", array( "result" => $result ));
});

return $app;

?>

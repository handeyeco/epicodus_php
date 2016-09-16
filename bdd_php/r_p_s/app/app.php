<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Game.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app["twig"]->render("home.html.twig");
});

$app->get("/result", function () use ($app) {
  $game = new Game($_GET["player1"], $_GET["player2"]);
  $result = $game->returnWinner();

  return $app["twig"]->render("home.html.twig", array(
    "result" => $result
  ));
});

return $app;

?>

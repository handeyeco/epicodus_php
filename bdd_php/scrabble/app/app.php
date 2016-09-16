<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/ScrabbleScore.php";

$app = new Silex\Application;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app["twig"]->render("home.html.twig");
});

$app->get("/result", function () use ($app) {
  $score = new ScrabbleScore();
  $result = $score->getScore($_GET["word"]);

  return $app["twig"]->render("home.html.twig", array(
    "word" => strtoupper($_GET["word"]),
    "score" => $result
  ));
});

return $app;

?>

<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/TitleCaseGenerator.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app["twig"]->render("home.html.twig");
});

$app->get("/result", function () use ($app) {
  $gen = new TitleCaseGenerator();
  $result = $gen->makeTitleCase($_GET["input"]);

  return $app["twig"]->render("home.html.twig", array(
    "result" => $result
  ));
});

return $app;

?>

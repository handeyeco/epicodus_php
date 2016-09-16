<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/FindReplace.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app["twig"]->render("home.html.twig");
});

$app->get("/result", function () use ($app) {
  $phrase = new FindReplace($_GET["phrase"]);
  $result = $phrase->replaceAndReturn($_GET["find"], $_GET["replace"]);

  return $app["twig"]->render("home.html.twig", array(
    "result" => $result
  ));
});

return $app;

?>

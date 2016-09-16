<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/RepeatCounter.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app["twig"]->render("home.html.twig");
});

$app->get("/result", function () use ($app) {
  $counter = new RepeatCounter();
  $result = $counter->countRepeats($_GET["word"], $_GET["phrase"]);

  return $app["twig"]->render("home.html.twig", array(
    "word" => $_GET["word"],
    "phrase" => $_GET["phrase"],
    "result" => strtoupper($result)
  ));
});

return $app;

?>

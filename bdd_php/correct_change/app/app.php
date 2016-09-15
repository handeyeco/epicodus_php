<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/CoinChange.php";

$app = new Silex\Application;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app["twig"]->render("home.html.twig");
});

$app->get("result", function () use ($app) {
  $change = new CoinChange();
  $result = $change->leastChange($_GET["change"]);

  return $app["twig"]->render("home.html.twig", array(
    "result" => $result
  ));
});

return $app;

?>

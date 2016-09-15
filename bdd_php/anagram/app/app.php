<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Anagram.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app["twig"]->render("home.html.twig");
});

$app->get("/result", function () use ($app) {
  $base = new Anagram( $_GET["base-word"] );
  $result = $base->returnAnagramArray( $_GET["comparison"] );

  return $app["twig"]->render("home.html.twig", array( "base" => $_GET["base-word"], "result" => $result ));
});

return $app;

?>

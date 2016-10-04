<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Course.php";
require_once __DIR__."/../src/Student.php";
require_once __DIR__."/../private/db_login.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

use Symfony\Component\HttpFoundation\Request;
Request::enableHttpMethodParameterOverride();

$app->get("/", function () use ($app) {
  return $app['twig']->render("index.html.twig", array(
    "students" => Students::getAll(),
    "courses" => Course::getAll()
  ));
});

$app->get("/student/{id}", function ($id) use ($app) {
  // View student
});

$app->get("/course/{id}", function ($id) use ($app) {
  // View course
});

$app->post("/student", function () use ($app) {
  // Add student
});

$app->post("/student/{id}", function ($id) use ($app) {
  // Add course to student
});

$app->post("/course", function () use ($app) {
  // Add course
});

$app->post("/course/{id}", function ($id) use ($app) {
  // Add student to course
});

$app->delete("/", function () use ($app) {
  // Clear databases
});

return $app;

?>

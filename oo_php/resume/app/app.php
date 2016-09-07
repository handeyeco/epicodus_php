<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Job.php";

session_start();

if(empty($_SESSION['job_list'])) {
  $_SESSION['job_list'] = array();
}

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app['twig']->render('resume.html.twig', array( 'jobs' => Job::getAll() ));
});

$app->post("/job", function () use ($app) {
  $new_job = new Job($_POST['business'], $_POST['title'], $_POST['city'], $_POST['start'], $_POST['end']);
  $new_job->save();

  return $app['twig']->render('resume.html.twig', array( 'jobs' => Job::getAll() ));
});

$app->post("/delete", function () use ($app) {
  Job::deleteAll();

  return $app['twig']->render('resume.html.twig', array( 'job' => Job::getAll() ));
});

return $app;

?>

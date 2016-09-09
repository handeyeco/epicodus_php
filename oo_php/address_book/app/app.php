<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Contact.php";

session_start();

if (empty($_SESSION["list_of_contacts"])) {
  $_SESSION["list_of_contacts"] = array();
};

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__."/../views"
));

$app->get("/", function () use ($app) {
  return $app["twig"]->render("address_book.html.twig", array( "contacts" => Contact::getAll() ));
});

$app->post("/create_contact", function () use ($app) {
  $new_contact = new Contact($_POST['name'], $_POST['number'], $_POST['address']);
  $new_contact->saveContact();

  return $app["twig"]->render("address_book.html.twig", array( "contacts" => Contact::getAll() ));
});

$app->post("/delete_contacts", function () use ($app) {
  Contact::deleteAll();

  return $app["twig"]->render("address_book.html.twig", array( "contacts" => Contact::getAll() ));
});

return $app;

?>

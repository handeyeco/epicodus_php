<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Contact.php";
require_once __DIR__."/../src/Listing.php";

$app = new Silex\Application();

$app->get("/", function() {
  return
    "<!DOCTYPE html>
    <html>
    <head>
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
      <title>Post a Job</title>
    </head>
    <body>
      <div class='container'>
      <h1>Post a Job!</h1>
      <form action='/listing'>
          <div class='form-group'>
              <label for='business'>Business Name:</label>
              <input id='business' name='business' class='form-control' type='text' required>
          </div>
          <div class='form-group'>
              <label for='title'>Job Position:</label>
              <input id='title' name='title' class='form-control' type='text' required>
          </div>
          <div class='form-group'>
              <label for='pay'>Starting Pay:</label>
              <input id='pay' name='pay' class='form-control' type='number' required>
          </div>
          <div class='form-group'>
              <label for='contact'>Contact Name:</label>
              <input id='contact' name='contact' class='form-control' type='text' required>
          </div>
          <div class='form-group'>
              <label for='email'>Contact Email:</label>
              <input id='email' name='email' class='form-control' type='email' required>
          </div>
          <button type='submit' class='btn btn-success'>Submit</button>
      </form>
      </div>
    </body>
    </html>";
});

$app->get("/listing", function() {
  $contact = new Contact($_GET['contact'], $_GET['email']);
  $listing = new Listing($_GET['business'], $_GET['title'], $_GET['pay'], $contact);

  $business = $listing->business;
  $title = $listing->title;
  $pay = $listing->pay;
  $name = $contact->getName();
  $email = $contact->getEmail();

  return
    "<!DOCTYPE html>
    <html>
    <head>
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
      <title>Review Your Listing</title>
    </head>
    <body>
      <div class='container'>
      <h1>Review Your Listing</h1>
        <h2>$title</h2>
        <h3>$business</h3>
        <h3>$$pay/yr</h3>
        <p>Contact $name at $email.</p>
      </div>
    </body>
    </html>";
});

return $app;

?>

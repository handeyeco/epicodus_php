<?php

class Contact {
  public $name;
  public $phone;
  public $address;
}

$hendrix = new Contact();
$hendrix->name = "Jimi Hendrix";
$hendrix->phone = "503-826-9371";
$hendrix->address = "208 SW 5th St. Portland, OR 97204";

$elvis = new Contact();
$elvis->name = "Elvis Presley";
$elvis->phone = "617-356-3571";
$elvis->address = "Graceland";

$einstein = new Contact();
$einstein->name = "Albert Einstein";
$einstein->phone = "415-738-4935";
$einstein->address = "3718 MLK Blvd. Oakland, CA 94609";

$marie = new Contact();
$marie->name = "Marie Curis";
$marie->phone = "432-154-3523";
$marie->address = "1911 West 1st Ave. Fictional, OR 44556";

$janis = new Contact();
$janis->name = "Janis Joplin";
$janis->phone = "415-124-2445";
$janis->address = "Haight Ashbury, San Francisco, CA 94117";

$address_book = array($hendrix, $elvis, $einstein, $marie, $janis);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>Address Book</title>
</head>
<body>
    <div class="container">
        <h1>Address Book</h1>
        <ul>
          <?php
            foreach ($address_book as $contact) {
              echo (
                "<li>
                  $contact->name
                  <ul>
                    <li> $contact->phone </li>
                    <li> $contact->address </li>
                  </ul>
                </li>"
              );
            }
          ?>
        </ul>
    </div>
</body>
</html>

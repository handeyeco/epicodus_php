<?php

class CD {
  public $title;
  public $artist;
  private $price;

  function __construct($album_name, $band_name, $album_price = 10.99) {
    $this->title = $album_name;
    $this->artist = $band_name;
    $this->price = $album_price;
  }

  function setPrice($new_price) {
    $float_price = (float) $new_price;

    if ($float_price != 0) {
      $this->price = number_format($float_price, 2);
    }
  }

  function getPrice() {
    return $this->price;
  }
}

$first_cd = new CD("Master of Reality", "Black Sabbath");
$second_cd = new CD("Electic Ladyland", "Jimi Hendrix");
$third_cd = new CD("Nevermind", "Nirvana");
$fourth_cd = new CD("I don't get it", "Pork Lion", 49.99);

$fourth_cd->setPrice("1.3902");

$cds = array($first_cd, $second_cd, $third_cd, $fourth_cd);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>My CD Store</title>
</head>
<body>
    <div class="container">

      <?php
        foreach ($cds as $cd) {
          $cd_price = $cd->getPrice();

          echo "<h3>'$cd->title' by $cd->artist - $$cd_price</h3>";
        }
      ?>

    </div>
</body>
</html>

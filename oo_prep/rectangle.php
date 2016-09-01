<?php

class Rectangle {
  public $length;
  public $iwdth;

  function isSquare() {
    if ($this->length == $this->width) {
      return true;
    } else {
      return false;
    }
  }

  function getArea() {
    return $this->length * $this->width;
  }
}

$my_rectangle = new Rectangle();
$my_rectangle->length = $_GET['length'];
$my_rectangle->width = $_GET['width'];

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>Make a Rectangle!</title>
</head>
<body>
    <div class="container">

      <?php
        if ($my_rectangle->isSquare()) {
          echo "<h1>It's a square!</h1>";
        } else {
          echo "<h1>No, not a square.</h1>";
        }

        echo "<p>The area is: " . $my_rectangle->getArea() . "</p>"
      ?>

    </div>
</body>
</html>

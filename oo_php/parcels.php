<?php

class Parcel {
  private $height;
  private $width;
  private $length;
  private $weight;

  function __construct ($height, $width, $length, $weight) {
    $this->setHeight($height);
    $this->setWidth($width);
    $this->setlength($length);
    $this->setWeight($weight);
  }

  function setHeight ($height) {
    $height = (int) $height;

    if ( is_int($height) && $height > 0 ) {
      $this->height = $height;
    }
  }

  function setWidth ($width) {
    $width = (int) $width;

    if ( is_int($width) && $width > 0 ) {
      $this->width = $width;
    }
  }

  function setLength ($length) {
    $length = (int) $length;

    if ( is_int($length) && $length > 0 ) {
      $this->length = $length;
    }
  }

  function setWeight ($weight) {
    $weight = (int) $weight;

    if ( is_int($weight) && $weight > 0 ) {
      $this->weight = $weight;
    }
  }

  function getHeight () {
    return $this->height;
  }

  function getWidth () {
    return $this->width;
  }

  function getLength () {
    return $this->length;
  }

  function getWeight () {
    return $this->weight;
  }

  function volume () {
    return $this->height * $this->width * $this->length;
  }

  function validateParsel () {
    if ($this->height && $this->width && $this->length && $this->weight) {
      return true;
    } else {
      return false;
    }
  }

  function returnCost () {
    if ( $this->validateParsel() ) {
      return ($this->height + $this->width + $this->length + $this->width) * 0.5;
    } else {
      return "Err";
    }
  }
}

$package = new Parcel($_GET['height'], $_GET['width'], $_GET['length'], $_GET['weight']);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Shipping Calculator</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
  <div class="container">
    <h1>Shipping Calculator</h1>
    <h3>Dimensions: <?php echo $package->getHeight() . " x " . $package->getWidth() . " x " . $package->getLength(); ?></h3>
    <h3>Weight: <?php echo $package->getWeight(); ?></h3>
    <h3>Total Cost: $<?php echo $package->returnCost(); ?></h3>
  </div>
</body>
</html>

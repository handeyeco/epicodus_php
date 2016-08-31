<?php
  $month = $_GET['month'];
  $color = strtolower($_GET['color']);
  $result = getFortune($month, $color);

  function getFortune ($m, $c) {
    $line1 = "You're going to die alone!";
    $line2 = "You're going to live a long time.";

    if ($m > 4) {
      $line1 = "You're going to meet someone but it won't last.";
    } elseif ($m > 8) {
      $line1 = "You're going to find true love.";
    }

    if ($c == "blue" || $c == "green") {
      $line2 = "You're going to die in an accident.";
    } elseif ($c == "red" || $c == "yellow") {
      $line2 = "You're going to die young.";
    }

    return $line1 . " " . $line2;
  }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>Fortune Teller</title>
</head>
<body>
    <div class="container">
        <h1>Your FORTUNE:</h1>
        <h3><?php echo $result; ?></h3>
    </div>
</body>
</html>

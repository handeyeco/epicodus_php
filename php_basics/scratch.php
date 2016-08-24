<?php
  $number = 5;

  function addNumber ($number2) {
    return $number + $number2;
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Scratch</title>

  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <h1>Scratch</h1>
  <h3><?php echo addNumber(3); ?></h3>
</body>
</html>

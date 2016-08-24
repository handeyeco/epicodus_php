<?php
  $soup = "Gazpacho";
  $soup_price = 6;
  $drink = "The Hemingway";
  $drink_price = 8;
  $entree = "Bacon Wrapped Grilled Salmon";
  $entree_price = 22;
  $desert = "Creme Brulee";
  $desert_price = 10;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Today's Specials</title>
</head>
<body>
  <h1>Today's Specials</h1>

  <h2>Soup</h2>
  <p><em><?php echo $soup . " - " . $soup_price; ?></em></p>

  <h2>Drink</h2>
  <p><em><?php echo $drink . " - " . $drink_price; ?></em></p>

  <h2>Entree</h2>
  <p><em><?php echo $entree . " - " . $entree_price; ?></em></p>

  <h2>Desert</h2>
  <p><em><?php echo $desert . " - " . $desert_price; ?></em></p>
</body>
</html>

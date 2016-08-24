<?php
  $input_weight = $_GET['weight'];
  $input_distance = $_GET['distance'];
  $shipping_price = calculateShipping($input_weight, $input_distance);

  function calculateShipping($weight, $distance) {
     return $distance / $weight + 5;
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shipping Calculator</title>
</head>
<body>
    <div class="container">
        <h1>Price Calculated!</h1>
        <h3>Your package weighs: <?php echo $input_weight . " lbs"; ?> </h3>
        <h3>Your package is traveling: <?php echo $input_distance . " miles"; ?> </h3>
        <h3>The cost will be: $<?php echo $shipping_price; ?> </h3>
    </div>
</body>
</html>

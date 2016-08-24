<?php
  $weight = $_GET['weight'];
  $distance = $_GET['distance'];

  $usps = ($weight / 20) + ($distance / 20);
  $ups = ($distance / $weight) + 5;
  $fedex = -(($distance / 5) - ($weight * 5));
?>

<!DOCTYPE html>
<html>
<head>
  <title>Shipping Costs</title>
</head>

<body>
  <h1>Shipping Costs</h1>
  <p>USPS: <?php echo "$" . $usps; ?></p>
  <p>UPS: <?php echo "$" . $ups; ?></p>
  <p>Fedex: <?php echo "$" . $fedex; ?></p>
</body>
</html>

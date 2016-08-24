<?php
  $first_name = $_GET['first-name'];
  $last_name = $_GET['last-name'];
  $item = $_GET['item'];
  $quantity = $_GET['quantity'];
  $street = $_GET['street'];
  $city = $_GET['city'];
  $state = $_GET['state'];
  $zip = $_GET['zip'];
?>

<!DOCTYPE>
<html>
<head>
  <title>Thank you for your order!</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>

<body>
  <h1>Thank you!</h1>
  <p>We appreciate your business!</p>
  <p>Please print this page for your records:</p>
  <h2>Order</h2>
  <p>x<?php echo $quantity . " " . $item; ?></p>
  <h2>Shipping</h2>
  <p><?php echo $first_name . " " . $last_name . "<br />" .
          $street . "<br />" .
          $city . ", " . $state . " " . $zip;
     ?></p>
</body>
</html>

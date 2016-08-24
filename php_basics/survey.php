<?php
  $name = $_GET['name'];
  $email = $_GET['email'];
  $telephone = $_GET['telephone'];
  $color = $_GET['color'];
  $birthday = $_GET['birthday'];
?>

<!DOCTYPE>
<html>
<head>
  <title>Thank you!</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>

<body>
  <h1>Thank You!</h1>
  <p><?php echo $name; ?></p>
  <p>Your birthday is <?php echo $birthday; ?> and you like the color <?php echo $color; ?>.</p>
  <p>If we need to contact you, you can be reached at <?php echo $email . " or " . $telephone; ?>.</p>
  <p>Cool beans!</p>
</body>
</html>

<?php
  $month = $_GET['month'];
  $color = $_GET['color'];
  // $message = getFortune();
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
        <h3><?php echo $month; ?></h3>
        <h3><?php echo $color; ?></h3>
    </div>
</body>
</html>

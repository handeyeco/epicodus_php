<?php
  $first_name = $_GET['first-name'];
  $last_name = $_GET['last-name'];
  $date = $_GET['date'];
  $start_time = $_GET['start-time'];
  $end_time = $_GET['end-time'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Appointment Confirmed</title>
</head>

<body>
  <h1>Appointment Confirmed</h1>

  <p>Name: <?php echo $first_name . ' ' . $last_name; ?></p>
  <p>Date: <?php echo $date; ?></p>
  <p>Time: <?php echo $start_time . " - " . $end_time; ?></p>

</body>
</html>

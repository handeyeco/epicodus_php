<?php
    $writers = array("Steinbeck", "Kafka", "Hemingway", "Klosterman");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Writers</title>
</head>
<body>
    <h1>Secret Writers</h1>
    <ul>
      <?php
        foreach ($writers as $writer) {
          echo "<h3>" . strrev($writer) . "</h3>";
        }
      ?>
    </ul>
</body>
</html>

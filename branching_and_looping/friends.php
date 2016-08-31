<?php
    $friends = array("James", "Michael", "Julie", "Cody");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Friends</title>
</head>
<body>
    <h1>My Friends</h1>
    <ul>
      <?php
        foreach ($friends as $friend) {
          echo "<h3>{$friend}</h3>";
        }
      ?>
    </ul>
</body>
</html>

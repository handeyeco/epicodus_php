<?php
    $groceries = array("eggs", "milk", "bread", "apples", "bananas", "fruit rollups", "steak", "kale", "pasta", "flour", "sugar", "vanilla");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Array Practice</title>
</head>
<body>
    <h1>My Grocery List</h1>
    <ul>
      <?php
        foreach ($groceries as $purchase) {
          echo "<li>" . $purchase . "</li>";
        }
      ?>
    </ul>
</body>
</html>

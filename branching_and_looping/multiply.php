<?php
    $numbers = array(5, 10, 15, 20, 25);
    $solution = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Math</title>
</head>
<body>
    <h1>Math!</h1>
    <ul>
      <?php
        echo "1";
        foreach ($numbers as $number) {
          $solution *= $number;
          echo " times $number";
        }

        echo " is $solution";
      ?>
    </ul>
</body>
</html>

<?php

$albums = array("Dethtime" => "17.99", "Dethclock" => "8.99", "Dethwatch" => "20.99", "Dethminute" => "2.99");
$shows = array("Berlin" => "3/4/53", "Paris" => "32/3/45", "London" => "34/2/21", "Prague" => "3/2/12", "Rome" => "2/34/53", "Atlantis" => "23/45/64");

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>DEAD THINGS</title>
</head>
<body>
    <div class="container">
        <h1>DEAD THINGS</h1>
        <h2>Albums</h2>
        <ul>
          <?php
              foreach ($albums as $name => $price) {
                  echo "<li>$name ($price)</li>";
              }
          ?>
        </ul>
        <h2>Tour Dates</h2>
        <ul>
          <?php
            foreach ($shows as $location => $date) {
              echo "<li>$location: $date</li>";
            }
          ?>
        </ul>
    </div>
</body>
</html>

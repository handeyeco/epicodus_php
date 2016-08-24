<?php
  $band_name = "The White Stripes";
  $genre = "Garage Rock";
  $singer = "Jack White";
  $drummer = "Meg White";

  $image_url = "https://static01.nyt.com/images/2007/06/10/arts/ligh_1_450.jpg?w=806";
?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo $band_name; ?></title>
</head>

<body>
  <img src="<?php echo $image_url; ?>" alt="<?php echo $band_name; ?>" />
  <h1><?php echo $band_name; ?></h1>
  <ul>
    <li>Band name: <?php echo $band_name; ?></li>
    <li>Genre: <?php echo $genre; ?></li>
    <li>Band Members:</li>
    <ul>
      <li><?php echo $singer; ?></li>
      <li><?php echo $drummer; ?></li>
    </ul>
  </ul>
</body>
</html>

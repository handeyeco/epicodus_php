<?php
  $upper = strtoupper($_GET['upper']);
  $count = str_word_count($_GET['count']);
  $shuffle = str_shuffle($_GET['shuffle']);
  $position = stripos($_GET['position'], 'you');
?>

<html>
<head>
  <title>Results</title>
</head>
<body>
  <p>String 1: <?php echo $upper; ?></p>
  <p>String 2: <?php echo $count; ?></p>
  <p>String 3: <?php echo $shuffle; ?></p>
  <p>String 4: <?php echo $position; ?></p>
</body>
</html>

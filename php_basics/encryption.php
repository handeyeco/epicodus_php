<?php
  $string1 = $_GET['string1'];
  $string2 = $_GET['string2'];
  $string3 = $_GET['string3'];

  $result = encrypt($string1, $string2, $string3);

  function encrypt ($s1, $s2, $s3) {
    return strrev($s1) . ' ' . strtoupper($s2) . ' ' . strrev(strtoupper($s3));
  }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>Secret! No Looking!</title>
</head>
<body>
    <div class="container">
        <h1>Secret! No Looking!</h1>

        <h2><?php echo $result; ?></h2>

        <form action="encryption.php">
            <div class="form-group">
                <label for="string1">First String</label>
                <input id="string1" name="string1" class="form-control" type="text">
            </div>

            <div class="form-group">
                <label for="string2">Second String</label>
                <input id="string2" name="string2" class="form-control" type="text">
            </div>

            <div class="form-group">
                <label for="string3">Third String</label>
                <input id="string3" name="string3" class="form-control" type="text">
            </div>

            <button type="submit" class="btn-success">Submit</button>
        </form>

    </div>
</body>
</html>

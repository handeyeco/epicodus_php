<?php

$prices = array($_GET['price1'], $_GET['price2'], $_GET['price3'], $_GET['price4'], $_GET['price5']);
$result = 0;

foreach ($prices as $price) {
  $price = $price ?: 0;
  $result += $price;
}



?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="register.php">
            <div class="form-group">
                <label for="price1">Price 1:</label>
                <input id="price1" name="price1" class="form-control" type="number">
            </div>
            <div class="form-group">
                <label for="price2">Price 2:</label>
                <input id="price2" name="price2" class="form-control" type="number">
            </div>
            <div class="form-group">
                <label for="price3">Price 3:</label>
                <input id="price3" name="price3" class="form-control" type="number">
            </div>
            <div class="form-group">
                <label for="price4">Price 4:</label>
                <input id="price4" name="price4" class="form-control" type="number">
            </div>
            <div class="form-group">
                <label for="price5">Price 5:</label>
                <input id="price5" name="price5" class="form-control" type="number">
            </div>
            <button type="submit" class="btn btn-success">Go!</button>
        </form>

        <h3>Solution: <?php echo $result; ?></h3>
        <p><?php echo var_dump($prices); ?></p>
    </div>
</body>
</html>

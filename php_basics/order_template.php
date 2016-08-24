<?php
    $recipient = "Jesse";
    $downtown_address = "208 SW 5th Ave #105, Portland, OR 97204";
    $northwest_address = "1978 19th Ave, Portland, OR 97209";
    $south_address = "1493 SW 2nd Ave, Portland, OR 97201";
    $southeast_address = "2874 Ramona St, Portland, OR 97206";
    $downtown_order = "20 lbs dark roast, 15 lbs light roast.";
    $northwest_order = "50 lbs dark roast.";
    $south_order = "40 lbs light roast.";
    $southeast_order = "10 lbs dark roast.";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
</head>
<body>
    <p>Hi <?php echo $recipient; ?>, </p>
    <p>Just making my weekly order. Details are below.</p>
    <p><?php echo $downtown_order; ?></p>
    <p><?php echo $downtown_address; ?></p>
    <p><?php echo $northwest_order; ?></p>
    <p><?php echo $northwest_address; ?></p>
    <p><?php echo $south_order; ?></p>
    <p><?php echo $south_address; ?></p>
    <p><?php echo $southeast_order; ?></p>
    <p><?php echo $southeast_address; ?></p>
    <p>Thanks,</p>
    <p>Diane</p>
</body>
</html>

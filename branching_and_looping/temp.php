<?php
  $temp = $_GET['temp'];
  $message = checkTemp($temp);

  function checkTemp ($temp) {
    if ($temp < 60) {
      return "It's cold out!";
    } elseif ($temp > 80) {
      return "It's too hot!";
    } else {
      return "It's lovely out!";
    }
  }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
     <title>What's the Temp?</title>
 </head>
 <body>
     <div class="container">
         <h1>What's the temp outside?</h1>

         <h2><?php echo "It's " . $temp . "degs?! " . $message; ?></h2>

         <form action="temp.php">
             <div class="form-group">
                 <label for="temp">Put the temperature here:</label>
                 <input id="temp" name="temp" class="form-control" type="number">
             </div>
             <button type="submit" class="btn btn-success">Go!</button>
         </form>
     </div>
 </body>
 </html>

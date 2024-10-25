<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Object Oriented Programming with PHP</title>
  <style>
    body{
      display: grid;
      align-items: center;
      justify-content: center;
    }
    h1{
      color: red;
    }
  </style>
</head>
<body>
  <h1>Welcome to Object Orientation with PHP</h1>

  <?php

   $brand = "Volvo"; 
   $color = "Green";
   
   function getCarInfo($brand, $color){
    return "Brand: " . $brand . " Color: " . $color;
   }

   echo getCarInfo($brand,$color);

  ?>

</body>
</html>
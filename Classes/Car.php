<?php

class Car {

  // properties or fields
  private $brand;
  private $color;
  private $vehicleType = 'car';

  // constructor
  public function __construct($brand, $color= "default"){
    $this->brand = $brand;
    $this->color = $color;
    
  }
}


$car1 = new Car("Benz", "white");
$car2 = new Car("BMW");



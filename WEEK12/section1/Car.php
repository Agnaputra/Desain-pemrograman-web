<?php

class Car
{
    private $model;
    private $color;

    public function __construct($model, $color)
    {
        $this->model = $model;
        $this->color = $color;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getColor()
    {
        return $this->color;
    }
}

// Create an instance of the Car class
$car = new Car("Toyota", "Blue");

// Output the car's model and color
echo "Model: " . $car->getModel() . "<br>";
echo "Color: " . $car->getColor() . "<br>";

// Update the car's color
$car->setColor("Red");

// Output the updated color
echo "Updated Color: " . $car->getColor() . "<br>";

?>

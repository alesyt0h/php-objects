<?php

class Shape{

    public function __construct(
        protected float $width, 
        protected float $height
    ){}

}

class Triangle extends Shape {
    
    public function area(){
        echo ($this->width * $this->height) / 2;
    }

}

class Rectangle extends Shape {
    
    public function area(){
        echo $this->width * $this->height;
    }

}

echo "Rectángulo: ";
$rectangulo = new Rectangle(10, 6);
$rectangulo->area();

echo "\r\n";

echo "Triángulo: ";
$triangulo = new Triangle(12, 15);
$triangulo->area();

?>
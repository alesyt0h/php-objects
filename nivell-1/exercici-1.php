<?php

class Employee {

    public function __construct(
        private string $nombre,
        private int|float $salario){ } 
    
    public function print(){
        echo "Nombre: " . $this->nombre;
        echo "\r\n";
        echo ($this->salario > 6000) ? "Tiene que pagar impuestos" : "No tiene que pagar impuestos";
    }

}

$empleado = new Employee('Juanito Valderrama', 6000);
$empleado->print();

?>
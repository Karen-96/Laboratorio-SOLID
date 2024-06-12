<?php

include 'gestorCoche.php';

class Coche{
    private $modelo;
    private $color;
    private $motor;    
    private $funcionalidad;
    
    public function setFuncionalidad(GestorCoche $funcionalidad){
        $this->funcionalidad = $funcionalidad;
    }

    public function ejecutarFuncion() {
        $this->funcionalidad->realizarFuncion();
    }

    public function __construct($modelo, $color, $motor) {
        $this->modelo = $modelo;
        $this->color = $color;
        $this->motor = $motor;
    }

    public function obtenerModelo() {
        echo $this->modelo;
    }

    public function getkilometraje(){
        echo $this->modelo;
    }
    
    public function obtenerColor() {
        echo $this->color;
    }
    
    public function obtenerMotor() {
        echo $this->motor;
    }

}

class CocheElectrico extends Coche{
    private $kilowats;

    public function __construct($modelo, $color, $motor, $kilowats){
        parent::__construct($modelo, $color, $motor);
        $this->kilowats = $kilowats;
    }

    public function getKilowats(){
        echo($this->kilowats);
    }
}

class CocheMotor extends Coche{   
    public function __construct($modelo, $color, $motor){
        parent::__construct($modelo, $color, $motor);
    }
}
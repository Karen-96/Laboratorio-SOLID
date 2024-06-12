<?php

 include 'coche.php';
 include 'encender.php';
 // include 'gestorCoche.php';

 $coche = new CocheElectrico('Zafira', 'gris', '2l', 300);

 $coche2 = new CocheMotor('Clio', 'gris', '1.2l');

 $coche->obtenerColor();
echo "<br>";
 $coche2->obtenerColor();



/*
 $iniciar = new Iniciar();

 $coche->setFuncionalidad($iniciar);

 $coche->ejecutarFuncion();

echo '<br>';

$encender = new Encender();
$coche->setFuncionalidad($encender);
$coche->ejecutarFuncion();*/
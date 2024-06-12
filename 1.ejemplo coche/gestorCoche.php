<?php

interface GestorCoche {	
	public function realizarFuncion();
}

class Iniciar implements GestorCoche{
	public function realizarFuncion(){
		echo('Arranca auto');
	}	
}

class Acelerar implements GestorCoche{
	public function realizarFuncion(){
		echo('Acelera auto');
	}
}

class Frenar implements GestorCoche{
	public function realizarFuncion(){
		echo('Frena auto');
	}
}
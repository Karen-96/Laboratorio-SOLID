<?php

include 'CalculadoraDescuento.php';

/**
 * -Ahora este otro respeta single responsability referido a los descuentos
   -Todavía le faltaría simple responsabilidad en cuanto a la impresión. Pero eso lo arreglamos en un rato mas
   -Esta es la etapa 2:**/ 

class Pago {
    public $monto;
    public $persona;
    public $metodoPago;

    public function __construct($monto, $persona, $metodoPago) {
        $this->monto = $monto;
        $this->persona = $persona;
        $this->metodoPago = $metodoPago;
    }

    public function procesarPago() {
        // Utilizamos un objeto CalculadoraDescuento para calcular el descuento
        $calculadoraDescuento = new CalculadoraDescuento();
        $montoConDescuento = $calculadoraDescuento->calcularDescuento($this->monto, $this->metodoPago);

        // Imprimimos el resultado (sigue estando dentro de la clase Pago)
        echo "$this->persona paga con $this->metodoPago, un total de: $montoConDescuento ";
    }
}

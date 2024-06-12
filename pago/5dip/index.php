<?php

//Podria llegar a meter algo de cuotas

interface Descuento {
    public function calcularDescuento($monto);
}

class DescuentoEfectivo implements Descuento {
    public function calcularDescuento($monto) {
        return $monto * 0.10;
    }
}

class DescuentoDebito implements Descuento {
    public function calcularDescuento($monto) {
        return $monto * 0.05;
    }
}

class DescuentoCredito implements Descuento {
    public function calcularDescuento($monto) {
        return 0; // No hay descuento para tarjetas de crédito
    }
}

class Pago {
    public $monto;
    public $persona;
    public $metodoPago;
    private $calculadoraDescuento;

    public function __construct($monto, $persona, Descuento $calculadoraDescuento) {
        $this->monto = $monto;
        $this->persona = $persona;
        $this->calculadoraDescuento = $calculadoraDescuento;
    }

    public function procesarPago() {
        // Utilizamos la estrategia de descuento seleccionada para calcular el descuento
        $montoConDescuento = $this->monto - $this->calculadoraDescuento->calcularDescuento($this->monto);

        // Imprimimos el resultado fuera de la clase Pago
        echo "$this->persona paga con $this->metodoPago, un total de: $montoConDescuento ";
    }
}

// Ejemplo de uso
$pago = new Pago(100, "Juan", new DescuentoEfectivo());
$pago->procesarPago();
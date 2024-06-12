<?php

class Pago {
    public $monto;
    public $persona;
    public $metodoPago;

    public function __construct($monto, $persona, $metodoPago) {
        $this->monto = $monto;
        $this->persona = $persona;
        $this->metodoPago = $metodoPago;
    }

    //No hay simple responsabilidad por que se hacen muchas cosas acá dentro (SRP)
    //Si hubiera un nuevo método de pago debería tocar la clase pago (OCP)
    //Procesa pago, calcula el porcentaje de descuento, que no debería pertencer a la clase pago
    public function procesarPago() {
        switch ($this->metodoPago) {
            case 'efectivo':
                $this->aplicarDescuento(0.10);
                break;
            case 'debito':
                $this->aplicarDescuento(0.05);
                break;
            case 'credito':
                // No hay descuento para tarjetas de crédito
                break;
            default:
                echo "Método de pago inválido";
                return;
        }

        //Imprimir resultado no debería estar en procesar pago
        echo "$this->persona paga con $this->metodoPago, un total de: $this->monto ";

    }

    private function aplicarDescuento($tasaDescuento) {
        $this->monto -= $this->monto * $tasaDescuento;
    }
}
